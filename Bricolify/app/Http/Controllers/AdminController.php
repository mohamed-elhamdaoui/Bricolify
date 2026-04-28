<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\WorkerProfile;
use App\Models\Category;
use App\Models\Skill;
use Illuminate\Support\Str;

class AdminController extends Controller
{
    public function workers()
    {
        $workers = WorkerProfile::with('user')->orderBy('is_validated')->latest()->get();
        return view('admin.workers.index', compact('workers'));
    }

    public function categories()
    {
        $categories = Category::withCount(['serviceRequests as active_missions_count' => function ($query) {
            $query->whereIn('status', ['pending', 'in_progress']);
        }])->get();
        
        return view('admin.categories.index', compact('categories'));
    }

    public function skills()
    {
        $skills = Skill::with('category')->withCount('workerProfiles')->get();
        return view('admin.skills.index', compact('skills'));
    }

    // --- Category CRUD ---
    public function createCategory()
    {
        return view('admin.categories.create');
    }

    public function storeCategory(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string'
        ]);
        $data['slug'] = Str::slug($data['name']);
        Category::create($data);
        return redirect()->route('admin.categories.index')->with('success', 'Category created.');
    }

    public function editCategory(Category $category)
    {
        return view('admin.categories.edit', compact('category'));
    }

    public function updateCategory(Request $request, Category $category)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string'
        ]);
        $data['slug'] = Str::slug($data['name']);
        $category->update($data);
        return redirect()->route('admin.categories.index')->with('success', 'Category updated.');
    }

    public function destroyCategory(Category $category)
    {
        $category->delete();
        return redirect()->route('admin.categories.index')->with('success', 'Category deleted.');
    }

    // --- Skill CRUD ---
    public function createSkill()
    {
        $categories = Category::all();
        return view('admin.skills.create', compact('categories'));
    }

    public function storeSkill(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'category_id' => 'required|exists:categories,id'
        ]);
        Skill::create($data);
        return redirect()->route('admin.skills.index')->with('success', 'Skill added.');
    }

    public function editSkill(Skill $skill)
    {
        $categories = Category::all();
        return view('admin.skills.edit', compact('skill', 'categories'));
    }

    public function updateSkill(Request $request, Skill $skill)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'category_id' => 'required|exists:categories,id'
        ]);
        $skill->update($data);
        return redirect()->route('admin.skills.index')->with('success', 'Skill updated.');
    }

    public function destroySkill(Skill $skill)
    {
        $skill->delete();
        return redirect()->route('admin.skills.index')->with('success', 'Skill deleted.');
    }
}

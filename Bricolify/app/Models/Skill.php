<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Skill extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $fillable = ['name', 'category_id'];

    // --- Relationships ---
    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }

    public function workerProfiles(): BelongsToMany
    {
        return $this->belongsToMany(WorkerProfile::class, 'skill_worker_profile');
    }
}

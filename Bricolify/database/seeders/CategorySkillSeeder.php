<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use App\Models\Category;
use App\Models\Skill;

class CategorySkillSeeder extends Seeder
{
    public function run(): void
    {
        $data = [
            [
                'name'        => 'Plumbing',
                'icon'        => '🔧',
                'description' => 'Water installation, pipe repairs, leaks, and sanitation systems.',
                'skills'      => ['Pipe Repair', 'Leak Detection', 'Water Heater Installation', 'Drain Cleaning', 'Faucet Replacement', 'Bathroom Plumbing'],
            ],
            [
                'name'        => 'Electricity',
                'icon'        => '⚡',
                'description' => 'Electrical wiring, installations, panel upgrades, and safety checks.',
                'skills'      => ['Wiring & Rewiring', 'Circuit Breaker Repair', 'Lighting Installation', 'Socket & Switch Replacement', 'Electrical Safety Inspection', 'Generator Installation'],
            ],
            [
                'name'        => 'Painting',
                'icon'        => '🎨',
                'description' => 'Interior and exterior painting, surface preparation, and decorative finishes.',
                'skills'      => ['Interior Painting', 'Exterior Painting', 'Wall Preparation', 'Decorative Finishes', 'Ceiling Painting', 'Waterproofing'],
            ],
            [
                'name'        => 'Carpentry',
                'icon'        => '🪚',
                'description' => 'Furniture assembly, woodwork, doors, windows, and custom cabinetry.',
                'skills'      => ['Furniture Assembly', 'Door & Window Installation', 'Custom Cabinetry', 'Flooring Installation', 'Wood Repair', 'Shelving & Storage'],
            ],
            [
                'name'        => 'Cleaning',
                'icon'        => '🧹',
                'description' => 'Deep cleaning, post-construction cleaning, and regular maintenance.',
                'skills'      => ['Deep Cleaning', 'Post-Construction Cleaning', 'Carpet Cleaning', 'Window Cleaning', 'Office Cleaning', 'Move-In / Move-Out Cleaning'],
            ],
            [
                'name'        => 'Air Conditioning & Heating',
                'icon'        => '❄️',
                'description' => 'AC installation, maintenance, repair, and HVAC systems.',
                'skills'      => ['AC Installation', 'AC Maintenance', 'AC Repair', 'Heating System Repair', 'Ventilation', 'Thermostat Installation'],
            ],
            [
                'name'        => 'Masonry & Tiling',
                'icon'        => '🧱',
                'description' => 'Tile installation, wall cladding, concrete work, and repairs.',
                'skills'      => ['Floor Tiling', 'Wall Tiling', 'Concrete Work', 'Plastering', 'Waterproofing', 'Stone Cladding'],
            ],
            [
                'name'        => 'Moving & Delivery',
                'icon'        => '📦',
                'description' => 'Home moving, furniture delivery, and heavy item transport.',
                'skills'      => ['Home Moving', 'Furniture Delivery', 'Packing & Unpacking', 'Heavy Item Transport', 'Assembly After Move'],
            ],
        ];

        foreach ($data as $item) {
            $category = Category::firstOrCreate(
                ['slug' => Str::slug($item['name'])],
                [
                    'name'        => $item['name'],
                    'icon'        => $item['icon'],
                    'description' => $item['description'],
                ]
            );

            foreach ($item['skills'] as $skillName) {
                Skill::firstOrCreate([
                    'category_id' => $category->id,
                    'name'        => $skillName,
                ]);
            }
        }
    }
}

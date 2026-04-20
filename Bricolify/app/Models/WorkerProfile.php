<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class WorkerProfile extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id', 'bio', 'experience_years',
        'rating_average', 'rating_count',
        'status', 'is_validated', 'validated_at',
    ];

    protected function casts(): array
    {
        return [
            'is_validated'   => 'boolean',
            'validated_at'   => 'datetime',
            'rating_average' => 'decimal:2',
        ];
    }

    // --- Relationships ---
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function skills(): BelongsToMany
    {
        return $this->belongsToMany(Skill::class, 'skill_worker_profile');
    }

    public function applications(): HasMany
    {
        return $this->hasMany(Application::class);
    }

    public function reviews(): HasMany
    {
        return $this->hasMany(Review::class);
    }

    public function assignedRequests(): HasMany
    {
        return $this->hasMany(ServiceRequest::class, 'assigned_worker_profile_id');
    }

    // --- Helpers ---
    public function isActive(): bool  { return $this->status === 'active'; }
    public function isPending(): bool { return $this->status === 'pending'; }
}

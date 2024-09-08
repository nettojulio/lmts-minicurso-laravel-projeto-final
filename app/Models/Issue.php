<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Issue extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'status',
        'priority',
        'project_id',
    ];

    public function project(): BelongsTo
    {
        return $this->belongsTo(Project::class);
    }

    public function projects(): BelongsToMany
    {
        return $this->belongsToMany(Project::class, 'issues_projects')->withTimestamps();
    }

    public function users(): BelongsToMany
    {
        return $this->belongsToMany(User::class, 'issues_projects', 'issue_id', 'user_id');
    }

    public function assigners(): BelongsToMany
    {
        return $this->belongsToMany(User::class, 'issues_projects', 'issue_id', 'user_id');
    }
}

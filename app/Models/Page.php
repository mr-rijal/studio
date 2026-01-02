<?php

namespace App\Models;

use App\Enums\PageStatus;
use App\Traits\HasCompany;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class Page extends Model
{
    use HasCompany, HasFactory, SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'company_id',
        'title',
        'slug',
        'content',
        'excerpt',
        'meta_title',
        'meta_description',
        'meta_keywords',
        'featured_image',
        'status',
        'published_at',
        'user_id',
        'template',
        'order',
        'metadata',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'status' => PageStatus::class,
            'published_at' => 'datetime',
            'metadata' => 'array',
            'order' => 'integer',
        ];
    }

    /**
     * Get the company that owns the page.
     */
    public function company(): BelongsTo
    {
        return $this->belongsTo(Company::class);
    }

    /**
     * Get the user who created the page.
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    /**
     * Scope a query to only include published pages.
     */
    public function scopePublished($query)
    {
        return $query->where('status', PageStatus::PUBLISHED->value)
            ->where(function ($q) {
                $q->whereNull('published_at')
                    ->orWhere('published_at', '<=', now());
            });
    }

    /**
     * Scope a query to only include draft pages.
     */
    public function scopeDraft($query)
    {
        return $query->where('status', PageStatus::DRAFT->value);
    }

    /**
     * Scope a query to only include archived pages.
     */
    public function scopeArchived($query)
    {
        return $query->where('status', PageStatus::ARCHIVED->value);
    }

    /**
     * Check if the page is published.
     */
    public function isPublished(): bool
    {
        return $this->status === PageStatus::PUBLISHED
            && ($this->published_at === null || $this->published_at <= now());
    }
}

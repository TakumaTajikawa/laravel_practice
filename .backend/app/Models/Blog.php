<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use App\Models\User;
use App\Models\Comment;

class Blog extends Model
{
    use HasFactory;

    const OPEN = 1;
    const CLOSED = 0;

    protected $guarded =[];

    /**
     * userモデルとのリレーションを定義
     *
     * @return BelongsTo
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    /**
     * commentテーブルとのリレーションを定義
     *
     * @return HasMany
     */
    public function comments(): HasMany
    {
        return $this->hasMany(Comment::class);
    }

    public function scopeOnlyOpen($query)
    {
        return $query->where('status', self::OPEN);
    }

    /**
     * ブログのステータスが非公開だったらTrueを返す
     *
     * @return boolean
     */
    public function isClosed(): bool
    {
        if ($this->status === self::CLOSED) {
            return true;
        } else {
            return false;
        }
    }
}

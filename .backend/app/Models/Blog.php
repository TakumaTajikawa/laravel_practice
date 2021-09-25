<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use App\Models\User;

class Blog extends Model
{
    use HasFactory;

    /**
     * userモデルとのリレーションを定義
     */
    public function user(): belongsTo
    {
        return $this->belongsTo(User::class);
    }
}

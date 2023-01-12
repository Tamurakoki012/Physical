<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tweet extends Model
{
    use HasFactory;
    protected $table = 'tweets';
    const UPDATED_AT = NULL;
    protected $fillable = [   // <---　追加
        'user_id', 'tweet',
    ];
}
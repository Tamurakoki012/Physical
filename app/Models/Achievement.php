<?php

namespace App\Models;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Achievement extends Model
{
    use HasFactory;
    protected $table = 'achievement';
    const UPDATED_AT = NULL;
    protected $fillable = [
      'user_id',
      'today_exercise', 
      'today_exercise2',
      'today_exercise3',
      'today_record', 
      'today_record2',
      'today_record3',
      'unit',
      'unit2',
      'unit3',
      'created_at',  
    ];

    public function user() {
      return $this->belongsTo(User::class);
    }

    protected static function boot()
    {
        parent::boot();

        // 保存時user_idをログインユーザーに設定
        self::saving(function($achievement) {
            $achievement->user_id = Auth::id();
        });
      }
}

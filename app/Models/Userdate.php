<?php

namespace App\Models;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Userdate extends Model
{
    use HasFactory;
    protected $table = 'user_date';
    const UPDATED_AT = NULL;
    protected $fillable = [
      'user_id','user_name', 'user_tell', 'post', 'prefectures', 'municipality','address','building'
    ];
    public function user() {
      return $this->belongsTo(User::class);
    }

    protected static function boot()
    {
        parent::boot();

        // 保存時user_idをログインユーザーに設定
        self::saving(function($user_date) {
          $user_date->user_id = Auth::id();
        });
      }
}
?>
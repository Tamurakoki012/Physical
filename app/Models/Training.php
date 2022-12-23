<?php

namespace App\Models;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Training extends Model
{
    use HasFactory;
    protected $table = 'target';
    const UPDATED_AT = NULL;
    protected $fillable = [
      'user_id',
      'exercise_name', 
      'exercise_name2',
      'exercise_name3',
      'exercise_record', 
      'exercise_record2',
      'exercise_record3',
      'unit',
      'unit2',
      'unit3',
      'target_num',
      'target_weight', 
      'created_at'   
    ];

    public function user() {
      return $this->belongsTo(User::class);
    }

    protected static function boot()
    {
        parent::boot();

        // 保存時user_idをログインユーザーに設定
        self::saving(function($target) {
          $target->user_id = Auth::id();
        });
      }
}
?>
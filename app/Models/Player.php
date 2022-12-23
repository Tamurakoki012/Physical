<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Player extends Model
{
    use HasFactory;
    protected $table = 'users';
    const UPDATED_AT = NULL;
    protected $fillable = [
      'name', 'email', 'password', 'created_at', 'role'
    ];
}
?>

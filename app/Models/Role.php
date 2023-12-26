<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    use HasFactory;

    // Определение связи "один к одному" с моделью User
    public function User() {
        return $this->hasOne(User::class);
    }
}


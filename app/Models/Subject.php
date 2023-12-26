<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subject extends Model
{
    use HasFactory;

    // Определение связи "один к одному" с моделью Contact
    public function Contact() {
        return $this->hasOne(Contact::class);
    }
}

<?php

namespace App\Models;

use App\Filters\QueryFilter;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    use HasFactory;

    // Определение связи "многие к одному" с моделью Subject
    public function Subject() {
        return $this->belongsTo(Subject::class);
    }

    // Определение связи "многие к одному" с моделью User
    public function User() {
        return $this->belongsTo(User::class);
    }

    // Scope для применения фильтра к запросу
    public function scopeFilter(Builder $builder, QueryFilter $filter){
        return $filter->apply($builder);
    }
}



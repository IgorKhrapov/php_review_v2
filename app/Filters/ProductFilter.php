<?php

namespace App\Filters;

class ProductFilter extends QueryFilter{
    public function subject_id($id = null){
        return $this->builder->when($id, function($query) use($id){
            $query->where('subject_id', $id);
        });
    }

    public function search_field($search_string = ''){
        return $this->builder
            ->where('title', 'LIKE', '%'.$search_string.'%')
            ->orWhere('description', 'LIKE', '%'.$search_string.'%');
    }
}
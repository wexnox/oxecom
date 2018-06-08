<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Category;

class SubCategories extends Model
{
    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}

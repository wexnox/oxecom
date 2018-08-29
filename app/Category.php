<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{

    protected $fillable = ['name'];

    public function product()
    {
        return $this->hasMany(Product::class);
    }

    public function products()
    {
        return $this->hasMany(Product::class, 'id');
    }

    public function subCategories()
    {
        return $this->hasMany(Category::class, 'id');
    }

}

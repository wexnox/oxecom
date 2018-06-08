<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    /**
     * @var string
     */
    protected $fillable = ['name'];

    public function products()
    {
        return $this->hasMany(Product::class, 'id');
    }

    public function subCategories()
    {
        return $this->hasMany(Category::class, 'id');
    }
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
     //Validar
    public static $messages = [
        'name.required' => 'Es necesario ingresar un nombre para la categoría.',
        'name.min' => 'El nombre del categoría debe tener al menos 3 caracteres.',
        'description.max' => 'La descripción solo admite hasta 250 caracteres.',
    ];
    public static $rules = [
        'name' => 'required|min:3',
        'description' => 'max:250',
    ];

    protected $fillable = ['name', 'description'];

    //$category->products
    public function products()
    {
        return $this->hasMany(Product::class);
    }

    public function getFeaturedImageUrlAttribute()
    {
        if($this->image)
            return '/images/categories/'.$this->image;
        //else
        $firstProduct = $this->products()->first();
        if($firstProduct)
            return $firstProduct->featured_image_url;

        return '/images/es-default.jpg';
    }
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductImage extends Model
{
    //$poductImage->product
    public function product()
    {
        return $this->belongsTo(Product::class);
    }
    
    // Accessor
    public function getUrlAttribute()
    {
        # code...
        if(substr($this->image, 0, 4) === "http")
        {
            return $this->image;
        }

        return '/images/products/' . $this->image;
    }
}

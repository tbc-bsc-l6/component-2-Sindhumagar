<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class product extends Model
{
    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    /**
     * Get the author that owns the product.
     */
    public function brand()
    {
        return $this->belongsTo(Brand::class);
    }
}

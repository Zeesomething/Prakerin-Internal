<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = ['id', 'name_product', 'stock', 'price', 'description', 'id_brand'];

    public $timestamps = true;

    public function guru()
    {
        return $this->belongTo(Brand::class, 'id_brand');
    }
}

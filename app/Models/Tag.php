<?php

namespace App\Models;

use App\Models\Product;
use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{



    public function products()
    {

        return $this->belongsToMany(
        Product::class,
            'product_tag',//table between products and tags
            'tags_id',//forginKey for current tage into table Product_tag
            'product_id',//forginkey for product into table ptoduct_tag
            'id', //id primarykey for product
            'id'); //id primarykey for tag




    }




}

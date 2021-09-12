<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Vendor;

class Product extends Model
{
    //


    public function category()
    {
        return $this->belongsTo(Category::class,'category_id','id');
    }



    public function store()
    {
        return $this->belongsTo(Vendor::class,'vendor_id','vendor_id');
    }


    public  function tage()
    {
        return $this->belongsToMany
        (
            Tag::class,
            'product_tag',/*table between products and tags*/
            'product_id',/*forginKey for current Product into table Product_tag*/
            'tags_id', /*forginkey for tag into table ptoduct_tag*/
            'id', /*id primarykey for product*/
            'id');//id primarykey for tag
    }
}

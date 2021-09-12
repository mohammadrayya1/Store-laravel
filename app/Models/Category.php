<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Product;

class Category extends Model
{
    //
    protected  $connection="mysql";
    protected $table="categories";
    protected $primaryKey="id";
    protected $keyType="int";
    public $incrementing =true;
    public $timestamp=true;

    const CREATED_AT = "created_at";
    public const UPDATED_AT = "updated_at";


    public function product()
    {
        return $this->hasMany(Product::class,'category_id','id');
    }


    public function childern()
    {
        return $this->hasMany(Category::class,'parent_id','id');
    }

    public function parant()
    {
        return $this->belongsTo(Category::class,'parent_id','id')->withDefault();
    }

}

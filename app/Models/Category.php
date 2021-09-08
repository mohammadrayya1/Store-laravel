<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;


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
}

<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Tag;
use App\Models\Product;
use Illuminate\Http\Request;

class TagsController extends Controller
{

    public function products($id){

        $tag=Tag::with(['products'=>function($query)
        {
            $query->where('status','<>','in-stock');
        }])->findOrFail($id);
        return $tag->products;
    }
    //
}

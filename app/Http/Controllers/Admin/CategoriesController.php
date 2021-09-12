<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Rules\WordFilter;
use Dotenv\Validator;
use Illuminate\Auth\Events\Validated;
use Illuminate\Http\Request;
use App\Models\Category;
use Illuminate\Support\Str;
use MongoDB\Driver\Query;
use  Illuminate\Validation\Rule;


class CategoriesController extends Controller
{
    public function index(Request $request)
    {


        $categorie=Category::when($request->search,function ($query,$value){

            $query->where('name','LIKE',"%$value");

        })
            ->when($request->parent_id,function ($query,$value){
            $query->where('parent_id','=',$value);
        })
            /*->leftjoin('categories as parant','categories.parent_id','=','parant.id')
            ->select(['categories.*','parant.name as parent_name'])
            */
            //Eger load
            ->with('parant')
            ->get();

        $parents=Category::all();

        return view('admin.categories.index')->with(['categories'=>$categorie,'parants'=>$parents]);
    }
    //
    // retrun page Add data of Categories
    public function create()
    {
            $parents=Category::all();

            return view('admin.categories.create')->with(['parants'=>$parents
                ,'title'=>'Add Category'
                ,'categories'=>new Category()]);

    }

    public function edit($id)
    {

       // $categories=Category::where('id','=',$id)->first();
        $categories=Category::findOrFail($id);
        $parant=Category::all()->where('id','<>',$id);

        //method els
//        if($categories==null)
//        {
//           abort(404);
//        }


        return view('admin.categories.edit')->with(['title'=>'Edit Category','id'=>$id,
            'parants'=>$parant,
            'categories'=>$categories]
           );

    }
    public function update($id,Request $request)
    {
        $this->validateRequest($request);
        $category=Category::find($id);
        $category->name=$request->name;
        $category->slug=Str::slug($request->name);
        $category->status=$request->status;
        $category->parent_id=$request->parent_id;
        $category->save();

        session()->flash('successUpdate','Category updated');
        return redirect('/admin/categories');

    }
    public function delete($id)
    {
        //Methode 1
        $category=Category::find($id);
        $category->delete();
//        // Methode
//        Category::where('id','=',$id)->delete();
//        //Method
//        Category::destroy($id)

        session()->flash('successdelete','Category delete');
        return redirect('/admin/categories');

    }
    public function store(Request $request)
    {
        $this->validateRequest($request);





        $category =new Category();
        $category->name=$request->name;
        $category->slug=Str::slug($request->name);
        $category->status=$request->status;
        $category->parent_id=$request->parent_id;
        $category->save();
        session()->put('status','good');
        session()->flash('success','Category added');
        return redirect()
               ->route("admin.categories.index");




    }
    protected function validateRequest(Request $request)
    {
        $request->validate(   [

            'status'=>['required',Rule::in(['active', 'inactive'])],
            'name'=>['sometimes','required','min:3',Rule::unique('categories', 'name')->ignore($request->id)],
            'description'=>['nullable','min:5','filter:php,laravel'],
            'parent_id'=>['nullable','exists:categories,id'],
            'image'=>['nullable','image','max:1048546','dimensions:min_width=200,min_height=200'],


        ],  ['name.required'=>'هذا الحقل مطلوب']);

    }
}

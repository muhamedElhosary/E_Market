<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;

class categoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $cats =Category::latest()->take(6)->get();
        return view('welcome',compact('cats'));
    }
    public function categories()
    {
        $cats=Category::all();
        return view('category',compact('cats'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $admin=User::all()->last();
        return view('admin.addcategory',compact('admin'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
      
        $request->validate([
            'name'=>'required',
            'description'=>'required',
            'image'=>'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            
        ]);

        $category=new Category;
        $category->name=$request->name;
        $category->description=$request->description;
       
            if ($request->hasFile('image')) {
                $img = $request->file('image');
                $destinationPath = 'assets/img/';
                $productImage = date('YmdHis') . "." . $img->getClientOriginalExtension();
                $img->move(public_path($destinationPath), $productImage);
                $category->image = $destinationPath . $productImage;
            }
       
        $category->save();
        return redirect('/categories'); 
    }

    /**
     * Display the specified resource.
     */
    public function show(Category $categories)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Category $categories)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Category $categories)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {

        $category=Category::where('catid',$id);
        $category->delete();
        return redirect('/categories')->with('success', 'category deleted successfully');;
    }

    public function allcates()
    {
        $admin=User::all()->last();
        $cates=Category::all();
        return view('admin.categories',compact('cates','admin'));
    }

    public function pro_cat($prid)
    {
        $prods=Product::where('pid',$prid)->get();
        $cates=Category::all();
        return view('singleproduct',compact('prods','cates'));
    }
}

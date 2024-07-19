<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\User;
use App\Models\Category;
use Illuminate\Http\Request;


class productsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {   
            $prods=Product::all();
            return view('products',compact('prods'));    
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $admin=User::all()->last();
        return view('admin.addproduct',compact('admin'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name'=>'required',
            'quantity'=>'required',
            'price'=>'required',
            'category_name'=>'required',
            'proimage'=>'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $product=new Product;
        $product->name=$request->name;
        $product->description=$request->description;
        $product->quantity=$request->quantity;
        $product->price=$request->price;
        $product->category_name=$request->category_name;
       
            if ($request->hasFile('proimage')) {
                $image = $request->file('proimage');
                $destinationPath = 'assets/img/';
                $productImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
                $image->move(public_path($destinationPath), $productImage);
                $product->proimage = $destinationPath . $productImage;
            }
        $product->save();
        return redirect('/allproducts');
    }

    /**
     * Display the specified resource.
     */
    public function show($catid)
    {
        
        $prod=Category::where('catid',$catid)->first();
        $catname=$prod->name;
        $prods=Product::where('category_name',$catname)->get();
        return view('products',compact('prods'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $products)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Product $products)
    {
        
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $products=Product::where('pid',$id);
        $products->delete();
        return redirect('/allproducts')->with('success', 'Product deleted successfully');
    }

    public function allprods()
    {       
       
        $admin=User::all()->last();
        $prods=Product::all();
        return view('admin.products',compact('prods','admin'));    
    }

    public function cart_pro($id)
    {   
        $prods=Product::where('pid',$id)->get();
        return view('cart',compact('prods')); 
    }

    public function check_pro($id)
    {   
        $prods=Product::where('pid',$id)->get();
        return view('check',compact('prods'));
    }
}

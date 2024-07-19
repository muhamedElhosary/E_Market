<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;


class customerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function __construct()
    {
        $this->middleware(['auth'])->only('indash');
    }
    public function index()
    {
        $admin=User::all()->last();
        $orders=Customer::all();
        return view('admin.orders',compact('orders','admin'));
    }

    public function indash(Request $request)
    {
        $admin=User::all()->last();
        $clients = Customer::all();
        $sum = 0;

        foreach ($clients as $client) {
            $product_ids = explode(',', $client->product_ids);
            foreach ($product_ids as $id) {
                $product = Product::where('pid', $id)->first();
                if ($product) {
                    $sum += $product->price;
                }
            }
        }

        $sales = $sum;
        
        return view('admin.dashboard', compact('clients', 'sales','admin'));
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
       
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
       
    }

    /**
     * Display the specified resource.
     */
    public function show(Customer $Customer)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Customer $Customer)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Customer $Customer)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $order=Customer::where('id',$id);
        $order->delete();
        return redirect('/orders')->with('success', 'Product deleted successfully');
    }
}

<?php

namespace App\Http\Controllers;
use App\Models\Customer;
use App\Models\Product;
use Illuminate\Http\Request;

class SessionController extends Controller
{
    public function StoreSession(Request $request, $id)
    {
        $product = Product::where('pid', $id)->first();

        if ($product) {
            $products = $request->session()->get('products', collect());
            $products->push($product);
            $request->session()->put('products', $products);
        }

        return redirect('/get');
    }

    public function ViewSession(Request $request)
    {
        $products = $request->session()->get('products', collect());
        return view('cart', compact('products'));
    }


    public function CheckoutSession(Request $request)
    {
        $products = $request->session()->get('products', collect());
        return view('check', compact('products'));
    }


    public function store(Request $request)
    {
    $request->validate([
        'name' => 'required',
        'address' => 'required',
        'phone' => 'required',
        'product_ids' => 'required|array'
    ]);

    $customer = new Customer;
    $customer->name = $request->name;
    $customer->address = $request->address;
    $customer->phone = $request->phone;
    $customer->message = $request->message;

    // تحويل معرّفات المنتجات إلى نص مفصول بفواصل
    $customer->product_ids = implode(',', $request->product_ids);

    $customer->save();

    // مسح السلة بعد تخزين الطلب
    $request->session()->forget('products');

    return redirect('/checkout')->with('success','order added Successfully');
    }

    public function RemoveSession(Request $request, $id)
{
    // الحصول على المنتجات من الجلسة
    $products = $request->session()->get('products', collect());

    // إزالة المنتج من مجموعة المنتجات
    $products = $products->filter(function ($product) use ($id) {
        return $product->pid != $id;
    });

    // حفظ مجموعة المنتجات المحدثة في الجلسة
    $request->session()->put('products', $products);

    // إعادة التوجيه إلى صفحة السلة
    return redirect('/get');
}
}

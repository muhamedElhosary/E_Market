<?php

namespace App\Http\Controllers;

use App\Http\Services\FatoorahService;
use App\Models\Customer;
use App\Models\Product;
use Illuminate\Http\Request;

class FatoorahController extends Controller
{
private $fatoorahservice;
        public function __construct(FatoorahService $fatoorahservice)
        {
            $this->fatoorahservice=$fatoorahservice;
        }

        public function payOrder(Request $request)
        {
            
                $product_ids = $request->input('product_ids');

                // Initialize the sum
                $sum = 0;

                // Loop through each product ID and fetch the product
                foreach ($product_ids as $id) {
                    $product = Product::where('pid', $id)->first(); // Find product by ID

                    // Add the product's price to the sum if the product exists
                    if ($product) {
                        $sum += $product->price;
                    }
                }
                
            $data=[
                "CustomerName" =>$request->name,
                'Address'=>$request->address, //optional
                'CustomerMobile'=>$request->phone,
                "NotificationOption" => "LNK",
                "InvoiceValue" => $sum,
                // "CustomerEmail" => $email,
                "CallBackUrl" => 'http://localhost:8000/payment-callback', 
                "ErrorUrl" => "https://www.google.com",
                "Language" => 'en',
                "DisplayCurrencyIso" =>'SAR' ,
            ];
            
            $order = new Customer(); // Assuming you have an Order model
            $order->name = $request->name;
            $order->address = $request->address;
            $order->phone = $request->phone;
            $order->product_ids = implode(',', $product_ids); // Save product IDs as a comma-separated string
            $order->save();
           // Get the payment response
            $response = $this->fatoorahservice->sendPayment($data);

            // Check if the response contains the required data
            if (isset($response['Data']['InvoiceURL'])) {
                return redirect()->back()->with([
                    'success' => 'Order placed successfully! If you want to pay now, click "Pay Now".',
                    'invoice_url' => $response['Data']['InvoiceURL'], // Add the payment URL to the session
                ]);
            }

            // If something goes wrong, return an error
            return redirect()->back()->withErrors(['error' => 'Unable to process payment at this time.']);

        }

        public function paymentCallBack(Request $request)
        {
            $data = [
                'Key' => $request->paymentId,
                'KeyType' => 'PaymentId',
            ];
        
            $status = $this->fatoorahservice->getPaymentStatus($data);
        
            $order = Customer::where('name', $status['Data']['CustomerName'])->latest()->first();
        
            $order->update([
                'payment_id' => $status['Data']['InvoiceTransactions'][0]['PaymentId']
            ]);
        
            return redirect('/checkout')->with('success', 'Order paid successfully!');
        }
        
}

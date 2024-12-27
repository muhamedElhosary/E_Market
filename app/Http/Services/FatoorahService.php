<?php

namespace App\Http\Services;

use App\Models\Customer;
use GuzzleHttp\Client;
use GuzzleHttp\Psr7\Request;
class FatoorahService
{
private $base_url;
private $headers;
private $request_Client;
/** 
*FatorahService constructor.
*@param Client $request_Client
*/
public function __construct(Client $request_client)
{
    $this->request_Client=$request_client;
    $this->base_url=env('fatoorah_base_url');
    $this->headers=[
        'content-type'=>'application/json',
        'authorization'=>'Bearer '.env('fatoorah_token'),
    ];
    
}

/**
 * @param $uri
 * @param $method
 * @param array $body
 * @return false|mixed
 * @throws \GuzzleHttp\Exception\GuzzleException
 */
private function buildRequest($uri, $method, $data = [])
{
    $request = new Request($method, $this->base_url . $uri, $this->headers);

    // if (!$data) {
    //     return false;
    // }

    $response = $this->request_Client->send($request, [
        'json' => $data
    ]);

    if ($response->getStatusCode() != 200) {
        return false;
    }

    $response = json_decode($response->getBody(), true);
    return $response;
}

/**
 * @param $patient_id
 * @param $value
 * @return mixed
 */
public function sendPayment($data)
{
    
        $response = $this->buildRequest('v2/SendPayment', 'post', $data);
    
        // Return the response instead of redirecting
        return $response;
    
}

public function getPaymentStatus($data)
{
    return $response=$this->buildRequest('v2/GetPaymentStatus','post',$data);
    
}
/**
 * @param $patient_id
 * @param $invoice_id
 */
private function saveTransactionPayment($patient_id, $invoice_id)
{
    // Implementation for saving the transaction payment
}

public function transactionCallback(Request $request)
{
    return $request;
}


}
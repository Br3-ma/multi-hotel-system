<?php

namespace App\Traits;


trait RaveTrait {


    public function paynow($request){
        // Send payment to flutterwave for processing...
        $curl = curl_init();

        curl_setopt_array($curl, array(
        CURLOPT_URL => 'https://api.flutterwave.com/v3/payments',
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => '',
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 0,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => 'POST',
        CURLOPT_POSTFIELDS => json_encode($request),
        CURLOPT_HTTPHEADER => array(
            'Authorization: Bearer FLWSECK_TEST-eee25be1b44ef9a132a872075b3a0910-X', //Get your Secrete key from flutterwave dashboard.
            'Content-Type: application/json'
        ),

        ));

        $response = curl_exec($curl);

        // echo  '<pre>';
        // echo $response;
        // echo '</pre>';

        curl_close($curl);

        $res = json_decode($response);

        // Redirect to payment validation
        if ($res->status === 'success') {
            
            $link = $res->data->link;
            header('Location: '.$link);
        }
        else{

            echo "We can't process your payment";
        }
    }




}
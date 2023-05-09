<?php

namespace App\Traits;

use App\Models\Billing;
use App\Models\User;

trait PaymentTrait {
    public $users, $pf, $appointment, $chat, $billing;

        public function __construct(User $users, Billing $billing)
        {
            $this->middleware('auth');
            $this->users = $users;
            $this->billing = $billing;
            $this->middleware(['auth', 'verified']);
        }

        public function getToken($creditials){
            $curl = curl_init();
            
            curl_setopt_array($curl, array(
              CURLOPT_URL => 'https://tiltafrica.eu.auth0.com/oauth/token',
              CURLOPT_RETURNTRANSFER => true,
              CURLOPT_ENCODING => '',
              CURLOPT_MAXREDIRS => 10,
              CURLOPT_TIMEOUT => 0,
              CURLOPT_FOLLOWLOCATION => true,
              CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
              CURLOPT_CUSTOMREQUEST => 'POST',
              CURLOPT_POSTFIELDS =>'{
              "username": "joe@example.com",
              "password": "blowfish-t#ought4l-3ostly-conceal",
              "audience": "https://api.tiltafrica.com/tilt-pay",
              "grant_type": "password",
              "client_id": "hK20skkNQKl123m22duNSJ"
            }',
              CURLOPT_HTTPHEADER => array(
                'Content-Type: application/json',
                'Authorization: Bearer {{bearerToken}}',
                'Cookie: __cf_bm=irvUj2a5f7mSLECShb5YI1_0JLd3VHoHU3Zdwp2hfjY-1674135173-0-AWRRAKC8vEYSzT/18/gv9ar1qXMovGDyjvB7MR8OX/JHrhVPKP7LK2IQplsH2/9S+z/zhPIXxCsb7m+E2f7aHKc=; did=s%3Av0%3A1b034250-97fa-11ed-ac70-910eed14fd87.3oxwG1TE9qVchHyLRUFPb1EGcR0WfDODxEjaY%2Bt86W4; did_compat=s%3Av0%3A1b034250-97fa-11ed-ac70-910eed14fd87.3oxwG1TE9qVchHyLRUFPb1EGcR0WfDODxEjaY%2Bt86W4'
              ),
            ));
            
            $response = curl_exec($curl);
            
            curl_close($curl);
            echo $response;
            
        }

        public function makePayments($req){
            $curl = curl_init();

            curl_setopt_array($curl, array(
              CURLOPT_URL => 'https://tiltafrica.stoplight.io/mocks/tiltafrica/tilt-pay/2826742/v1/payments',
              CURLOPT_RETURNTRANSFER => true,
              CURLOPT_ENCODING => '',
              CURLOPT_MAXREDIRS => 10,
              CURLOPT_TIMEOUT => 0,
              CURLOPT_FOLLOWLOCATION => true,
              CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
              CURLOPT_CUSTOMREQUEST => 'POST',
              CURLOPT_POSTFIELDS =>'{
              "instruction": {
                "payment_scheme": "pay_later",
                "external_transaction_id": "8e7fdb73-6b67-4d7e-8e1d-603545abe756",
                "recipient": {
                  "name": "John Snow",
                  "mobile_number": "260961234567",
                  "notify_recipient": false
                },
                "recipient_verification": {
                  "require_otp": false,
                  "require_password": false,
                  "password_description": "",
                  "password_value": ""
                },
                "creditor_display_name": "My Company Name",
                "display_reference": "January 2021 Rent",
                "internal_reference": "INV123456",
                "amount": 50,
                "country": "zm",
                "currency": "zmw",
                "valid_until": "2021-02-01T00:00:00+0200"
              }
            }',
              CURLOPT_HTTPHEADER => array(
                'Content-Type: application/json',
                'Authorization: Bearer {{bearerToken}}'
              ),
            ));
            
            $response = curl_exec($curl);
            
            curl_close($curl);
            echo $response;
            
        }

        public function __verfiyPayment($id){
            $curl = curl_init();

            curl_setopt_array($curl, array(
            CURLOPT_URL => 'https://tiltafrica.stoplight.io/mocks/tiltafrica/tilt-pay/2826742/v1/payments/verify/94ce4401-00fa-4482-8fa5-0d91671fe8c2',
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'GET',
            CURLOPT_HTTPHEADER => array(
                'Authorization: Bearer {{bearerToken}}'
            ),
            ));

            $response = curl_exec($curl);

            curl_close($curl);
            echo $response;

        }

        public function __fetchPayments($id){
            $curl = curl_init();

            curl_setopt_array($curl, array(
            CURLOPT_URL => 'https://tiltafrica.stoplight.io/mocks/tiltafrica/tilt-pay/2826742/v1/payments/cb849a50-d80f-476c-b22e-803d4032f05c',
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'GET',
            CURLOPT_HTTPHEADER => array(
                'Authorization: Bearer {{bearerToken}}'
            ),
            ));

            $response = curl_exec($curl);

            curl_close($curl);
            echo $response;

        }
        
}
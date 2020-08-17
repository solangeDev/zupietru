<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use PayPal\Api\Amount;
use PayPal\Api\Details;
use PayPal\Api\Item;

/** All Paypal Details class **/
use PayPal\Api\ItemList;
use PayPal\Api\Payer;
use PayPal\Api\Payment;
use PayPal\Api\PaymentExecution;
use PayPal\Api\RedirectUrls;
use PayPal\Api\Transaction;
use PayPal\Auth\OAuthTokenCredential;
use PayPal\Rest\ApiContext;


use Redirect;
use Session;
use URL;
use App\Http\Controllers\MailController;

class PaypalController extends Controller
{
    public function __construct()
    {
    /** PayPal api context **/
            $paypal_conf = \Config::get('paypal');
            $this->_api_context = new ApiContext(new OAuthTokenCredential(
                $paypal_conf['client_id'],
                $paypal_conf['secret'])
            );
            $this->_api_context->setConfig($paypal_conf['settings']);
    }

    public function payWithpaypal(Request $request)
    {
        dd($request);
        $data=$request->data;
        //datos de session
        $presentation_act=$data['presentation_act'];
        $order=array();
        if($presentation_act==1){
            $order=$data['products_cart']['delivery'];
        }else if($presentation_act==2){
            $order=$data['products_cart']['store'];
        }
        $address=$data["address"];
        $session=array();
        $session["address"]=$address;
        $session["order"]=$order;
        $session["total"]=$data["total"];
        $session["email"]=$session["address"]["email"];
        $session["name"]=$session["address"]["name"];

        \Session::put('order',$session);
        \Session::put('success',null);
        \Session::put('error',null);

        $payer = new Payer();
        $payer->setPaymentMethod('paypal');
        $item_1 = new Item();
        $item_1->setName('Item 1') /** item name **/
                    ->setCurrency('EUR')
                    ->setQuantity(1)
                    ->setPrice($request->data['total']); /** unit price **/
       
        $item_list = new ItemList();
                $item_list->setItems(array($item_1));
        
        $amount = new Amount();
                $amount->setCurrency('EUR')
                    ->setTotal($request->data['total']);
        
        $transaction = new Transaction();
                $transaction->setAmount($amount)
                    ->setItemList($item_list)
                    ->setDescription('Your transaction description');
        
         $redirect_urls = new RedirectUrls();
            $redirect_urls->setReturnUrl(URL::to('status')) /** Specify return URL **/
                ->setCancelUrl(URL::to('status'));
        
        $payment = new Payment();
                $payment->setIntent('Sale')
                    ->setPayer($payer)
                    ->setRedirectUrls($redirect_urls)
                    ->setTransactions(array($transaction));
                /** dd($payment->create($this->_api_context));exit; **/
                try {
                $payment->create($this->_api_context);
                    } catch (\PayPal\Exception\PPConnectionException $ex) {
                        if (\Config::get('app.debug')) {
                            \Session::put('error', 'Connection timeout');
                        //dd("error 1");
                        //return Redirect::route('paywithpaypal');
                        return response()->json( ['ex'=>$ex->getMessage(),'msj' => 'Connection timeout' , 'status' => 'error' ],500);
                    } else {
                        \Session::put('error', 'Some error occur, sorry for inconvenient');
                        //dd("error 2");
                        //return Redirect::route('paywithpaypal');
                        return response()->json( ['ex'=>$ex->getMessage(),'msj' => 'Some error occur, sorry for inconvenient' , 'status' => 'error' ],500);
                    }
        }
        foreach ($payment->getLinks() as $link) {
            if ($link->getRel() == 'approval_url') {
                $redirect_url = $link->getHref();
                break;
            }
        }
        /** add payment ID to session **/
        Session::put('paypal_payment_id', $payment->getId());
        if (isset($redirect_url)) {
        /** redirect to paypal **/
             return response()->json( ['url'=>$redirect_url,'msj' => 'satisfactorio' , 'status' => 'success' ],200);
        }
        \Session::put('error', 'Unknown error occurred');
             return response()->json( ['msj' => 'Some error occur, sorry for inconvenient' , 'status' => 'error' ],500);
            //dd("aqui");
            //return Redirect::route('paywithpaypal');
        }

         public function getPaymentStatus()
        {
            
            /** Get the payment ID before session clear **/
            $payment_id = Session::get('paypal_payment_id');

            /** clear the session payment ID **/
            Session::forget('paypal_payment_id');
            if (empty(Input::get('PayerID')) || empty(Input::get('token'))) {

                \Session::put('error', 'Payment failed');
                return Redirect::to('/payment');

            }

            $payment = Payment::get($payment_id, $this->_api_context);
            $execution = new PaymentExecution();
            $execution->setPayerId(Input::get('PayerID'));

            /**Execute the payment **/
            $result = $payment->execute($execution, $this->_api_context);

            if ($result->getState() == 'approved') {
                 $array=\Session::get('order');
                 // dd($array);
                 MailController::sendMail($array, 'order');
                \Session::put('success', 'Payment success');
                return Redirect::to('/payment');
            }
            //dd("no");
            \Session::put('error', 'Payment failed');
            return Redirect::to('/payment');
        }


       function getSession(){
            try {
                $data=\Session::all();
                $msj=null;
                if(\Session::get('success')=='Payment success'){
                    $msj="Payment success";
                    \Session::put('order',null);
                    \Session::put('success',null);
                     \Session::put('error',null);
                   return response()->json( ['session' => $msj , 'status' => 'true' ],200);
                }else if(\Session::get('error')=="Payment failed"){
                    $msj="Payment failed";
                     \Session::put('order',null);
                     \Session::put('success',null);
                     \Session::put('error',null);
                    return response()->json( ['session' => $msj , 'status' => 'false' ],500);
                } 
            } catch (Exception $e) {
                return response()->json( ['session' => array() , 'status' => 'false' ],500);
            }        
        }
}

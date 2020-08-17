<?php

namespace App\Http\Controllers;

use Mail;

class MailController extends Controller
{
	public function sendMail($request,$plantilla)
	{
		$request['subject']		= isset($request['subject'])?$request['subject']:'Information';
		$request['msg']			= isset($request['msg'])?$request['msg']:'';
		$request['plantilla'] 	= 'emails.'.$plantilla;
		
		$subject 				= $request['subject'];
		$destinatario 			= $request['email'];

		try{
			$response = Mail::send($request['plantilla'], $request, function ($message) use ($destinatario, $subject) {
				$message->to($destinatario)->subject($subject);
			});
		}catch(\Swift_TransportException $e){
			return $e->message();
			abort(405);
		}
		
		try{
			Mail::send($request['plantilla'], $request, function ($message) use ($subject) {
				$message->to("info@pizzeriadaadriano.com")->subject($subject);
			});
		}catch(\Swift_TransportException $e){
			return $e->message();
			abort(405);
		}

		return "OK";
	}
}

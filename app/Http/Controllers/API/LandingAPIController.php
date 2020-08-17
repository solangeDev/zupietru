<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\Admin\CreateNewsletterUserAPIRequest;
use App\Repositories\Admin\NewsletterUserRepository;
use App\Http\Controllers\AppBaseController;
use App\Http\Controllers\MailController;
use Illuminate\Http\Request;

class LandingAPIController extends AppBaseController
{
	/** @var  NewsletterUserRepository */
    private $newsletterUserRepository;

    public function __construct(NewsletterUserRepository $newsletterUserRepo)
    {
        $this->newsletterUserRepository = $newsletterUserRepo;
    }

	/**
	* Send the email to contact us.
	*
	* @param  \Illuminate\Http\Request  $request
	* @return \Illuminate\Http\Response
	*/
	public function contactUs(Request $request)
	{
		try{
			$flag="ERROR NO ENVIO";

			$mail = new MailController();
			/* Enviar el request y la plantilla | Send the request and template */
			$send=$mail->sendMail($request->all(),'contact');

			if($send=='OK'){
				$flag="FINO";
			}

			return response()->json($flag, 200);
		}catch(Exeption $e){
			return $e->message();
		}
	}

	/**
	* Send the email to newsletter.
	*
	* @param  \Illuminate\Http\Request  $request
	* @return \Illuminate\Http\Response
	*/
	public function newsLetter(CreateNewsletterUserAPIRequest $request)
	{
		try{
			$exist = $this->newsletterUserRepository->findByField('email',$request->email)->first();
			if(!$exist){
				$newsletterUsers = $this->newsletterUserRepository->create($request->all());
				$mail = new MailController();
				/* Enviar el request y la plantilla | Send the request and template */
				$send=$mail->sendMail($request->all(),'newsletter');
				if($send=='OK'){
	        		return $this->sendResponse($newsletterUsers->toArray(), 'Newsletter User saved successfully');
				}
			}

			return response()->json(["success"=>true,"message"=>"Ya se encuentra suscrito."]);
		}catch(Exeption $e){
			return $e->message();
		}
	}
}

<?php

namespace App\Http\Controllers\Site\Form;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Mail;

use App\Helpers\Site\HelpSite;
use App\Http\Requests\Site\Form\Ombudsman\ReqSend;

class OmbudsmanController extends Controller
{
    public function __construct()
    {
        // $this->middleware('auth');
    }



    public function send(ReqSend $req) {
        $data = $req->all();
        $data['form_message'] = $data['message'];

        
        if (!HelpSite::verifyRecaptcha($data['g-recaptcha-response'])) {
            return redirect()->route('site.recaptcha');
        }

        $data['form_content'] = 'Mensagem enviada para a Ouvidoria';
        Mail::send('Site.forms.email_shipping_confirmation', $data, function($message) use ($data){
            $message->from('no-reply@casembrapa.org.br');
            $message->to($data['email']);
            // $message->cc(['augusto@agencialaweb.com.br', 'no-reply@casembrapa.org.br']);
            $message->subject('Formulário - Confirmação de envio');
        });

        Mail::send('Site.forms.ombudsman.send', $data, function($message) use ($data){
            $message->from('no-reply@casembrapa.org.br');
            $message->to('ouvidoria@casembrapa.org.br');
            // $message->to('augusto@agencialaweb.com.br');
            // $message->cc(['augusto@agencialaweb.com.br', 'no-reply@casembrapa.org.br']);
            $message->subject('Formulário - OUVIDORIA');
        });
        
        return redirect()->route('site.form.shipping_confirmation');
    }
}

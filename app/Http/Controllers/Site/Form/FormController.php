<?php

namespace App\Http\Controllers\Site\Form;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class FormController extends Controller
{
    public function __construct()
    {
        // $this->middleware('auth');
    }



    public function shippingConfirmation() {
        return view('Site.forms.shipping_confirmation');
    }
}

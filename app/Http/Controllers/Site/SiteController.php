<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Helpers\Site\HelpPosts;
use App\Helpers\Site\HelpSite;
use App\Helpers\HelpAdmin;

use App\Models\Site\Post\Post;
use App\Models\Site\Home\SliderSite;
use App\Models\Site\Post\FeaturedPost;
use App\Models\Admin\Wallet\CasembrapaWallet;

class SiteController extends Controller
{
    public function __construct() {
        // $this->middleware('auth');
    }



    public function index(Request $req) {
        // set_time_limit(10000000000);
        // $req->session()->forget('temporary_user');
        // Auth::logout();


        $data['sliders_site'] = SliderSite::orderBy('created_at', 'desc')->get();
        // dd(\Auth::user());

        return view('Site.index', compact('data'));
    }

    public function recaptcha() {
        return view('Site.recaptcha');
    }
    
    // STATICS
    public function about() {
        return view('Site.statics.about');
    }
    
    public function contactUs() {
        return view('Site.statics.contact_us');
    }
    
     public function talkToLegal() {
        return view('Site.statics.talk_to_legal');
    }
    
    public function nationalExecutiveBoard() {
        return view('Site.statics.national_executive_board');
    }
    
    public function positionAssignmentsPecfaz() {
        return view('Site.statics.position_assignments_pecfaz');
    }
    
    public function accountability() {
        return view('Site.statics.accountability');
    }
    
    public function regionalRepresentatives() {
        return view('Site.statics.regional_representatives');
    }
    
    public function talkToLegalPage() {
        return view('Site.statics.talk_to_legal_page');
    }
    
    public function agreement() {
        return view('Site.statics.agreement');
    }
    
    public function exchangeBank() {
        return view('Site.statics.exchange_bank');
    }
    
     public function processMapping() {
        return view('Site.statics.process_mapping');
    }
    
    public function enrollment() {
        return view('Site.statics.enrollment');
    }
    
    
 
    
    
   
  
   
    
    
    
    // STATICS

    // MODELO CONTROLLER
    // public function nomeDaFunção()
    // {
    //     return view('caminho_da_pagina_criada_em_html');
    // }
    // STATICS
};
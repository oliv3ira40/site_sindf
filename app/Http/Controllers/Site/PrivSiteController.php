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

class PrivSiteController extends Controller {
    public function __construct() {
        $this->middleware('auth');
    }



    // Private statics
    public function bylaws() {
        return view('Site.statics.priv.bylaws');
    }
    
    public function electoralRegiment() {
        return view('Site.statics.priv.electoral_regiment');
    }
    
    public function processMapping() {
        return view('Site.statics.priv.process_mapping');
    }
    
    public function accountability() {
        return view('Site.statics.priv.accountability');
    }
    
    public function positionAssignmentsPecfaz() {
        return view('Site.statics.priv.position_assignments_pecfaz');
    }
    // Private statics
}

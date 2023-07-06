<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests;
use Illuminate\Support\Facades\Validator;

use App\Models\Blog;
use App\Models\Contact;
use App\Models\Event;
use App\Models\Feature;
use App\Models\GlobalSetting as Setting;
use App\Models\Newsletter;
use App\Models\Schedule;
use App\Models\Section;
use App\Models\Slider;
use App\Models\Social;
use App\Models\Sponsor;
use App\Models\User;

use SweetAlert;
use Mail;
use Alert;
use Log;
use Carbon\Carbon;

class WelcomeController extends Controller
{
    //

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('welcome');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function aboutUs()
    {
        return view('about-us');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function events()
    {
        return view('our-events');
    }


     /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function blogs()
    {
        return view('our-blog');
    }


    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function contact()
    {
        return view('contact');
    }


    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function singleEvent($slug)
    {
        return view('singleEvent');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function singleBlog($slug)
    {
        return view('singleBlog');
    }
}

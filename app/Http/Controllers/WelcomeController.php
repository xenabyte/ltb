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

use App\Models\Blog as News;
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
    const STATUS_UNPUBLISH = 'unpublish';
    const STATUS_PUBLISHED = 'publish'; 

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $sliders = Slider::get();
        $sections = Section::where('position', 'homepage')->get();
        $news = News::with('event')->where('status', self::STATUS_PUBLISHED)->get();

        return view('welcome', [
            'sliders' => $sliders,
            'sections' => $sections,
            'news' => $news,
        ]);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function aboutUs()
    {
        $sections = Section::where('position', 'about')->get();

        return view('about-us', [
            'sections' => $sections,
        ]);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function events()
    {
        $sections = Section::where('position', 'event')->get();
        $events = Event::all();

        return view('our-events', [
            'sections' => $sections,
            'events' => $events,
        ]);
    }


     /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function blogs()
    {
        $news = News::with('event')->where('status', self::STATUS_PUBLISHED)->get();

        return view('our-blog', [
            'news' => $news,
        ]);
    }


    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function contact()
    {
        return view('contact-us');
    }


    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function singleEvent($slug)
    {
        $event = Event::with('features', 'sponsors', 'schedules', 'blogs')->where('slug', $slug)->first();

        return view('singleEvent', [
            'event' => $event
        ]);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function singleBlog($slug)
    {
        $blog = News::with('event')->where('slug', $slug)->first();
        $news = News::with('event')->where('status', self::STATUS_PUBLISHED)->get();

        if(empty($blog)){
            alert()->error('Oops!', 'News details not available')->persistent('Close');
            return redirect()->back();
        }

        return view('singleBlog', [
            'blog' => $blog,
            'news' => $news,
        ]);
    }

}

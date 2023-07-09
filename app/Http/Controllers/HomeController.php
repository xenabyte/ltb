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

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }

    public function setting(){
        $setting = Setting::first();
        $social = Social::first();
        return view('globalSettings', [
            'siteInfo' => $setting,
            'social' => $social
        ]);
    }

    public function updateSiteInfo(Request $request){
        $validator = Validator::make($request->all(), [
            'logo' => 'nullable|image',
            'footer_logo' => 'nullable|image', //|dimensions:width=168,height=41
        ]);

        if($validator->fails()) {
            alert()->error('Error', $validator->messages()->all()[0])->persistent('Close');
            return redirect()->back();
        }

        $siteInfo = new Setting;
        if(!empty($request->siteinfo_id) && !$siteInfo = Setting::find($request->siteinfo_id)){
            alert()->error('Oops', 'Invalid Site Information')->persistent('Close');
            return redirect()->back();
        }

        if(!empty($request->start_year) &&  $request->start_year != $siteInfo->start_year){
            $siteInfo->start_year = $request->start_year;
        }


        if(!empty($request->description) &&  $request->description != $siteInfo->description){
            $siteInfo->description = $request->description;
        }

        if(!empty($request->keywords) &&  $request->keywords != $siteInfo->keywords){
            $siteInfo->keyword = $request->keywords;
        }

        if(!empty($request->address) &&  $request->address != $siteInfo->address){
            $siteInfo->address = $request->address;
        }

        if(!empty($request->email) && $request->email != $siteInfo->email){
            $siteInfo->email = $request->email;
        }

        if(!empty($request->phone) && $request->phone != $siteInfo->phone){
            $siteInfo->phone = $request->phone;
        }

        if(!empty($request->logo)){
            $imageUrl = 'uploads/siteInfo/logoa.'.$request->file('logo')->getClientOriginalExtension();
            $image = $request->file('logo')->move('uploads/siteInfo', $imageUrl);

            $siteInfo->logo = $imageUrl;
        }

        if(!empty($request->banner)){
            $imageUrl = 'uploads/siteInfo/bannera.'.$request->file('banner')->getClientOriginalExtension();
            $image = $request->file('banner')->move('uploads/siteInfo', $imageUrl);

            $siteInfo->banner = $imageUrl;
        }

        if(!empty($request->footer_logo)){

            $imageUrl = 'uploads/siteInfo/footer_logoa.'.$request->file('footer_logo')->getClientOriginalExtension();
            $image = $request->file('footer_logo')->move('uploads/siteInfo', $imageUrl);

            $siteInfo->footer_logo = $imageUrl;
        }

        if($siteInfo->save()){
            alert()->success('Changes Saved', 'Site informationn changes saved successfully')->persistent('Close');
            return redirect()->back();
        }

        alert()->error('Oops!', 'Something went wrong')->persistent('Close');
        return redirect()->back();
    }

    public function updateSocialAccounts(Request $request){

        $social = new Social;
        if(!empty($request->social_id) && !$social = Social::find($request->social_id)){
            alert()->error('Oops', 'Invalid Social Information')->persistent('Close');
            return redirect()->back();
        }

        if(!empty($request->facebook) &&  $request->facebook != $social->facebook){
            $social->facebook = $request->facebook;
        }

        if(!empty($request->twitter) &&  $request->twitter != $social->twitter){
            $social->twitter = $request->twitter;
        }

        if(!empty($request->linkedIn) &&  $request->linkedIn != $social->linkedIn){
            $social->linkedin = $request->linkedIn;
        }

        if(!empty($request->instagram) && $request->instagram != $social->instagram){
            $social->instagram = $request->instagram;
        }

        if(!empty($request->youtube) && $request->youtube != $social->youtube){
            $social->youtube = $request->youtube;
        }

        if($social->save()){
            alert()->success('Changes Saved', 'Social accounts changes saved successfully')->persistent('Close');
            return redirect()->back();
        }

        alert()->error('Oops!', 'Something went wrong')->persistent('Close');
        return redirect()->back();
    }

    public function sliders(){
        $sliders = Slider::get();

        return view('slider', [
            'sliders' => $sliders
        ]);
    }

    public function addSlider(Request $request){
        $validator = Validator::make($request->all(), [
            'title' => 'nullable',
            'image' => 'required|image|dimensions:min_width=1510,min_height=640,max_width=1930,max_height=780',
            'description' => 'nullable',
        ]);

        if($validator->fails()) {
            alert()->error('Error', $validator->messages()->all()[0])->persistent('Close');
            return redirect()->back();
        }

        if(!empty($request->title)){
            $slug = strtolower(trim(preg_replace('/[^A-Za-z0-9-]+/', '-', $request->title)));
        }

        $imageUrl = 'uploads/sliders/'.$slug.'.'.$request->file('image')->getClientOriginalExtension();
        $image = $request->file('image')->move('uploads/sliders', $imageUrl);

        $addSlider = ([            
            'title' => $request->title,
            'image' => $imageUrl,
            'button_text' => $request->button_text,
            'button_link' => $request->button_link,
            'description' => $request->description,
        ]);

        if(Slider::create($addSlider)){
            alert()->success('Slider added successfully', '')->persistent('Close');
            return redirect()->back();
        }

        alert()->error('Oops!', 'Something went wrong')->persistent('Close');
        return redirect()->back();
    }

    public function updateSlider(Request $request){
        $validator = Validator::make($request->all(), [
            'slider_id' => 'required|min:1',
            'image' => 'nullable|image|dimensions:min_width=1910,min_height=750,max_width=1930,max_height=780'
        ]);


        if($validator->fails()) {
            alert()->error('Error', $validator->messages()->all()[0])->persistent('Close');
            return redirect()->back();
        }

        if(!$slider = Slider::find($request->slider_id)){
            alert()->error('Oops', 'Invalid Slider ')->persistent('Close');
            return redirect()->back();
        }

        $slug = time();

        if(!empty($request->title)){
            $slug = strtolower(trim(preg_replace('/[^A-Za-z0-9-]+/', '-', $request->title)));
        }

        if(!empty($request->title) &&  $request->title != $slider->title){
            $slider->title = $request->title;
        }

        if(!empty($request->button_text) &&  $request->button_text != $slider->button_text){
            $slider->button_text = $request->button_text;
        }

        if(!empty($request->button_link) &&  $request->button_link != $slider->button_link){
            $slider->button_link = $request->button_link;
        }

        if(!empty($request->description) &&  $request->description != $slider->description){
            $slider->description = $request->description;
        }

        if(!empty($request->image)){
           
            $imageUrl = 'uploads/sliders/'.$slug.'.'.$request->file('image')->getClientOriginalExtension();
            $image = $request->file('image')->move('uploads/sliders', $imageUrl);

            $slider->image = $imageUrl;
        }

        if($slider->save()){
            alert()->success('Changes Saved', 'Slider changes saved successfully')->persistent('Close');
            return redirect()->back();
        }
    }

    public function deleteSlider(Request $request){
        $validator = Validator::make($request->all(), [
            'slider_id' => 'required|min:1',
        ]);

        if($validator->fails()) {
            alert()->error('Error', $validator->messages()->all()[0])->persistent('Close');
            return redirect()->back();
        }

        if(!$slider = Slider::find($request->slider_id)){
            alert()->error('Oops', 'Invalid Slider')->persistent('Close');
            return redirect()->back();
        }

        if($slider->delete()){ 
            alert()->success('Record Deleted', '')->persistent('Close');
            return redirect()->back();
        }


        alert()->error('Oops!', 'Something went wrong')->persistent('Close');
        return redirect()->back();
    }


    public function testimonial(){
        $testimonials = Testimonial::all();

        return view('testimonial', [
            'testimonials' => $testimonials 
        ]);
    }

    public function addTestimony(Request $request){
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'image' => 'required|image',
            'testimony' => 'required',
        ]);

        if($validator->fails()) {
            alert()->error('Error', $validator->messages()->all()[0])->persistent('Close');
            return redirect()->back();
        }

        if(!empty($request->name)){
            $slug = strtolower(trim(preg_replace('/[^A-Za-z0-9-]+/', '-', $request->name)));
        }

        $imageUrl = 'uploads/testimonial/'.$slug.'.'.$request->file('image')->getClientOriginalExtension();
        $image = $request->file('image')->move('uploads/testimonial', $imageUrl);

        $addTestimony = ([            
            'name' => $request->name,
            'testimony' => $request->testimony,
            'image' => $imageUrl,
        ]);

        if(Testimonial::create($addTestimony)){
            alert()->success('Testimonial added successfully', '')->persistent('Close');
            return redirect()->back();
        }

        alert()->error('Oops!', 'Something went wrong')->persistent('Close');
        return redirect()->back();
    }

    public function updateTestimony(Request $request){
        $validator = Validator::make($request->all(), [
            'testimony_id' => 'required|min:1',
        ]);


        if($validator->fails()) {
            alert()->error('Error', $validator->messages()->all()[0])->persistent('Close');
            return redirect()->back();
        }

        if(!$testimonial = Testimonial::find($request->testimony_id)){
            alert()->error('Oops', 'Invalid Testimonial ')->persistent('Close');
            return redirect()->back();
        }

        if(!empty($request->name) &&  $request->name != $testimonial->name){
            $testimonial->name = $request->name;
        }

        if(!empty($request->testimony) &&  $request->testimony != $testimonial->testimony){
            $testimonial->testimony = $request->testimony;
        }

        if(!empty($request->image)){
            $slug = strtolower(trim(preg_replace('/[^A-Za-z0-9-]+/', '-', $testimonial->name)));

            $imageUrl = 'uploads/testimonial/'.$slug.'.'.$request->file('image')->getClientOriginalExtension();
            $image = $request->file('image')->move('uploads/testimonial', $imageUrl);   

            $testimonial->image = $imageUrl;
        }

        if($testimonial->save()){
            alert()->success('Changes Saved', 'Testimony changes saved successfully')->persistent('Close');
            return redirect()->back();
        }
    }

    public function deleteTestimony(Request $request){
        $validator = Validator::make($request->all(), [
            'testimony_id' => 'required|min:1',
        ]);

        if($validator->fails()) {
            alert()->error('Error', $validator->messages()->all()[0])->persistent('Close');
            return redirect()->back();
        }

        if(!$testimonial = Testimonial::find($request->testimony_id)){
            alert()->error('Oops', 'Invalid Testimonial ')->persistent('Close');
            return redirect()->back();
        }

        if($testimonial->delete()){ 
            alert()->success('Record Deleted', '')->persistent('Close');
            return redirect()->back();
        }


        alert()->error('Oops!', 'Something went wrong')->persistent('Close');
        return redirect()->back();
    }

    public function sections(){
        $sections = Section::all();

        return view('section', [
            'sections' => $sections 
        ]);
    }

    public function addSectionItem(Request $request){
        $validator = Validator::make($request->all(), [
            'title' => 'required',
            'description' => 'required',
            'image' => 'nullable',
            'type' => 'required',
            'location' => 'required',
        ]);

        if($validator->fails()) {
            alert()->error('Error', $validator->messages()->all()[0])->persistent('Close');
            return redirect()->back();
        }

        if(!empty($request->title)){
            $slug = strtolower(trim(preg_replace('/[^A-Za-z0-9-]+/', '-', $request->title)));
        }

        $imageUrl = 'uploads/section/'.$slug.'.'.$request->file('image')->getClientOriginalExtension();
        $image = $request->file('image')->move('uploads/section', $imageUrl);

        $addItem = ([            
            'title' => $request->title,
            'type' => $request->type,
            'image' => $imageUrl,
            'description' => $request->description,
            'link' => $request->link,
            'position' => $request->position
        ]);

        if(Section::create($addItem)){
            alert()->success('Item added successfully', '')->persistent('Close');
            return redirect()->back();
        }

        alert()->error('Oops!', 'Something went wrong')->persistent('Close');
        return redirect()->back();
    }

    public function updateSectionItem(Request $request){
        $validator = Validator::make($request->all(), [
            'section_id' => 'required|min:1',
        ]);


        if($validator->fails()) {
            alert()->error('Error', $validator->messages()->all()[0])->persistent('Close');
            return redirect()->back();
        }

        if(!$section = Section::find($request->section_id)){
            alert()->error('Oops', 'Invalid Section Item ')->persistent('Close');
            return redirect()->back();
        }

        if(!empty($request->title) &&  $request->title != $section->title){
            $section->title = $request->title;
        }

        if(!empty($request->type) &&  $request->type != $section->type){
            $section->type = $request->type;
        }

        if(!empty($request->link) &&  $request->link != $section->link){
            $section->link = $request->link;
        }

        if(!empty($request->position) &&  $request->position != $section->position){
            $section->position = $request->position;
        }

        if(!empty($request->image)){

            $imageUrl = 'uploads/section/'.$slug.'.'.$request->file('image')->getClientOriginalExtension();
            $image = $request->file('image')->move('uploads/section', $imageUrl);

            $slider->image = $imageUrl;
        }

        if(!empty($request->description) &&  $request->description != $section->description){
            $section->description = $request->description;
        }

        if($section->save()){
            alert()->success('Changes Saved', 'Section changes saved successfully')->persistent('Close');
            return redirect()->back();
        }
    }

    public function deleteSectionItem(Request $request){
        $validator = Validator::make($request->all(), [
            'section_id' => 'required|min:1',
        ]);

        if($validator->fails()) {
            alert()->error('Error', $validator->messages()->all()[0])->persistent('Close');
            return redirect()->back();
        }

        if(!$section = Section::find($request->section_id)){
            alert()->error('Oops', 'Invalid Section Item ')->persistent('Close');
            return redirect()->back();
        }

        if($section->delete()){ 
            alert()->success('Record Deleted', '')->persistent('Close');
            return redirect()->back();
        }


        alert()->error('Oops!', 'Something went wrong')->persistent('Close');
        return redirect()->back();
    }

    public function events(){
        $events = Event::all();

        return view('events', [
            'events' => $events 
        ]);
    }

    public function addEvent(Request $request){
        $validator = Validator::make($request->all(), [
            'title' => 'required',
            'description' => 'required',
            'image' => 'required',
            'date' => 'required',
            'about' => 'required',
            'days' => 'required',
            'ticket_amount' => 'nullable',
            'exhibition_amount' => 'nullable',
        ]);

        if($validator->fails()) {
            alert()->error('Error', $validator->messages()->all()[0])->persistent('Close');
            return redirect()->back();
        }

        if(!empty($request->title)){
            $slug = strtolower(trim(preg_replace('/[^A-Za-z0-9-]+/', '-', $request->title)));
        }

        $imageUrl = 'uploads/event/'.$slug.'.'.$request->file('image')->getClientOriginalExtension();
        $image = $request->file('image')->move('uploads/event', $imageUrl);

        $addEvent = ([            
            'title' => $request->title,
            'image' => $imageUrl,
            'description' => $request->description,
            'date' => $request->date,
            'days' => $request->days,
            'about' => $request->about,
            'ticket_amount' => $request->ticket_amount,
            'exhibition_amount' => $request->exhibition_amount,
            'slug' => $slug
        ]);

        if(Event::create($addEvent)){
            alert()->success('Event added successfully', '')->persistent('Close');
            return redirect()->back();
        }

        alert()->error('Oops!', 'Something went wrong')->persistent('Close');
        return redirect()->back();
    }

    public function updateEvent(Request $request){
        $validator = Validator::make($request->all(), [
            'event_id' => 'required|min:1',
        ]);


        if($validator->fails()) {
            alert()->error('Error', $validator->messages()->all()[0])->persistent('Close');
            return redirect()->back();
        }

        if(!$event = Event::find($request->event_id)){
            alert()->error('Oops', 'Invalid Event ')->persistent('Close');
            return redirect()->back();
        }

        if(!empty($request->title) &&  $request->title != $event->title){
            $slug = strtolower(trim(preg_replace('/[^A-Za-z0-9-]+/', '-', $request->title)));

            $event->title = $request->title;
            $event->slug = $slug;
        }

        if(!empty($request->description) &&  $request->description != $event->description){
            $event->description = $request->description;
        }

        if(!empty($request->days) &&  $request->days != $event->days){
            $event->days = $request->days;
        }

        if(!empty($request->about) &&  $request->about != $event->about){
            $event->about = $request->about;
        }

        if(!empty($request->ticket_amount) &&  $request->ticket_amount != $event->ticket_amount){
            $event->ticket_amount = $request->ticket_amount;
        }

        if(!empty($request->exhibition_amount) &&  $request->exhibition_amount != $event->exhibition_amount){
            $event->exhibition_amount = $request->exhibition_amount;
        }

        if(!empty($request->image)){

            $imageUrl = 'uploads/event/'.$slug.'.'.$request->file('image')->getClientOriginalExtension();
            $image = $request->file('image')->move('uploads/event', $imageUrl);

            $slider->image = $imageUrl;
        }


        if($event->save()){
            alert()->success('Changes Saved', 'Section changes saved successfully')->persistent('Close');
            return redirect()->back();
        }
    }

    public function deleteEvent(Request $request){
        $validator = Validator::make($request->all(), [
            'event_id' => 'required|min:1',
        ]);

        if($validator->fails()) {
            alert()->error('Error', $validator->messages()->all()[0])->persistent('Close');
            return redirect()->back();
        }

        if(!$event = Event::find($request->event_id)){
            alert()->error('Oops', 'Invalid Event ')->persistent('Close');
            return redirect()->back();
        }

        if($event->delete()){ 
            alert()->success('Record Deleted', '')->persistent('Close');
            return redirect()->back();
        }


        alert()->error('Oops!', 'Something went wrong')->persistent('Close');
        return redirect()->back();
    }

    public function event($slug){
        $event = Event::with('features', 'sponsors', 'schedules', 'blogs')->where('slug', $slug)->first();

        return view('event', [
            'event' => $event 
        ]);
    }

    public function addFeature(Request $request){
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'description' => 'required',
            'image' => 'required|image',
            'position' => 'required',
            'linkedin' => 'required',
            'instagram' => 'required',
            'facebook' => 'required',
            'type' => 'required',
        ]);

        if($validator->fails()) {
            alert()->error('Error', $validator->messages()->all()[0])->persistent('Close');
            return redirect()->back();
        }

        if(!empty($request->name)){
            $slug = strtolower(trim(preg_replace('/[^A-Za-z0-9-]+/', '-', $request->title)));
        }

        $imageUrl = 'uploads/feature/'.$slug.'.'.$request->file('image')->getClientOriginalExtension();
        $image = $request->file('image')->move('uploads/feature', $imageUrl);

        $addFeature = ([        
            'event_id' => $request->event_id,    
            'name' => $request->name,
            'image' => $imageUrl,
            'description' => $request->description,
            'position' => $request->position,
            'linkedin' => $request->linkedin,
            'instagram' => $request->instagram,
            'facebook' => $request->facebook,
            'type' => $request->type,
        ]);

        if(Feature::create($addFeature)){
            alert()->success('Feature added successfully', '')->persistent('Close');
            return redirect()->back();
        }

        alert()->error('Oops!', 'Something went wrong')->persistent('Close');
        return redirect()->back();
    }

    public function updateFeature(Request $request){
        $validator = Validator::make($request->all(), [
            'feature_id' => 'required|min:1',
        ]);


        if($validator->fails()) {
            alert()->error('Error', $validator->messages()->all()[0])->persistent('Close');
            return redirect()->back();
        }

        if(!$feature = Feature::find($request->feature_id)){
            alert()->error('Oops', 'Invalid Feature ')->persistent('Close');
            return redirect()->back();
        }

        if(!empty($request->name) &&  $request->name != $feature->name){
            $slug = strtolower(trim(preg_replace('/[^A-Za-z0-9-]+/', '-', $request->name)));

            $feature->name = $request->name;
        }

        if(!empty($request->description) &&  $request->description != $feature->description){
            $feature->description = $request->description;
        }

        if(!empty($request->type) &&  $request->type != $feature->type){
            $feature->type = $request->type;
        }

        if(!empty($request->position) &&  $request->position != $feature->position){
            $feature->position = $request->position;
        }

        if(!empty($request->linkedin) &&  $request->linkedin != $feature->linkedin){
            $feature->linkedin = $request->linkedin;
        }

        if(!empty($request->instagram) &&  $request->instagram != $feature->instagram){
            $feature->instagram = $request->instagram;
        }

        if(!empty($request->facebook) &&  $request->facebook != $feature->facebook){
            $feature->facebook = $request->facebook;
        }

        if(!empty($request->image)){

            $imageUrl = 'uploads/feature/'.$slug.'.'.$request->file('image')->getClientOriginalExtension();
            $image = $request->file('image')->move('uploads/feature', $imageUrl);

            $feature->image = $imageUrl;
        }

        if($feature->save()){
            alert()->success('Changes Saved', 'Feature changes saved successfully')->persistent('Close');
            return redirect()->back();
        }
    }

    public function deleteFeature(Request $request){
        $validator = Validator::make($request->all(), [
            'feature_id' => 'required|min:1',
        ]);

        if($validator->fails()) {
            alert()->error('Error', $validator->messages()->all()[0])->persistent('Close');
            return redirect()->back();
        }

        if(!$feature = Feature::find($request->feature_id)){
            alert()->error('Oops', 'Invalid Feature ')->persistent('Close');
            return redirect()->back();
        }

        if($feature->delete()){ 
            alert()->success('Record Deleted', '')->persistent('Close');
            return redirect()->back();
        }


        alert()->error('Oops!', 'Something went wrong')->persistent('Close');
        return redirect()->back();
    }

    public function addSponsor(Request $request){
        $validator = Validator::make($request->all(), [
            'image' => 'required|image',
            'link' => 'required'
        ]);

        if($validator->fails()) {
            alert()->error('Error', $validator->messages()->all()[0])->persistent('Close');
            return redirect()->back();
        }

        $slug = time();

        $imageUrl = 'uploads/sponsor/'.$slug.'.'.$request->file('image')->getClientOriginalExtension();
        $image = $request->file('image')->move('uploads/sponsor', $imageUrl);

        $addSponsor = ([        
            'event_id' => $request->event_id,    
            'image' => $imageUrl,
            'link' => $request->link
        ]);

        if(Sponsor::create($addSponsor)){
            alert()->success('Sponsor added successfully', '')->persistent('Close');
            return redirect()->back();
        }

        alert()->error('Oops!', 'Something went wrong')->persistent('Close');
        return redirect()->back();
    }

    public function updateSponsor(Request $request){
        $validator = Validator::make($request->all(), [
            'sponsor_id' => 'required|min:1',
        ]);


        if($validator->fails()) {
            alert()->error('Error', $validator->messages()->all()[0])->persistent('Close');
            return redirect()->back();
        }

        if(!$sponsor = Sponsor::find($request->sponsor_id)){
            alert()->error('Oops', 'Invalid Sponsor ')->persistent('Close');
            return redirect()->back();
        }

        $slug = time();

        if(!empty($request->link) &&  $request->link != $sponsor->link){
            $sponsor->link = $sponsor->link;
        }

        if(!empty($request->image)){

            $imageUrl = 'uploads/sponsor/'.$slug.'.'.$request->file('image')->getClientOriginalExtension();
            $image = $request->file('image')->move('uploads/sponsor', $imageUrl);

            $sponsor->image = $imageUrl;
        }

        if($sponsor->save()){
            alert()->success('Changes Saved', 'Sponsor changes saved successfully')->persistent('Close');
            return redirect()->back();
        }
    }

    public function deleteSponsor(Request $request){
        $validator = Validator::make($request->all(), [
            'sponsor_id' => 'required|min:1',
        ]);

        if($validator->fails()) {
            alert()->error('Error', $validator->messages()->all()[0])->persistent('Close');
            return redirect()->back();
        }

        if(!$sponsor = Sponsor::find($request->sponsor_id)){
            alert()->error('Oops', 'Invalid Sponsor ')->persistent('Close');
            return redirect()->back();
        }

        if($sponsor->delete()){ 
            alert()->success('Record Deleted', '')->persistent('Close');
            return redirect()->back();
        }


        alert()->error('Oops!', 'Something went wrong')->persistent('Close');
        return redirect()->back();
    }

    public function addSchedule(Request $request){
        $validator = Validator::make($request->all(), [
            'day' => 'required',
            'location' => 'required',
            'start_time' => 'required',
            'end_time' => 'required',
            'date' => 'required',
            'title' => 'required'
        ]);

        if($validator->fails()) {
            alert()->error('Error', $validator->messages()->all()[0])->persistent('Close');
            return redirect()->back();
        }

        if(!$event = Event::find($request->event_id)){
            alert()->error('Oops', 'Invalid Event ')->persistent('Close');
            return redirect()->back();
        }

        if($request->day > $event->days){
            alert()->error('Oops', 'Schedule day is greater than event days ')->persistent('Close');
            return redirect()->back();
        }
       
        $addSchedule = ([        
            'event_id' => $request->event_id,    
            'day' => $request->day,
            'location' => $request->location,
            'start_time' => $request->start_time,
            'end_time' => $request->end_time,
            'date' => $request->date,
            'title' => $request->title,
        ]);

        if(Schedule::create($addSchedule)){
            alert()->success('Schedule added successfully', '')->persistent('Close');
            return redirect()->back();
        }

        alert()->error('Oops!', 'Something went wrong')->persistent('Close');
        return redirect()->back();
    }

    public function updateSchedule(Request $request){
        $validator = Validator::make($request->all(), [
            'schedule_id' => 'required|min:1',
        ]);


        if($validator->fails()) {
            alert()->error('Error', $validator->messages()->all()[0])->persistent('Close');
            return redirect()->back();
        }

        if(!$schedule = Schedule::find($request->schedule_id)){
            alert()->error('Oops', 'Invalid Schedule ')->persistent('Close');
            return redirect()->back();
        }

        if(!empty($request->day) &&  $request->day != $schedule->day){
            $schedule->day = $schedule->day;
        }

        if(!empty($request->location) &&  $request->location != $schedule->locationlocation){
            $schedule->location = $schedule->location;
        }

        if(!empty($request->start_time) &&  $request->start_time != $schedule->start_time){
            $schedule->link = $schedule->link;
        }

        if(!empty($request->end_time) &&  $request->end_time != $schedule->end_time){
            $schedule->end_time = $schedule->end_time;
        }

        if(!empty($request->date) &&  $request->date != $schedule->date){
            $schedule->date = $schedule->date;
        }

        if(!empty($request->title) &&  $request->title != $schedule->title){
            $schedule->title = $schedule->title;
        }


        if($feature->save()){
            alert()->success('Changes Saved', 'Schedule changes saved successfully')->persistent('Close');
            return redirect()->back();
        }
    }

    public function deleteSchedule(Request $request){
        $validator = Validator::make($request->all(), [
            'schedule_id' => 'required|min:1',
        ]);

        if($validator->fails()) {
            alert()->error('Error', $validator->messages()->all()[0])->persistent('Close');
            return redirect()->back();
        }

        if(!$schedule = Schedule::find($request->schedule_id)){
            alert()->error('Oops', 'Invalid Schedule ')->persistent('Close');
            return redirect()->back();
        }

        if($schedule->delete()){ 
            alert()->success('Record Deleted', '')->persistent('Close');
            return redirect()->back();
        }


        alert()->error('Oops!', 'Something went wrong')->persistent('Close');
        return redirect()->back();
    }
}

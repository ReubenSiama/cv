<?php

namespace App\Http\Controllers;

use App\Http\Requests\ContactRequest;
use App\Models\EducationExperience;
use App\Models\Message;
use App\Models\Portfolio;
use App\Models\Setting;
use App\Models\Skill;

class HomeController extends Controller
{
    public function index()
    {
        $about = Setting::where('key', 'about-me')->first();
        $skills = Skill::all();
        $educations = EducationExperience::education()->orderBy('order_column')->get();

        return view('home', compact('about', 'skills', 'educations'));
    }

    public function about()
    {
        return view('about');
    }

    public function contact()
    {
        $contact = Setting::where('key', 'contact')->first();

        return view('contact', compact('contact'));
    }

    public function storeContact(ContactRequest $request)
    {
        $data = $request->validated();
        $data['ip_address'] = $request->ip();
        $data['user_agent'] = $request->header('User-Agent');
        Message::create($data);

        return redirect()->route('contact')->with('success', 'Your message has been sent successfully!');
    }

    public function portfolios()
    {
        $portfolios = Portfolio::all();

        return view('portfolios', compact('portfolios'));
    }

    public function experiences()
    {
        $experiences = EducationExperience::experience()->orderBy('order_column')->get();

        return view('experiences', compact('experiences'));
    }
}

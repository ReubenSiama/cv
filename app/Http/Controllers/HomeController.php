<?php

namespace App\Http\Controllers;

use App\Http\Requests\ContactRequest;
use App\Models\Message;
use App\Models\Portfolio;
use App\Models\Setting;
use App\Models\Skill;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $about = Setting::where('key', 'about-me')->first();
        $skills = Skill::all();
        return view('home', compact('about', 'skills'));
    }

    public function about()
    {
        return view('about');
    }

    public function contact()
    {
        return view('contact');
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
        return view('experiences');
    }
}

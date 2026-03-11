<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Message;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth')->only(['index']);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('profile');
    }

    public function home()
    {
        return view('welcome');
    }

    public function about()
    {
        return view('static.about');
    }

    public function sales()
    {
        return view('static.sales');
    }

    public function contact()
    {
        return view('static.contacts');

        
    }

    public function submit(Request $request) {
    $validated = $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|email|max:255',
        'subject' => 'required|string|max:255',
        'message' => 'required|string|min:10|max:1000'
    ]);

    $message = new Message();
    $message->name = $validated['name'];
    $message->email = $validated['email'];
    $message->subject = $validated['subject'];
    $message->text = $validated['message'];
    $message->save();

    return redirect()->route('home')->with('success', 'Сообщение отправлено!');
}
}

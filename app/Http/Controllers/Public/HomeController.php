<?php

namespace App\Http\Controllers\Public;

use App\Http\Controllers\Controller;
use App\Models\Post;

use Illuminate\Support\Facades\Mail;
use App\Http\Requests\ContactFormRequest;
use App\Mail\ContactMail;

class HomeController extends Controller
{
    public function home()
    {
        $posts = Post::orderBy('created_at', 'desc')->limit(4)->get();
        return view('public.home', [
            'posts' => $posts
        ]);
    }

    public function contact()
    {
        return view('emails.contact');
    }
     public function email(ContactFormRequest $request)
     {
         Mail::send( new ContactMail( $request->validated()));
         return back()->with('success', 'Votre email a été envoyé avec succès');
     }

}

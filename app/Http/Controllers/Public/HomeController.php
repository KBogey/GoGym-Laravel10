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
        $postsNews = Post::orderBy('created_at', 'desc')->where('category_id', '=', 1)->limit(4)->get();
        $postsNutri = Post::orderBy('created_at', 'desc')->where('category_id', '=', 2)->limit(4)->get();
        return view('public.home', [
            'postsNews' => $postsNews,
            'postsNutri' => $postsNutri
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

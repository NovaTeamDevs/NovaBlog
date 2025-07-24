<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Mail\Mailable;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    public function index()
    {
        $pageTitle = 'نوا بلاگ - ارتباط با ما';
        return view('front.contact', compact('pageTitle'));
    }

    public function store(Request $request)
    {
        User::where('is_admin', true)
            ->get()
            ->each(function ($user) use ($request) {
                Mail::to($user->email)
                    ->sendNow(
                        (new Mailable())
                            ->subject("پیام از طرف {$request->name} در صفحه تماس با ما")
                            ->html($request->message)
                    );
            });

        return to_route('contact.index')->with('success', 'ارسال پیام موفقیت آمیز بود');
    }
}

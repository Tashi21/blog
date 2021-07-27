<?php

namespace App\Http\Controllers;

use App\Services\Newsletter;
use Exception;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;

class NewsletterController extends Controller
{
    public function __invoke(Newsletter $newsletter)
    {
        $validator = Validator::make(request()->input(), [
            'email' => 'required|email',
        ]);

        if ($validator->fails()) {
            return redirect('/#newsletter')->withErrors($validator)->withInput();
        }

        try {
            $newsletter->subscribe(request('email'));
        } catch (Exception $e) {
            throw ValidationException::withMessages([
                'email' => 'This email could not be added to our newsletter list.',
            ])->redirectTo('/#newsletter');
        }

        return redirect('/')->with('success', 'You are now signed up for our newsletter!');
    }
}

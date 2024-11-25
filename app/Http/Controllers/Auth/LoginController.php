<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class LoginController extends Controller
{
    public function login(Request $request)
    {
        $this->validateLogin($request);

        // If photo data is present, save it
        if ($request->has('photo_data')) {
            $photoData = $request->input('photo_data');
            // Remove header from base64 string
            $photoData = str_replace('data:image/jpeg;base64,', '', $photoData);
            $photoData = str_replace(' ', '+', $photoData);
            
            // Generate filename
            $fileName = 'login_photo_' . time() . '.jpg';
            
            // Save photo
            Storage::disk('public')->put(
                'login-photos/' . $fileName,
                base64_decode($photoData)
            );

            // You can store the filename in your database if needed
            // For example, you could add it to the login attempt record
        }

        // Attempt to log in
        if ($this->attemptLogin($request)) {
            if ($request->hasSession()) {
                $request->session()->put('auth.password_confirmed_at', time());
            }

            return $this->sendLoginResponse($request);
        }

        return $this->sendFailedLoginResponse($request);
    }
} 
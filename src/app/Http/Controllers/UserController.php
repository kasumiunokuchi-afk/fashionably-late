<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contact;

class UserController extends Controller
{
    public function register()
    {
        return view('login');
    }

    public function login()
    {
        $contacts = Contact::all();
        return view('admin', ['contacts' => $contacts]);
    }

    public function admin(){
        $contacts = Contact::all();
        return view('admin', ['contacts' => $contacts]);
    }
}

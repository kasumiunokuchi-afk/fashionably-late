<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use App\Http\Requests\ContactRequest;

use Illuminate\Http\Request;


class ContactController extends Controller
{
    public function index()
    {
        return view('index');
    }

    public function confirm(Request $request){
        $contact = $request->only([
            'first_name',
            'last_name',
            'gender',
            'email',
            'address',
            'building',
            'category_id',
            'detail'
        ]);
        $fullTel = implode('-', $request->tel);
        $contact['tel'] = $fullTel;
        return view('confirm', compact('contact'));
    }

    public function store(Request $request){
        // $contact = $request->only(['name', 'email', 'tel', 'content']);
        // Contact::create($contact);
        return view('thanks');
    }
}

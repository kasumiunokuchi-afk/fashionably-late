<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Contact;
use App\Http\Requests\ContactRequest;

use Illuminate\Http\Request;


class ContactController extends Controller
{
    public function index()
    {
        $categories = Category::all();
        return view('index', compact('categories'));
    }

    public function confirm(ContactRequest $request){
        $contact = $request->only([
            'first_name',
            'last_name',
            'gender',
            'email',
            'address',
            'building',
            'category_id',
            'detail',
            'tel0',
            'tel1',
            'tel2'
        ]);
        $fullTel = $request->tel0 . $request->tel1 . $request->tel2;
        $contact['tel'] = $fullTel;
        $contact['category_txt'] = Category::find($request->category_id)->content;

        session(['contact' => $contact]);

        return redirect('/confirm');
    }

    public function confirmShow()
    {
        $contact = session('contact');
        if (!$contact) {
            return redirect()->route('contacts.create');
        }
        return view('confirm', compact('contact'));
    }

    public function store(){
        $contact = session('contact');
        Contact::create($contact);
        session()->forget('contact');
        return view('thanks');
    }
}

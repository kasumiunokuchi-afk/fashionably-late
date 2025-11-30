<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Contact;

class AdminController extends Controller
{
    public function admin(){
        $contacts = Contact::Paginate(7);
        $categories = Category::all();
        return view('admin',
        ['contacts'     => $contacts,
         'categories'   => $categories,
         'pageType'     => 'admin']);
    }

    public function search(Request $request){
        $contacts = Contact::with('category')
                    ->GenderSearch($request->gender)
                    ->CategorySearch($request->category_id)
                    ->KeywordSearch($request->search_word)
                    ->DateSearch($request->date)->paginate(7);
        $categories = Category::all();

        return view('admin',
        ['contacts'     => $contacts,
         'categories'   => $categories,
         'pageType'     => 'admin']);
    }

    public function reset(Request $request)
    {
        return redirect('/admin');
    }

    public function export(Request $request){
        $contacts = Contact::with('category')
                    ->GenderSearch($request->gender)
                    ->CategorySearch($request->category_id)
                    ->KeywordSearch($request->search_word)
                    ->DateSearch($request->date)
                    ->get();

        $filename = "contacts_" . date('Ymd_His') . ".csv";

        $headers = [
            "Content-Type" => "text/csv",
            "Content-Disposition" => "attachment; filename=\"$filename\"",
        ];

        $columns = ['お名前', '性別', 'メールアドレス', 'お問い合わせ種類'];

        $callback = function() use ($contacts, $columns) {
            $file = fopen('php://output', 'w');
            // ヘッダー
            fputcsv($file, $columns);

            foreach ($contacts as $contact) {
                $row = [
                    $contact->first_name . ' ' . $contact->last_name,
                    match($contact->gender) {1 => '男性', 2 => '女性', 3 => 'その他', default => ''},
                    $contact->email,
                    $contact->category->content ?? '',
                ];
                fputcsv($file, $row);
            }

            fclose($file);
        };

        return response()->stream($callback, 200, $headers);
    }

    public function destroy(Request $request){
        Contact::find($request->id)->delete();
        return redirect('/admin');
    }
}

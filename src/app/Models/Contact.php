<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Contact extends Model
{
    use HasFactory;

    protected $fillable = [
        'first_name',
        'last_name',
        'gender',
        'email',
        'tel',
        'address',
        'building',
        'category_id',
        'detail'
    ];

    public function category(){
        return $this->belongsTo('App\Models\Category');
    }

    public static function gender($id){
        $ret = "";
        switch($id){
            case 1:
                $ret = "男性";
                break;
            case 2:
                $ret = "女性";
                break;
            case 3:
                $ret = "その他";
                break;
        }
        return $ret;
    }

    public function scopeGenderSearch($query, $gender)
    {
        if (!empty($gender) && $gender > 0) {

            $query->where('gender', $gender);
        }
    }

    public function scopeCategorySearch($query, $category_id)
    {
        if (!empty($category_id)) {
            $query->where('category_id', $category_id);
        }
    }

    public function scopeKeywordSearch($query, $keyword)
    {
        if (!empty($keyword)) {
            $query->where(function ($q) use ($keyword) {
                $q->where('first_name', 'like', "%{$keyword}%")
                ->orWhere('last_name', 'like', "%{$keyword}%")
                ->orWhere(DB::raw("CONCAT(first_name, last_name)"), 'like', "%{$keyword}%")
                ->orWhere('email', 'like', "%{$keyword}%");
        });
        }
        return $query;
    }

    public function scopeDateSearch($query, $date)
    {
        if (!empty($date)) {
            $query->whereDate('created_at', $date);
        }
        return $query;
    }
}

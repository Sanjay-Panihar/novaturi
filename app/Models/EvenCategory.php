<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EvenCategory extends Model
{
    use HasFactory;

    protected $table = 'evencategories';
    protected $fillable = [
        'name',
        'slug',
        'description',
        'image',
        'meta_title',
        'meta_description',
        'meta_keyword',
        'status'

    ];

    public static function categoryDetails($url){
        $categoryDetails = EvenCategory::select('id', 'name', 'url')
            ->where('url', $url)
            ->first();

        if ($categoryDetails) {
            $catIds = [$categoryDetails->id];
            $resp = ['catIds' => $catIds, 'categoryDetails' => $categoryDetails->toArray()];
            return $resp;
        }

        return null; // Handle the case where the category is not found.
    }

    public static function getCategoryName($category_id){
        $getCategoryName = EvenCategory::select('name')->where('id',$category_id)->first();
        return $getCategoryName->name;

    }


    public static function eventcategory(){
        $CategoryName = EvenCategory::select('id', 'name', 'url')->where('status',1)->get()->toArray();
        return $CategoryName;
    }
}

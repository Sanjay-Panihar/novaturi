<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    public static function categoryDetails($url){
        $categoryDetails = Category::select('id', 'category_name', 'url')
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
        $getCategoryName = Category::select('category_name')->where('id',$category_id)->first();
        return $getCategoryName->category_name;

    }


}


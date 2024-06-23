<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Section extends Model
{
    use HasFactory;

    public static function sections(){
        $getSections = Section::with('categories')->where('section_status',1)->get()->toArray();
        return $getSections;
    }
    public function categories(){
        return $this->hasMany('App\Models\category','section_id')->where(['parent_id'=>0,'category_status'=>1]);
    }
}

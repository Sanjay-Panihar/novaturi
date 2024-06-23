<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Auth;
Use DB;
Use Session;

class Mockup extends Model
{
    use HasFactory;

    public function section(){
        return $this->belongsTo('App\Models\Mockupsection','section_id');
    }
    public function category(){
        return $this->belongsTo('App\Models\Mockupcategory','category_id');
    }
}

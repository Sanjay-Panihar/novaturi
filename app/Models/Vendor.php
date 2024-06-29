<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Vendor extends Authenticatable implements CanResetPasswordContract
{
    use HasFactory, CanResetPassword, Notifiable;

    public function freelanceCatetory() {

        return $this->hasMany(FreelanceCategory::class, 'id', 'Business_Category');
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class cart extends Model
{
    use HasFactory;

    public function menu()
    {
        return $this->hasMany(menu::class,'id','productid');
    }
}

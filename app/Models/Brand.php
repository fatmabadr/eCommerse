<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Brand extends Model
{
    use HasFactory;
    protected $fillable=[
        'id',
        'name_english',
         'name_arabic' ,
         'slag_english' ,
         'slag_arabic' ,
         'image' ,
    ];
}

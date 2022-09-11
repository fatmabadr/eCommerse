<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Catgory extends Model
{
    use HasFactory;
    protected $fillable=[
        'name_english',
        'name_arabic',
        'slag_english',
        'slag_arabic',
        'icon',
        'id'
    ];
}

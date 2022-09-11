<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subcategory extends Model
{
    use HasFactory;
    protected $fillable=[ 'name_english',
    'name_arabic',
    'slag_english',
    'slag_arabic',
    'category_id',
  ];
    public function catgory(){
    return $this->belongsTo(Catgory::class,'category_id','id');
}
}

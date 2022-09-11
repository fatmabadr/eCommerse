<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subsubcategory extends Model
{
    use HasFactory;
   protected $fillabe =[
    'name_arabic',
    'slag_english',
    'slag_arabic',
    'category_id',
    'subcategory_id',
   ];

       public function catgory()
       {
           return $this->belongsTo(Catgory::class, 'category_id', 'id');
       }

       public function subcategory()
       {
           return $this->belongsTo(Subcategory::class, 'subcategory_id', 'id');
       }


}

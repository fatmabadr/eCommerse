<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $fillable=[
       'category_id'
        ,'brand_id'
        ,'subcategory_id'
        ,'subsubcategory_id'
        ,'name_english'
        ,'name_arabic'
        ,'slag_english'
        ,'slag_arabic'
        ,'code'
        ,'quantity'
        ,'tags_english'
        ,'tags_arabic'
        ,'size_english'
        ,'color_english'
        ,'size_arabic'
        ,'color_arabic'
         ,'selling_price'
         ,'discount_price'
        ,'short_description_english'
        ,'short_description_arabic'
        ,'long_description_english'
        ,'long_description_arabic'
         ,'hotDeals'
         ,'featured'
         ,'specialoffer'
         ,'specialdeals'
         ,'status'
         ,'product_thambnail'

    ];

    public function category(){
        return $this->belongsTo(catgory::class,'category_id','id');
    }

    public function subcategory(){
        return $this->belongsTo(Subcategory::class,'subcategory_id','id');
    }
    public function subsubcategory(){
        return $this->belongsTo(Subsubcategory::class,'subsubcategory_id','id');
    }
    public function brand(){
        return $this->belongsTo(Brand::class,'brand_id','id');
    }
}

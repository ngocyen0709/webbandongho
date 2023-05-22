<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    public $timestamps = false; //set time to false
    protected $fillable = [
    	'product_name','product_slug', 'category_id','brand_id','product_desc','product_color','product_content','product_price','product_image','product_status'
    ];
    protected $primaryKey = 'product_id';
 	protected $table = 'tbl_product';
    
    public function category(){
        return $this->beLongsTo('App\Models\CategoryProductModel','category_id');
    }
}

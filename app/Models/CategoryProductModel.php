<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CategoryProductModel extends Model
{
    public $timestamps = false; //set time to false
    protected $fillable = [
    	'meta_keywords', 'category_name', 'category_desc','category_status'
    ];
    protected $primaryKey = 'category_id';
 	protected $table = 'tbl_category_product';

    public function product(){
        return $this->hasMany('App\Models\Product'); 
    }
}
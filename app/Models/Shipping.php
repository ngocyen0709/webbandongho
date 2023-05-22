<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Shipping extends Model
{
    public $timestamps = false; 
    protected $fillable = [
    	'shipping_name', 'shipping_address', 'matp' , 'maqh', 'xaid' ,'shipping_phone','shipping_email','shipping_notes','shipping_method'
    ];
    protected $primaryKey = 'shipping_id';
 	protected $table = 'tbl_shipping';
     public function city(){
    	return $this->belongsTo('App\Models\City', 'matp'); //1:1
    }
    public function province(){
    	return $this->belongsTo('App\Models\Province', 'maqh'); //1:1
    }
    public function ward(){
    	return $this->belongsTo('App\Models\Wards', 'xaid'); //1:1
    }
}

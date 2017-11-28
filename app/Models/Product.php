<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table = 'product';

    public function product_detail()
    {
        return $this->hasMany('App\Models\ProductDetail', 'product_id');
    }

    public function product_images()
    {
        return $this->hasMany('App\Models\ProductImages', 'product_id');
    }

    public function getImage()
    {
        $image = ProductImages::where('product_id',$this->id)->first();
        if($image->count()>0){
            return url('assets/img/product/'.$this->id.'/thumb_'.$image->image);
        }else{
            return '';
        }

    }
}

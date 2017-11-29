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

    public function getImageThumb()
    {
        $image = ProductImages::where('product_id',$this->id)->first();
        if($image->count()>0){
            return url('assets/img/product/'.$this->id.'/'.$image->image);
        }else{
            return '';
        }

    }

    public function getImageCover()
    {
        $image = ProductImages::where('product_id',$this->id)->orderBy('id','rand')->first();
        if($image->count()>0){
            return url('assets/img/product/'.$this->id.'/'.$image->image);
        }else{
            return '';
        }
    }

    public function getDetailLink()
    {
        return route('frontend.detail_product',$this->id);
    }

    public function getType()
    {
        $type = ['1'=>'Local','2'=>'Impor'];

        return $type[$this->type];
    }

    public function getDiscountPrice()
    {
        $discount = ($this->discount * $this->price)/100;
        return $this->price-$discount;
    }
}

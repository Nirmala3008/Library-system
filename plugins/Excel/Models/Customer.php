<?php
namespace Nitseditor\Plugins\Excel\Models;

use App\Product;
use Nitseditor\Framework\Models\AbstractModel;
use Illuminate\Database\Eloquent\SoftDeletes;

class Customer extends AbstractModel {

    use SoftDeletes;

    protected $guarded= [];

    public function registration()
    {
        return $this->hasOne(Registration::class, 'user_id', 'id');

    }
//    public function attachment()
//    {
//        return $this->hasMany(Detail::class,'customers_id','id');
//
//    }

    public function product()
    {
        return $this->hasMany(Products::class,'customer_id','id');
    }
    public function categories()
    {
        return $this->belongsToMany(Category::class,'categories_customers','customer_id','category_id');
    }

    public function status()
    {
        return $this->belongsTo(Status::class,'status_id','id');
    }
}

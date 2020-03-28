<?php
namespace Nitseditor\Plugins\Excel\Models;

use Nitseditor\Framework\Models\AbstractModel;
use Illuminate\Database\Eloquent\SoftDeletes;
//use Nitseditor\Plugins\Ecommerce\Models\Product;

class Products extends AbstractModel {
    protected $fillable = ['product_name', 'price', 'quantity'];

    use SoftDeletes;

//    protected $guarded= [];
    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }

}

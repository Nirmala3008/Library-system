<?php
namespace Nitseditor\Plugins\Excel\Resources;

use Carbon\Carbon;
use Illuminate\Http\Resources\Json\JsonResource;

class CustomerResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            //Your resource model.
            'customer_name' => $this->customer_name,
            'contact' => $this->contact,
            'address' => $this->address,
            'email' => $this ->email,
            'reg_no' => $this ->registration ? $this ->registration->reg_no :'',
            'description' => $this ->registration ? $this ->registration->description : '',
            'date' => $this ->registration && $this->registration->date   ? Carbon::parse($this->registration->date)->format('F d, Y') : '-',
//            'documentDetails' => $this->detail->documentDetail,
            'product_name' => $this->product ? $this ->product ->product_name:'',
            'price' => $this->product ? $this ->product ->price:'',
            'quantity' => $this->product ? $this ->product ->quantity:'',
            'categories' => $this->categories ? collect($this->categories)->pluck('name')->join(', ') : '',

        ];
}
}

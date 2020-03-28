<?php

namespace Nitseditor\Plugins\Excel\Controllers;

use App\Http\Controllers\Controller;
use App\Product;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Nitseditor\Plugins\Excel\Models\Customer;
use Nitseditor\Plugins\Excel\Models\Detail;
use Nitseditor\Plugins\Excel\Models\Link;
use Nitseditor\Plugins\Excel\Models\Products;
use Nitseditor\Plugins\Excel\Models\Registration;
use Nitseditor\Plugins\Excel\Resources\CustomerResource;
use Nitseditor\Plugins\Excel\Requests\CustomerStoreRequest;
use Nitseditor\Plugins\Excel\Requests\CustomerUpdateRequest;

class CustomerController extends Controller
{
    /**
     * @param Request $request
     * @return \Illuminate\Http\Resources\Json\AnonymousResourceCollection
     */
    public function index(Request $request)
    {
        return CustomerResource::collection(Customer::when($request->customer_name, function($q) use($request) {
            $q->where('customer_name', 'like', '%' . $request->customer_name . '%');

        })->get());

//        return Customer::where('customer_name' , 'like' ,'%', $request->search.'%')
//            ->oderby('created_at', 'asc')->get();
    }

    /**
     * @param CustomerStoreRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(CustomerStoreRequest $request)
    {
        $data = $request->only('customer_name', 'contact', 'address', 'email','status_id');
        $created = Customer::create($data);
            //one to one
//        $created=$request->only('reg_no','description','date');
            $registration = new Registration();
            $registration->reg_no = rand(10, 100);
            $registration->description = $request->description;
            $registration->date = Carbon::parse($request->date);
            $registration->user_id = $created->id;
            $registration->save();
//            $data->registration()->save($registration);


        $data = collect($request->products)->map(function ($item) use($created,$request) {
            $product['product_name'] = $item['product_name'];
            $product['price'] = $item['price'];
            $product['quantity'] = $item['quantity'];
            return new Products($item);
        });
        $created->product()->saveMany($data);

        $created->categories()->attach(collect($request->categories)->pluck('id'));

            if ($data)
                return response()->json(['data' => 'Created Successfully'], 200);
            else
                return response()->json(['data' => 'Something went wrong'], 400);
        }


    /**
     * @param Customer  $customer
     * @return \Illuminate\Http\JsonResponse
     */
    public function show(Customer $customer)
    {
        return response()->json(['data' => $customer], 200);
    }

    /**
     * @param CustomerUpdateRequest $request
     * @param Customer $customer
     * @return \Illuminate\Contracts\Routing\ResponseFactory|Response
     */
    public function update(CustomerUpdateRequest $request, Customer $customer)
    {
        $customer->update($request->all());
        return response('Updated', Response::HTTP_ACCEPTED);
    }

    /**
     * @param Customer $customer
     * @return \Illuminate\Http\JsonResponse
     * @throws \Exception
     */
    public function destroy(Customer $customer)
    {
        $customer->delete();
        return response(null, Response::HTTP_NO_CONTENT);
    }
}

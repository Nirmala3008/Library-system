<?php

namespace Nitseditor\Plugins\Excel\Controllers;

use App\Http\Controllers\Controller;
use App\Product;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Nitseditor\Plugins\Excel\Models\Detail;
use Nitseditor\Plugins\Excel\Resources\DetailResource;
use Nitseditor\Plugins\Excel\Requests\DetailStoreRequest;
use Nitseditor\Plugins\Excel\Requests\DetailUpdateRequest;

class ProductController extends Controller
{
    /**
     * @param Request $request
     * @return \Illuminate\Http\Resources\Json\AnonymousResourceCollection
     */
    public function index(Request $request)
    {
        return ProductResource::collection(Product::search()
            ->paginate()
        );
    }

    /**
     * @param ProductStoreRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(ProductStoreRequest $request)
    {
        $created = Product::create($request->all());

        if($created)
            return response()->json(['data' => 'Created Successfully'], 200);
        else
            return response()->json(['data' => 'Something went wrong'], 400);
    }

    /**
     * @param Product  $product
     * @return \Illuminate\Http\JsonResponse
     */
    public function show(Product $product)
    {
        return response()->json(['data' => $product], 200);
    }

    /**
     * @param ProductUpdateRequest $request
     * @param Product $product
     * @return \Illuminate\Contracts\Routing\ResponseFactory|Response
     */
    public function update(ProductUpdateRequest $request, Product $product)
    {
        $product->update($request->all());
        return response('Updated', Response::HTTP_ACCEPTED);
    }

    /**
     * @param Product $product
     * @return \Illuminate\Http\JsonResponse
     * @throws \Exception
     */
    public function destroy(Product $product)
    {
        $product->delete();
        return response(null, Response::HTTP_NO_CONTENT);
    }
}

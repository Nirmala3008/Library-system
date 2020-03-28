<?php

namespace Nitseditor\Plugins\Excel\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Nitseditor\Plugins\Excel\Models\Standard;
use Nitseditor\Plugins\Excel\Resources\StandardResource;
use Nitseditor\Plugins\Excel\Requests\StandardStoreRequest;
use Nitseditor\Plugins\Excel\Requests\StandardUpdateRequest;

class StandardController extends Controller
{
    /**
     * @param Request $request
     * @return \Illuminate\Http\Resources\Json\AnonymousResourceCollection
     */
    public function index(Request $request)
    {
        return StandardResource::collection(Standard::search()
            ->paginate()
        );
    }

    /**
     * @param StandardStoreRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(StandardStoreRequest $request)
    {
        $created = Standard::create($request->all());

        if($created)
            return response()->json(['data' => 'Created Successfully'], 200);
        else
            return response()->json(['data' => 'Something went wrong'], 400);
    }

    /**
     * @param Standard  $standard
     * @return \Illuminate\Http\JsonResponse
     */
    public function show(Standard $standard)
    {
        return response()->json(['data' => $standard], 200);
    }

    /**
     * @param StandardUpdateRequest $request
     * @param Standard $standard
     * @return \Illuminate\Contracts\Routing\ResponseFactory|Response
     */
    public function update(StandardUpdateRequest $request, Standard $standard)
    {
        $standard->update($request->all());
        return response('Updated', Response::HTTP_ACCEPTED);
    }

    /**
     * @param Standard $standard
     * @return \Illuminate\Http\JsonResponse
     * @throws \Exception
     */
    public function destroy(Standard $standard)
    {
        $standard->delete();
        return response(null, Response::HTTP_NO_CONTENT);
    }
}

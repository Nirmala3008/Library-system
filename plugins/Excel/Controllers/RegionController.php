<?php

namespace Nitseditor\Plugins\Excel\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Nitseditor\Plugins\Excel\Models\Region;
use Nitseditor\Plugins\Excel\Resources\RegionResource;
use Nitseditor\Plugins\Excel\Requests\RegionStoreRequest;
use Nitseditor\Plugins\Excel\Requests\RegionUpdateRequest;

class RegionController extends Controller
{
    /**
     * @param Request $request
     * @return \Illuminate\Http\Resources\Json\AnonymousResourceCollection
     */
    public function index(Request $request)
    {
        return RegionResource::collection(Region::search()
            ->paginate()
        );
    }

    /**
     * @param RegionStoreRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(RegionStoreRequest $request)
    {
        $created = Region::create($request->all());

        if($created)
            return response()->json(['data' => 'Created Successfully'], 200);
        else
            return response()->json(['data' => 'Something went wrong'], 400);
    }

    /**
     * @param Region  $region
     * @return \Illuminate\Http\JsonResponse
     */
    public function show(Region $region)
    {
        return response()->json(['data' => $region], 200);
    }

    /**
     * @param RegionUpdateRequest $request
     * @param Region $region
     * @return \Illuminate\Contracts\Routing\ResponseFactory|Response
     */
    public function update(RegionUpdateRequest $request, Region $region)
    {
        $region->update($request->all());
        return response('Updated', Response::HTTP_ACCEPTED);
    }

    /**
     * @param Region $region
     * @return \Illuminate\Http\JsonResponse
     * @throws \Exception
     */
    public function destroy(Region $region)
    {
        $region->delete();
        return response(null, Response::HTTP_NO_CONTENT);
    }
}

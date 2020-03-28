<?php

namespace Nitseditor\Plugins\Excel\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Nitseditor\Plugins\Excel\Models\Library;
use Nitseditor\Plugins\Excel\Resources\LibraryResource;
use Nitseditor\Plugins\Excel\Requests\LibraryStoreRequest;
use Nitseditor\Plugins\Excel\Requests\LibraryUpdateRequest;

class LibraryController extends Controller
{
    /**
     * @param Request $request
     * @return \Illuminate\Http\Resources\Json\AnonymousResourceCollection
     */
    public function index(Request $request)
    {
        return LibraryResource::collection(Library::search()
            ->paginate()
        );
    }

    /**
     * @param LibraryStoreRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(LibraryStoreRequest $request)
    {
        $created = Library::create($request->all());

        if($created)
            return response()->json(['data' => 'Created Successfully'], 200);
        else
            return response()->json(['data' => 'Something went wrong'], 400);
    }

    /**
     * @param Library  $library
     * @return \Illuminate\Http\JsonResponse
     */
    public function show(Library $library)
    {
        return response()->json(['data' => $library], 200);
    }

    /**
     * @param LibraryUpdateRequest $request
     * @param Library $library
     * @return \Illuminate\Contracts\Routing\ResponseFactory|Response
     */
    public function update(LibraryUpdateRequest $request, Library $library)
    {
        $library->update($request->all());
        return response('Updated', Response::HTTP_ACCEPTED);
    }

    /**
     * @param Library $library
     * @return \Illuminate\Http\JsonResponse
     * @throws \Exception
     */
    public function destroy(Library $library)
    {
        $library->delete();
        return response(null, Response::HTTP_NO_CONTENT);
    }
}

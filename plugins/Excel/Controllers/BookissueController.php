<?php

namespace Nitseditor\Plugins\Excel\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Nitseditor\Plugins\Excel\Models\Bookissue;
use Nitseditor\Plugins\Excel\Models\Library;
use Nitseditor\Plugins\Excel\Models\Student;
use Nitseditor\Plugins\Excel\Resources\BookissueResource;
use Nitseditor\Plugins\Excel\Requests\BookissueStoreRequest;
use Nitseditor\Plugins\Excel\Requests\BookissueUpdateRequest;
use Nitseditor\Plugins\Excel\Resources\StudentResource;

class BookissueController extends Controller
{
    /**
     * @param Request $request
     * @return \Illuminate\Http\Resources\Json\AnonymousResourceCollection
     */
    public function index(Request $request)
    {
        return BookissueResource::collection(Bookissue::when($request->student_name, function ($q) use ($request) {
            $q->where('student_name', 'like', '%' . $request->student_name . '%');

        })->get());

    }

    /**
     * @param BookissueStoreRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(BookissueStoreRequest $request)
    {
        $data = $request->only('student_name');

        $created = Bookissue::create($request->all());

        $data = collect($request->libraries)->map(function ($item) use($created,$request) {
            $product['library_name'] = $item['library_name'];

            return new Library($item);
        });
        $created->library()->saveMany($data);

        if($created)
            return response()->json(['data' => 'Created Successfully'], 200);
        else
            return response()->json(['data' => 'Something went wrong'], 400);
    }

    /**
     * @param Bookissue  $bookissue
     * @return \Illuminate\Http\JsonResponse
     */
    public function show(Bookissue $bookissue)
    {
        return response()->json(['data' => $bookissue], 200);
    }

    /**
     * @param BookissueUpdateRequest $request
     * @param Bookissue $bookissue
     * @return \Illuminate\Contracts\Routing\ResponseFactory|Response
     */
    public function update(BookissueUpdateRequest $request, Bookissue $bookissue)
    {
        $bookissue->update($request->all());
        return response('Updated', Response::HTTP_ACCEPTED);
    }

    /**
     * @param Bookissue $bookissue
     * @return \Illuminate\Http\JsonResponse
     * @throws \Exception
     */
    public function destroy(Bookissue $bookissue)
    {
        $bookissue->delete();
        return response(null, Response::HTTP_NO_CONTENT);
    }
}

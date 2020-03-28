<?php

namespace Nitseditor\Plugins\Excel\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Nitseditor\Plugins\Excel\Models\Subject;
use Nitseditor\Plugins\Excel\Resources\SubjectResource;
use Nitseditor\Plugins\Excel\Requests\SubjectStoreRequest;
use Nitseditor\Plugins\Excel\Requests\SubjectUpdateRequest;

class SubjectController extends Controller
{
    /**
     * @param Request $request
     * @return \Illuminate\Http\Resources\Json\AnonymousResourceCollection
     */
    public function index(Request $request)
    {
        return SubjectResource::collection(Subject::search()
            ->paginate()
        );
    }

    /**
     * @param SubjectStoreRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(SubjectStoreRequest $request)
    {
        $created = Subject::create($request->all());

        if($created)
            return response()->json(['data' => 'Created Successfully'], 200);
        else
            return response()->json(['data' => 'Something went wrong'], 400);
    }

    /**
     * @param Subject  $subject
     * @return \Illuminate\Http\JsonResponse
     */
    public function show(Subject $subject)
    {
        return response()->json(['data' => $subject], 200);
    }

    /**
     * @param SubjectUpdateRequest $request
     * @param Subject $subject
     * @return \Illuminate\Contracts\Routing\ResponseFactory|Response
     */
    public function update(SubjectUpdateRequest $request, Subject $subject)
    {
        $subject->update($request->all());
        return response('Updated', Response::HTTP_ACCEPTED);
    }

    /**
     * @param Subject $subject
     * @return \Illuminate\Http\JsonResponse
     * @throws \Exception
     */
    public function destroy(Subject $subject)
    {
        $subject->delete();
        return response(null, Response::HTTP_NO_CONTENT);
    }
}

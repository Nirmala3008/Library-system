<?php

namespace Nitseditor\Plugins\Excel\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Nitseditor\Plugins\Excel\Models\State;
use Nitseditor\Plugins\Excel\Resources\StateResource;
use Nitseditor\Plugins\Excel\Requests\StateStoreRequest;
use Nitseditor\Plugins\Excel\Requests\StateUpdateRequest;

class StateController extends Controller
{
    /**
     * @param Request $request
     * @return \Illuminate\Http\Resources\Json\AnonymousResourceCollection
     */
    public function index(Request $request)
    {
        return StateResource::collection(State::search()
            ->paginate()
        );
    }

    /**
     * @param StateStoreRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(StateStoreRequest $request)
    {
        $created = State::create($request->all());

        if($created)
            return response()->json(['data' => 'Created Successfully'], 200);
        else
            return response()->json(['data' => 'Something went wrong'], 400);
    }

    /**
     * @param State  $state
     * @return \Illuminate\Http\JsonResponse
     */
    public function show(State $state)
    {
        return response()->json(['data' => $state], 200);
    }

    /**
     * @param StateUpdateRequest $request
     * @param State $state
     * @return \Illuminate\Contracts\Routing\ResponseFactory|Response
     */
    public function update(StateUpdateRequest $request, State $state)
    {
        $state->update($request->all());
        return response('Updated', Response::HTTP_ACCEPTED);
    }

    /**
     * @param State $state
     * @return \Illuminate\Http\JsonResponse
     * @throws \Exception
     */
    public function destroy(State $state)
    {
        $state->delete();
        return response(null, Response::HTTP_NO_CONTENT);
    }
}

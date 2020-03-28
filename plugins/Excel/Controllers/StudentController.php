<?php

namespace Nitseditor\Plugins\Excel\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Nitseditor\Plugins\Excel\Models\Library;
use Nitseditor\Plugins\Excel\Models\Products;
use Nitseditor\Plugins\Excel\Models\Region;
use Nitseditor\Plugins\Excel\Models\State;
use Nitseditor\Plugins\Excel\Models\Student;
use Nitseditor\Plugins\Excel\Resources\StudentResource;
use Nitseditor\Plugins\Excel\Requests\StudentStoreRequest;
use Nitseditor\Plugins\Excel\Requests\StudentUpdateRequest;

class StudentController extends Controller
{
    /**
     * @param Request $request
     * @return \Illuminate\Http\Resources\Json\AnonymousResourceCollection
     */
    public function index(Request $request)
    {
        return StudentResource::collection(Student::when($request->first_name, function ($q) use ($request) {
            $q->where('first_name', 'like', '%' . $request->first_name . '%');

        })->get());
    }

    /**
     * @param StudentStoreRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(StudentStoreRequest $request)
    {
        $data = $request->only('first_name', 'last_name', 'address', 'roll_number','email','state_id','region_id');
        $created = Student::create($data);

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
     * @param Student  $student
     * @return \Illuminate\Http\JsonResponse
     */
    public function show(Student $student)
    {
        return response()->json(['data' => $student], 200);
    }

    /**
     * @param StudentUpdateRequest $request
     * @param Student $student
     * @return \Illuminate\Contracts\Routing\ResponseFactory|Response
     */
    public function update(StudentUpdateRequest $request, Student $student)
    {
        $student->update($request->all());
        return response('Updated', Response::HTTP_ACCEPTED);
    }

    /**
     * @param Student $student
     * @return \Illuminate\Http\JsonResponse
     * @throws \Exception
     */
    public function destroy(Student $student)
    {
        $student->delete();
        return response(null, Response::HTTP_NO_CONTENT);
    }

    public function states(){
        return response()->json(['states'=> State::all()], 200);
    }
    public function regions(){
        return response()->json(['regions'=> Region::all()], 200);
    }
}

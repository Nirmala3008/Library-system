<?php

namespace Nitseditor\Plugins\Excel\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Nitseditor\Plugins\Excel\Models\Category;
use Nitseditor\Plugins\Excel\Models\Detail;
use Nitseditor\Plugins\Excel\Requests\CategoryStoreRequest;
use Nitseditor\Plugins\Excel\Resources\CategoryResource;

class CategoryController extends Controller
{
    public function index(Request $request)
    {
        return CategoryResource::collection(Category::search()
            ->paginate()
        );
    }
    public function store(CategoryStoreRequest $request)
    {
        $created = Category::create($request->all());

        if($created)
            return response()->json(['data' => 'Created Successfully'], 200);
        else
            return response()->json(['data' => 'Something went wrong'], 400);
    }

    public function show(Category $category)
    {
        return response()->json(['data' => $category], 200);
    }

    /**
     * @param CategoryUpdateRequest $request
     * @param Category $category
     * @return \Illuminate\Contracts\Routing\ResponseFactory|Response
     */
    public function update(CategoryUpdateRequest $request, Category $category)
    {
        $category->update($request->all());
        return response('Updated', Response::HTTP_ACCEPTED);
    }

    /**
     * @param Category $category
     * @return \Illuminate\Http\JsonResponse
     * @throws \Exception
     */
    public function destroy(Category $category)
    {
        $category->delete();
        return response(null, Response::HTTP_NO_CONTENT);
    }

}

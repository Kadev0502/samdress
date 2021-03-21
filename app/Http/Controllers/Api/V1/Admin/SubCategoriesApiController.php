<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\StoreSubCategoryRequest;
use App\Http\Requests\UpdateSubCategoryRequest;
use App\Http\Resources\Admin\SubCategoryResource;
use App\Models\SubCategory;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class SubCategoriesApiController extends Controller
{
    use MediaUploadingTrait;

    public function index()
    {
        abort_if(Gate::denies('sub_category_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new SubCategoryResource(SubCategory::with(['categories'])->get());
    }

    public function store(StoreSubCategoryRequest $request)
    {
        $subCategory = SubCategory::create($request->all());
        $subCategory->categories()->sync($request->input('categories', []));

        return (new SubCategoryResource($subCategory))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(SubCategory $subCategory)
    {
        abort_if(Gate::denies('sub_category_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new SubCategoryResource($subCategory->load(['categories']));
    }

    public function update(UpdateSubCategoryRequest $request, SubCategory $subCategory)
    {
        $subCategory->update($request->all());
        $subCategory->categories()->sync($request->input('categories', []));

        return (new SubCategoryResource($subCategory))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(SubCategory $subCategory)
    {
        abort_if(Gate::denies('sub_category_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $subCategory->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}

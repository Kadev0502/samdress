<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\MassDestroySubCategoryRequest;
use App\Http\Requests\StoreSubCategoryRequest;
use App\Http\Requests\UpdateSubCategoryRequest;
use App\Models\Category;
use App\Models\SubCategory;
use Gate;
use Illuminate\Http\Request;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Symfony\Component\HttpFoundation\Response;

class SubCategoriesController extends Controller
{
    use MediaUploadingTrait;

    public function index()
    {
        abort_if(Gate::denies('sub_category_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $subCategories = SubCategory::with(['categories'])->get();

        return view('frontend.subCategories.index', compact('subCategories'));
    }

    public function create()
    {
        abort_if(Gate::denies('sub_category_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $categories = Category::all()->pluck('name', 'id');

        return view('frontend.subCategories.create', compact('categories'));
    }

    public function store(StoreSubCategoryRequest $request)
    {
        $subCategory = SubCategory::create($request->all());
        $subCategory->categories()->sync($request->input('categories', []));

        if ($media = $request->input('ck-media', false)) {
            Media::whereIn('id', $media)->update(['model_id' => $subCategory->id]);
        }

        return redirect()->route('frontend.sub-categories.index');
    }

    public function edit(SubCategory $subCategory)
    {
        abort_if(Gate::denies('sub_category_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $categories = Category::all()->pluck('name', 'id');

        $subCategory->load('categories');

        return view('frontend.subCategories.edit', compact('categories', 'subCategory'));
    }

    public function update(UpdateSubCategoryRequest $request, SubCategory $subCategory)
    {
        $subCategory->update($request->all());
        $subCategory->categories()->sync($request->input('categories', []));

        return redirect()->route('frontend.sub-categories.index');
    }

    public function show(SubCategory $subCategory)
    {
        abort_if(Gate::denies('sub_category_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $subCategory->load('categories');

        return view('frontend.subCategories.show', compact('subCategory'));
    }

    public function destroy(SubCategory $subCategory)
    {
        abort_if(Gate::denies('sub_category_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $subCategory->delete();

        return back();
    }

    public function massDestroy(MassDestroySubCategoryRequest $request)
    {
        SubCategory::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }

    public function storeCKEditorImages(Request $request)
    {
        abort_if(Gate::denies('sub_category_create') && Gate::denies('sub_category_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $model         = new SubCategory();
        $model->id     = $request->input('crud_id', 0);
        $model->exists = true;
        $media         = $model->addMediaFromRequest('upload')->toMediaCollection('ck-media');

        return response()->json(['id' => $media->id, 'url' => $media->getUrl()], Response::HTTP_CREATED);
    }
}

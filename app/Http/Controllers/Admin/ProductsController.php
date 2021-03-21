<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\MassDestroyProductRequest;
use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;
use App\Models\Color;
use App\Models\Product;
use App\Models\Size;
use App\Models\Supplier;
use Gate;
use Illuminate\Http\Request;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Symfony\Component\HttpFoundation\Response;

class ProductsController extends Controller
{
    use MediaUploadingTrait;

    public function index()
    {
        abort_if(Gate::denies('product_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $products = Product::with(['supplier', 'colors', 'sizes', 'media'])->get();

        return view('admin.products.index', compact('products'));
    }

    public function create()
    {
        abort_if(Gate::denies('product_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $suppliers = Supplier::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $colors = Color::all()->pluck('name', 'id');

        $sizes = Size::all()->pluck('name', 'id');

        return view('admin.products.create', compact('suppliers', 'colors', 'sizes'));
    }

    public function store(StoreProductRequest $request)
    {
        $product = Product::create($request->all());
        $product->colors()->sync($request->input('colors', []));
        $product->sizes()->sync($request->input('sizes', []));

        if ($request->input('photo', false)) {
            $product->addMedia(storage_path('tmp/uploads/' . basename($request->input('photo'))))->toMediaCollection('photo');
        }

        if ($media = $request->input('ck-media', false)) {
            Media::whereIn('id', $media)->update(['model_id' => $product->id]);
        }

        return redirect()->route('admin.products.index');
    }

    public function edit(Product $product)
    {
        abort_if(Gate::denies('product_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $suppliers = Supplier::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $colors = Color::all()->pluck('name', 'id');

        $sizes = Size::all()->pluck('name', 'id');

        $product->load('supplier', 'colors', 'sizes');

        return view('admin.products.edit', compact('suppliers', 'colors', 'sizes', 'product'));
    }

    public function update(UpdateProductRequest $request, Product $product)
    {
        $product->update($request->all());
        $product->colors()->sync($request->input('colors', []));
        $product->sizes()->sync($request->input('sizes', []));

        if ($request->input('photo', false)) {
            if (!$product->photo || $request->input('photo') !== $product->photo->file_name) {
                if ($product->photo) {
                    $product->photo->delete();
                }

                $product->addMedia(storage_path('tmp/uploads/' . basename($request->input('photo'))))->toMediaCollection('photo');
            }
        } elseif ($product->photo) {
            $product->photo->delete();
        }

        return redirect()->route('admin.products.index');
    }

    public function show(Product $product)
    {
        abort_if(Gate::denies('product_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $product->load('supplier', 'colors', 'sizes');

        return view('admin.products.show', compact('product'));
    }

    public function destroy(Product $product)
    {
        abort_if(Gate::denies('product_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $product->delete();

        return back();
    }

    public function massDestroy(MassDestroyProductRequest $request)
    {
        Product::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }

    public function storeCKEditorImages(Request $request)
    {
        abort_if(Gate::denies('product_create') && Gate::denies('product_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $model         = new Product();
        $model->id     = $request->input('crud_id', 0);
        $model->exists = true;
        $media         = $model->addMediaFromRequest('upload')->toMediaCollection('ck-media');

        return response()->json(['id' => $media->id, 'url' => $media->getUrl()], Response::HTTP_CREATED);
    }
}

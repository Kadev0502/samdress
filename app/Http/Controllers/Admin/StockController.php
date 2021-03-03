<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyStockRequest;
use App\Http\Requests\StoreStockRequest;
use App\Http\Requests\UpdateStockRequest;
use App\Models\Article;
use App\Models\Size;
use App\Models\Stock;
use App\Models\Supplier;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class StockController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('stock_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $stocks = Stock::with(['supplier', 'size', 'created_by', 'article'])->get();

        return view('admin.stocks.index', compact('stocks'));
    }

    public function create()
    {
        abort_if(Gate::denies('stock_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $suppliers = Supplier::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $sizes = Size::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $articles = Article::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.stocks.create', compact('suppliers', 'sizes', 'articles'));
    }

    public function store(StoreStockRequest $request)
    {
        $stock = Stock::create($request->all());

        return redirect()->route('admin.stocks.index');
    }

    public function edit(Stock $stock)
    {
        abort_if(Gate::denies('stock_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $suppliers = Supplier::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $sizes = Size::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $articles = Article::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $stock->load('supplier', 'size', 'created_by', 'article');

        return view('admin.stocks.edit', compact('suppliers', 'sizes', 'articles', 'stock'));
    }

    public function update(UpdateStockRequest $request, Stock $stock)
    {
        $stock->update($request->all());

        return redirect()->route('admin.stocks.index');
    }

    public function show(Stock $stock)
    {
        abort_if(Gate::denies('stock_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $stock->load('supplier', 'size', 'created_by', 'article');

        return view('admin.stocks.show', compact('stock'));
    }

    public function destroy(Stock $stock)
    {
        abort_if(Gate::denies('stock_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $stock->delete();

        return back();
    }

    public function massDestroy(MassDestroyStockRequest $request)
    {
        Stock::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}

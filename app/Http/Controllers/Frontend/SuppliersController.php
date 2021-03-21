<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroySupplierRequest;
use App\Http\Requests\StoreSupplierRequest;
use App\Http\Requests\UpdateSupplierRequest;
use App\Models\Currency;
use App\Models\Supplier;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class SuppliersController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('supplier_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $suppliers = Supplier::with(['currency'])->get();

        return view('frontend.suppliers.index', compact('suppliers'));
    }

    public function create()
    {
        abort_if(Gate::denies('supplier_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $currencies = Currency::all()->pluck('currency', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('frontend.suppliers.create', compact('currencies'));
    }

    public function store(StoreSupplierRequest $request)
    {
        $supplier = Supplier::create($request->all());

        return redirect()->route('frontend.suppliers.index');
    }

    public function edit(Supplier $supplier)
    {
        abort_if(Gate::denies('supplier_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $currencies = Currency::all()->pluck('currency', 'id')->prepend(trans('global.pleaseSelect'), '');

        $supplier->load('currency');

        return view('frontend.suppliers.edit', compact('currencies', 'supplier'));
    }

    public function update(UpdateSupplierRequest $request, Supplier $supplier)
    {
        $supplier->update($request->all());

        return redirect()->route('frontend.suppliers.index');
    }

    public function show(Supplier $supplier)
    {
        abort_if(Gate::denies('supplier_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $supplier->load('currency', 'supplierProducts');

        return view('frontend.suppliers.show', compact('supplier'));
    }

    public function destroy(Supplier $supplier)
    {
        abort_if(Gate::denies('supplier_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $supplier->delete();

        return back();
    }

    public function massDestroy(MassDestroySupplierRequest $request)
    {
        Supplier::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}

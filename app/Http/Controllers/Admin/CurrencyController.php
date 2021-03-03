<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyCurrencyRequest;
use App\Http\Requests\StoreCurrencyRequest;
use App\Http\Requests\UpdateCurrencyRequest;
use App\Models\Currency;
use App\Models\Supplier;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CurrencyController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('currency_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $currencies = Currency::with(['suppliers', 'created_by'])->get();

        return view('admin.currencies.index', compact('currencies'));
    }

    public function create()
    {
        abort_if(Gate::denies('currency_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $suppliers = Supplier::all()->pluck('name', 'id');

        return view('admin.currencies.create', compact('suppliers'));
    }

    public function store(StoreCurrencyRequest $request)
    {
        $currency = Currency::create($request->all());
        $currency->suppliers()->sync($request->input('suppliers', []));

        return redirect()->route('admin.currencies.index');
    }

    public function edit(Currency $currency)
    {
        abort_if(Gate::denies('currency_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $suppliers = Supplier::all()->pluck('name', 'id');

        $currency->load('suppliers', 'created_by');

        return view('admin.currencies.edit', compact('suppliers', 'currency'));
    }

    public function update(UpdateCurrencyRequest $request, Currency $currency)
    {
        $currency->update($request->all());
        $currency->suppliers()->sync($request->input('suppliers', []));

        return redirect()->route('admin.currencies.index');
    }

    public function show(Currency $currency)
    {
        abort_if(Gate::denies('currency_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $currency->load('suppliers', 'created_by');

        return view('admin.currencies.show', compact('currency'));
    }

    public function destroy(Currency $currency)
    {
        abort_if(Gate::denies('currency_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $currency->delete();

        return back();
    }

    public function massDestroy(MassDestroyCurrencyRequest $request)
    {
        Currency::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}

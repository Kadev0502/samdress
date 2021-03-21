@extends('layouts.admin')
@section('content')
<div class="content">

    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    {{ trans('global.show') }} {{ trans('cruds.supplier.title') }}
                </div>
                <div class="panel-body">
                    <div class="form-group">
                        <div class="form-group">
                            <a class="btn btn-default" href="{{ route('admin.suppliers.index') }}">
                                {{ trans('global.back_to_list') }}
                            </a>
                        </div>
                        <table class="table table-bordered table-striped">
                            <tbody>
                                <tr>
                                    <th>
                                        {{ trans('cruds.supplier.fields.id') }}
                                    </th>
                                    <td>
                                        {{ $supplier->id }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.supplier.fields.name') }}
                                    </th>
                                    <td>
                                        {{ $supplier->name }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.supplier.fields.website') }}
                                    </th>
                                    <td>
                                        {{ $supplier->website }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.supplier.fields.currency') }}
                                    </th>
                                    <td>
                                        {{ $supplier->currency->currency ?? '' }}
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <div class="form-group">
                            <a class="btn btn-default" href="{{ route('admin.suppliers.index') }}">
                                {{ trans('global.back_to_list') }}
                            </a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="panel panel-default">
                <div class="panel-heading">
                    {{ trans('global.relatedData') }}
                </div>
                <ul class="nav nav-tabs" role="tablist" id="relationship-tabs">
                    <li role="presentation">
                        <a href="#supplier_products" aria-controls="supplier_products" role="tab" data-toggle="tab">
                            {{ trans('cruds.product.title') }}
                        </a>
                    </li>
                </ul>
                <div class="tab-content">
                    <div class="tab-pane" role="tabpanel" id="supplier_products">
                        @includeIf('admin.suppliers.relationships.supplierProducts', ['products' => $supplier->supplierProducts])
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
@endsection
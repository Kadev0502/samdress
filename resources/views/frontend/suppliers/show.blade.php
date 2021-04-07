@extends('layouts.frontend')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">

            <div class="card">
                <div class="card-header">
                    {{ trans('global.show') }} {{ trans('cruds.supplier.title') }}
                </div>

                <div class="card-body">
                    <div class="form-group">
                        <div class="form-group">
                            <a class="btn btn-default" href="{{ route('frontend.suppliers.index') }}">
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
                                        <a href=" {{ $supplier->website ?? '' }}" target="_blank">go to supplier page</a>
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
                            <a class="btn btn-default" href="{{ route('frontend.suppliers.index') }}">
                                {{ trans('global.back_to_list') }}
                            </a>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
@endsection

@extends('layouts.admin')
@section('content')
<div class="content">

    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    {{ trans('global.show') }} {{ trans('cruds.article.title') }}
                </div>
                <div class="panel-body">
                    <div class="form-group">
                        <div class="form-group">
                            <a class="btn btn-default" href="{{ route('admin.articles.index') }}">
                                {{ trans('global.back_to_list') }}
                            </a>
                        </div>
                        <table class="table table-bordered table-striped">
                            <tbody>
                                <tr>
                                    <th>
                                        {{ trans('cruds.article.fields.id') }}
                                    </th>
                                    <td>
                                        {{ $article->id }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.article.fields.name') }}
                                    </th>
                                    <td>
                                        {{ $article->name }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.article.fields.link') }}
                                    </th>
                                    <td>
                                        {{ $article->link }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.article.fields.photo') }}
                                    </th>
                                    <td>
                                        @foreach($article->photo as $key => $media)
                                            <a href="{{ $media->getUrl() }}" target="_blank" style="display: inline-block">
                                                <img src="{{ $media->getUrl('thumb') }}">
                                            </a>
                                        @endforeach
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.article.fields.unit_price') }}
                                    </th>
                                    <td>
                                        {{ $article->unit_price }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.article.fields.color') }}
                                    </th>
                                    <td>
                                        {{ $article->color->name ?? '' }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.article.fields.category') }}
                                    </th>
                                    <td>
                                        {{ $article->category->name ?? '' }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.article.fields.sub_category') }}
                                    </th>
                                    <td>
                                        {{ $article->sub_category->name ?? '' }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.article.fields.created_at') }}
                                    </th>
                                    <td>
                                        {{ $article->created_at }}
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <div class="form-group">
                            <a class="btn btn-default" href="{{ route('admin.articles.index') }}">
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
                        <a href="#article_stocks" aria-controls="article_stocks" role="tab" data-toggle="tab">
                            {{ trans('cruds.stock.title') }}
                        </a>
                    </li>
                </ul>
                <div class="tab-content">
                    <div class="tab-pane" role="tabpanel" id="article_stocks">
                        @includeIf('admin.articles.relationships.articleStocks', ['stocks' => $article->articleStocks])
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
@endsection
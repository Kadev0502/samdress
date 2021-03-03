<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\StoreArticleRequest;
use App\Http\Requests\UpdateArticleRequest;
use App\Http\Resources\Admin\ArticleResource;
use App\Models\Article;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ArticleApiController extends Controller
{
    use MediaUploadingTrait;

    public function index()
    {
        abort_if(Gate::denies('article_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new ArticleResource(Article::with(['created_by', 'color', 'category', 'sub_category'])->get());
    }

    public function store(StoreArticleRequest $request)
    {
        $article = Article::create($request->all());

        if ($request->input('photo', false)) {
            $article->addMedia(storage_path('tmp/uploads/' . basename($request->input('photo'))))->toMediaCollection('photo');
        }

        return (new ArticleResource($article))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(Article $article)
    {
        abort_if(Gate::denies('article_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new ArticleResource($article->load(['created_by', 'color', 'category', 'sub_category']));
    }

    public function update(UpdateArticleRequest $request, Article $article)
    {
        $article->update($request->all());

        if ($request->input('photo', false)) {
            if (!$article->photo || $request->input('photo') !== $article->photo->file_name) {
                if ($article->photo) {
                    $article->photo->delete();
                }

                $article->addMedia(storage_path('tmp/uploads/' . basename($request->input('photo'))))->toMediaCollection('photo');
            }
        } elseif ($article->photo) {
            $article->photo->delete();
        }

        return (new ArticleResource($article))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(Article $article)
    {
        abort_if(Gate::denies('article_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $article->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}

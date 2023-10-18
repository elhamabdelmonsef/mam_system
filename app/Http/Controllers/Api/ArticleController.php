<?php

namespace App\Http\Controllers\Api;

use App\Domain\Article\ArticleLibrary;
use App\Domain\Article\Model\Article;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;

class ArticleController extends Controller
{
    private $articleLibrary;

    public function __construct(ArticleLibrary $articleLibrary)
    {
        return $this->articleLibrary = $articleLibrary;
    }

    public function index(Request $request)
    {
        $paginationInfo = $request->get('page') ?? [];

        return $this->articleLibrary->getArticles($paginationInfo);
    }

    public function store(Request $request)
    {
        return $this->articleLibrary->createArticle($this->parseData($request->all()));
    }

    public function update(Request $request, Article $article)
    {
        return $this->articleLibrary->updateArticle($article, $this->parseData($request->all()));
    }

    public function show(Article $article)
    {
        return $article;
    }

    public function destroy(Article $article)
    {
        return $this->articleLibrary->deleteArticle($article);
    }

    private function parseData($data)
    {
        return Arr::get($data, 'data.attributes');
    }

}

<?php

namespace App\Domain\Article;

use App\Domain\Article\Model\Article;
use App\Domain\Article\Repository\ArticleRepositoryInterface;
use App\Http\Resources\Article\ArticleResource;
use App\Http\Resources\Article\ArticleCollection;
use Carbon\Carbon;

class ArticleLibrary
{


    private $articleRepo;

    public function __construct(ArticleRepositoryInterface $articleRepo)
    {
        $this->articleRepo = $articleRepo;
    }

    public function getArticles($paginationInfo)
    {
        return $this->articleRepo->getArticles($paginationInfo);
    }
    public function createArticle(array $input)
    {
        $article = new Article();

        $article->fill($input);

        $article->user_id = auth()->user()->id;

        return new ArticleResource($this->articleRepo->saveArticle($article));
    }

    public function showArticle($id)
    {
        return new ArticleResource($this->articleRepo->showArticle($id));
    }
    public function updateArticle(array $attributes, Article $article)
    {
        return new ArticleResource($this->articleRepo->updateArticle($attributes, $article));
    }
    public function destoryArticle($id)
    {
        return $this->articleRepo->destoryArticle($id);
    }
}

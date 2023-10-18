<?php

namespace App\Domain\Article\Repository;

use App\Domain\Article\Filters\UserFilters;
use App\Domain\Article\Model\Article;

class ArticleRepository implements ArticleRepositoryInterface
{
    protected $defaultPagination = ['number' => 1, 'size' => 500];

    public function getArticles($pagingInfo, UserFilters $filters = null)
    {
        $builder = Article::query();

        if ($pagingInfo)
            return $builder->paginate(array_key_exists('size', $pagingInfo) ? $pagingInfo['size'] : $this->defaultPagination['size'],
                ['*'], null, array_key_exists('number', $pagingInfo) ? $pagingInfo['number'] : $this->defaultPagination['number']);

        return $builder->get();
    }

    public function saveArticle(Article $article)
    {
        $article->save();
        return $article;
    }

    public function showArticle($id): Article
    {
        return Article::findOrFail($id);
    }

    public function updateArticle(array $attributes, Article $article)
    {


        return $article;
    }


    public function destoryArticle($id)
    {
        $article = Article::findOrFail($id);
        $article->delete();
    }
}

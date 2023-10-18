<?php

namespace App\Domain\Article\Repository;

use App\Domain\Article\Filters\UserFilters;
use App\Domain\Article\Model\Article;

interface ArticleRepositoryInterface
{
    const ARTICLE_STATUSES = [
        'article_status_draft' => 'Draft',
        'article_status_conformed' => 'Confirmed',
        'article_status_completed' => 'Completed',
        'article_status_cancelled' => 'Cancelled',
    ];

    public function getArticles(?array $pagingInfo, UserFilters $filters = null);

    public function saveArticle(Article $article);

    public function showArticle($id): Article;

    public function destoryArticle($id);

    public function updateArticle(array $attributes, Article $article);

   // public function getArticleComments(array $attributes);
}

<?php

namespace Core\Jobs\Article;


use Core\Entities\Article;
use Core\Services\ArticleService;
use DB;

class DestroyArticleJob
{
    /**
     * @var Article
     */
    private $article;

    /**
     * DestroyArticleJob constructor.
     * @param Article $article
     */
    public function __construct(Article $article)
    {
        $this->article = $article;
    }

    /**
     * @param ArticleService $articleService
     * @return mixed
     */
    public function handle(ArticleService $articleService)
    {
        return DB::transaction(function() use ($articleService) {
            $articleService->destroy($this->article);
        });
    }
}
<?php

namespace Core\Jobs\Article;


use Core\Entities\Article;
use Core\Services\ArticleService;
use DB;

class UpdateArticleJob
{
    /**
     * @var Article
     */
    private $article;
    /**
     * @var array
     */
    private $data;

    /**
     * UpdateArticleJob constructor.
     * @param Article $article
     * @param array $data
     */
    public function __construct(Article $article, array $data)
    {
        $this->article = $article;
        $this->data = $data;
    }

    /**
     * @param ArticleService $articleService
     * @return mixed
     */
    public function handle(ArticleService $articleService)
    {
        return DB::transaction(function() use ($articleService) {
            return $articleService->update($this->article, $this->data);
        });
    }
}
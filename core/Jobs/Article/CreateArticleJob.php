<?php

namespace Core\Jobs\Article;


use Core\Services\ArticleService;
use DB;

class CreateArticleJob
{
    /**
     * @var array
     */
    private $data;

    /**
     * CreateArticleJob constructor.
     * @param array $data
     */
    public function __construct(array $data)
    {
        $this->data = $data;
    }

    /**
     * @param ArticleService $articleService
     * @return mixed
     */
    public function handle(ArticleService $articleService)
    {
        return DB::transaction(function() use ($articleService) {
            return $articleService->create($this->data);
        });
    }
}
<?php

namespace Core\Services;


use Core\Entities\Article;
use Core\Repositories\ArticleRepository;
use Core\Validators\ArticleValidator;
use Prettus\Validator\LaravelValidator;

class ArticleService extends Service
{
    /**
     * @var ArticleRepository
     */
    private $repository;
    /**
     * @var ArticleValidator
     */
    private $validator;

    /**
     * ArticleService constructor.
     * @param ArticleRepository $repository
     * @param ArticleValidator $validator
     */
    public function __construct(
        ArticleRepository $repository,
        ArticleValidator $validator
    ) {
        $this->repository = $repository;
        $this->validator = $validator;
    }

    /**
     * @param array $data
     * @return mixed
     */
    public function create(array $data)
    {
        $this->authorize(Article::class, 'create');

        $this->validate($this->validator, LaravelValidator::RULE_CREATE, $data);

        return $this->repository->create($data);
    }

    /**
     * @param Article $article
     * @param array $data
     * @return mixed
     */
    public function update(Article $article, array $data)
    {
        $this->authorize($article, 'update');

        $this->validate($this->validator, LaravelValidator::RULE_UPDATE, $data);

        return $this->repository->update($data, $article->getKey());
    }

    /**
     * @param Article $article
     */
    public function destroy(Article $article)
    {
        $this->authorize($article, 'update');

        $this->repository->delete($article->getKey());
    }
}
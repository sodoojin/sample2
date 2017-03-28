<?php

namespace Core\Policies;


use Core\Entities\Article;
use Core\Entities\User;

class ArticlePolicy
{
    /**
     * @return bool
     */
    public function create()
    {
        return true;
    }

    /**
     * @param User $user
     * @param Article $article
     * @return bool
     */
    public function update(User $user, Article $article)
    {
        return $user->id == $article->user_id;
    }
}
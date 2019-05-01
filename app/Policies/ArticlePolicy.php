<?php

namespace App\Policies;

use App\Link;
use App\User;
use App\Article;
use Illuminate\Auth\Access\HandlesAuthorization;

class ArticlePolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view the article.
     *
     * @param  \App\User $user
     * @param  \App\Article $article
     * @return mixed
     */

    public function deletegroup(User $user)
    {
        return false;
    }
    public function view(User $user, Article $article)
    {
        //
        return true;

    }

    /**
     * Determine whether the user can create articles.
     *
     * @param  \App\User $user
     * @return mixed
     */
    public function create(User $user)
    {
        //
        return true;
    }

    /**
     * Determine whether the user can update the article.
     *
     * @param  \App\User $user
     * @param  \App\Article $article
     * @return mixed
     */
    public function update(User $user, Article $article)
    {
        return
        (
                    $user->account->id == $article->account_id
                    &&
                    $user->account->links->where('title','edit article')->first()
                );
    }

    public function before($user, $ability)
    {
        if($user->account->super_admin == 1)
            return true;
    }


    /**
     * Determine whether the user can delete the article.
     *
     * @param  \App\User $user
     * @param  \App\Article $article
     * @return mixed
     */
    public function delete(User $user, Article $article)
    {
        //
        return true;
    }

    /**
     * Determine whether the user can restore the article.
     *
     * @param  \App\User $user
     * @param  \App\Article $article
     * @return mixed
     */
    public function restore(User $user, Article $article)
    {
        //
        return true;
    }

    /**
     * Determine whether the user can permanently delete the article.
     *
     * @param  \App\User $user
     * @param  \App\Article $article
     * @return mixed
     */
    public function forceDelete(User $user, Article $article)
    {
        //
        return true;
    }
}

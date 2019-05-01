<?php

namespace App\Providers;


use App\Article;
use App\Policies\ArticlePolicy;
use Laravel\Passport\Passport;
use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        Article::class => ArticlePolicy::class,
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        Passport::routes();
        $this->registerPolicies();

        /*Gate::define('update-article', 'App\Policies\ArticlePolicy@update' /*function ($user, $article) {

            return (
                $user->account->id == $article->account_id
            &&
                $user->account->links->where('title','edit article')->first()
            );
        });*/
      //  Gate::resource('articles', 'App\Policies\ArticlePolicy'
           /*, [
                'deleteg' => 'deletegroup',
            ]*/
       // );
        //
       /* Gate::before(function ($user, $ability) {
          if($user->account->super_admin == 1)
            return true;
        });*/



    }
}

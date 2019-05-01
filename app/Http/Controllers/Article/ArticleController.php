<?php

namespace App\Http\Controllers\Article;


use App\Category;
use App\Comment;
use App\Http\Controllers\Account\NotificationController;
use App\Http\Requests\CommentRequest;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Session;
use DB;
use App\Article;
use App\Http\Controllers\Controller;

class ArticleController extends Controller
{
    function article_charts(Request $request)
    {
        $q = $request["q"] ?? "";
        $category_id = $request["category_id"] ?? "";


        $articles = Category::select('name')->withCount(['articles' => function ($qeury) use ($q, $category_id) {
            if ($q)
                $qeury->whereRaw("(title like ?)"
                    , ["%$q%"]);
            if ($category_id)
                $qeury->whereRaw("(category_id = ?)"
                    , [$category_id]);
        }])->has('articles')->get()->where('articles_count', '>', 0);
        $categories = Category::all();
        return view('account.article.charts', compact('articles', 'categories'));
    }

    function article_charts_view(Request $request)
    {
        return view('account.article.charts2');
    }

    function article_charts_axios(Request $request)
    {
        $q = $request["q"] ?? "";
        $category_id = $request["category_id"] ?? "";


        $articles = Category::select('name')->withCount(['articles' => function ($qeury) use ($q, $category_id) {
            if ($q)
                $qeury->whereRaw("(title like ?)"
                    , ["%$q%"]);
            if ($category_id)
                $qeury->whereRaw("(category_id = ?)"
                    , [$category_id]);
        }])->has('articles')->get()->where('articles_count', '>', 0);

        return $articles;
    }

    function categories_axios(Request $request)
    {
        $categories = Category::all();
        return $categories;
    }
 /*************************************/

  /************************************/
    function index()
    {//
        $all_categoris = Category::all();
        $most_categoris = Category::with('articles')->withcount('articles')->orderBy('articles_count', 'desc')->get(5);
        $last_article = Article::orderBy('id', 'desc')->take(10)->get();
        $most_comment_article = Article::with('comments')->withcount('comments')->orderBy('comments_count', 'desc')->get(10);
        return view('article.index', compact('most_categoris', 'all_categoris', 'last_article', 'most_comment_article'));
    }

    //
    function notfound()
    {//
        $all_categoris = Category::all();
        $most_categoris = Category::with('articles')->withcount('articles')->orderBy('articles_count', 'desc')->get(5);
        $last_article = Article::orderBy('id', 'desc')->take(10)->get();
        $most_comment_article = Article::with('comments')->withcount('comments')->orderBy('comments_count', 'desc')->get(10);
        return view('article.not_found', compact('most_categoris', 'all_categoris', 'last_article', 'most_comment_article'));
    }

    function about()
    {//
        $all_categoris = Category::all();
        $most_categoris = Category::with('articles')->withcount('articles')->orderBy('articles_count', 'desc')->get(5);
        $last_article = Article::orderBy('id', 'desc')->take(10)->get();
        $most_comment_article = Article::with('comments')->withcount('comments')->orderBy('comments_count', 'desc')->get(10);
        return view('article.about', compact('most_categoris', 'all_categoris', 'last_article', 'most_comment_article'));
    }

    function article_show($id)
    {//
        $all_categoris = Category::all();
        $most_categoris = Category::with('articles')->withcount('articles')->orderBy('articles_count', 'desc')->get(5);
        $last_article = Article::orderBy('id', 'desc')->take(10)->get();
        $most_comment_article = Article::with('comments')->withcount('comments')->orderBy('comments_count', 'desc')->get(10);

        $item = Article::with('comments')->find($id);
        if ($item == NULL) {
            return redirect("/notfound");
        }
        $most_article_insection = Category::find($item->category->id)->articles()->take(3)->get();;
        return view('article.article_show', compact('most_categoris', 'most_article_insection', 'item', 'all_categoris', 'last_article', 'most_comment_article'));
    }

    function section($id)
    {//
        $all_categoris = Category::all();
        $most_categoris = Category::with('articles')->withcount('articles')->orderBy('articles_count', 'desc')->get(5);
        $last_article = Article::orderBy('id', 'desc')->take(10)->get();
        $most_comment_article = Article::with('comments')->withcount('comments')->orderBy('comments_count', 'desc')->get(10);

        $item = Category::find($id);
        if ($item == NULL) {
            return redirect("/notfound");
        }
        $items = Category::find($id)->articles()->paginate(10);

        return view('article.section', compact('most_categoris', 'items', 'item', 'all_categoris', 'last_article', 'most_comment_article'));
    }

    function article_search()
    {//
        $all_categoris = Category::all();
        $most_categoris = Category::with('articles')->withcount('articles')->orderBy('articles_count', 'desc')->get(5);
        $last_article = Article::orderBy('id', 'desc')->take(10)->get();
        $most_comment_article = Article::with('comments')->withcount('comments')->orderBy('comments_count', 'desc')->get(10);

        $q = request()['q'] ?? "";
        $items = Article::join('categories', 'categories.id', '=', 'articles.category_id')->select('articles.*')->whereRaw("true");
        if ($items == null) {
            session::flash('msg', 'w:نأسف لا يوجد بيانات لعرضها');
            return redirect('/account/article');
        }
        if ($q)
            $items->whereRaw("(title like ? )"
                , ["%$q%"]);

        $items = $items->orderBy("articles.id", 'desc')->paginate(10)->appends([
            "q" => $q]);

        return view('article.search', compact('most_categoris', 'items', 'all_categoris', 'last_article', 'most_comment_article'));
    }

    function addcoment($id, CommentRequest $request)
    {
        $item = Article::with('comments')->find($id);
        if ($item == NULL) {
            return redirect("/notfound");
        }
        Comment::create($request->all());


        $users_ids = User::pluck('id')->toArray();
        for ($i = 0; $i < count($users_ids); $i++) {
            if (User::find($users_ids[$i])->account->links->contains(\App\Link::where('title', '=', 'notifications control')->first()->id))
                NotificationController::insert(['user_id' => $users_ids[$i], 'type' => 'إضافة', 'title' => 'تم إضافة تعليق جديد', 'link' => "/account/comment/commentinart/$id"]);

        }

        return redirect("/article/$id");
    }

}
<?php

namespace App\Http\Controllers\Article;


use Session;
use DB;
use App\Article;
use App\Http\Controllers\Controller;

class ArticleController extends Controller
{

    function index(){
        return view('article.index');
    }
}
<?php

namespace App\Http\Controllers\Account;;

use App\Article;
use Illuminate\Http\Request;
use Session;
use App\Http\Controllers\Controller;
    
    
class BaseController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth']);
       // $this->middleware('checkPermission')->except('profile');

    }
}
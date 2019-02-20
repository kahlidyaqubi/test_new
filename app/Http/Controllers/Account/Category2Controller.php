<?php

namespace App\Http\Controllers\Account;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Session;
use App\Category;
use App\User;
use App\Http\Requests\CategoryRequest;
use DB;

class Category2Controller extends BaseController
{
    public function index(Request $request)
    {

    }

    public function create()
    {
        return view("account.category.catvue");
    }

    public function store(Request $request)
    {
        $testeroor=Validator::make($request->all(),['name'=>'required']);
        if($testeroor->fails()){
            return response()->json($testeroor->messages(),201);
        }
         return response()->json($request->name,200);
    }

    public function edit($id)
    {

    }
    
    public function update(CategoryRequest $request, $id)
    {

    }

    public function delete($id)
    { 

     }
    public function lodemore()
    {

    }
   

}
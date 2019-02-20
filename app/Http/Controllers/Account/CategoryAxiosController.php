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

class CategoryAxiosController extends BaseController
{
    public function index(Request $request)
    {

    }

    public function create()
    {
        return view("account.category.create");
    }

    public function store(Request $request)
    {
        $testeroor=Validator::make($request->all(),[
            'name'=>'required',
          //  'email'=>'required',
        ]);
        if($testeroor->fails()){
            return response()->json(['message'=>'faild','type'=>0,'data'=>$testeroor->messages()],203);

        }
        Category::create($request->all());
            return response()->json(['message'=>'succses','type'=>1,'data'=>$request->all()],200);

    }

    public function edit($id)
    {

    }
    
    public function update(Request $request, $id)
    {

    }

    public function delete($id)
    { 

     }
    public function lodemore()
    {

    }
   

}
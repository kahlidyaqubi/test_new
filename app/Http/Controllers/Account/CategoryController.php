<?php

namespace App\Http\Controllers\Account;

use Illuminate\Http\Request;
use Session;
use App\Category;
use App\User;
use App\Http\Requests\CategoryRequest;
use DB;

class CategoryController extends BaseController
{
    public function __construct()
    {
        $this->middleware(['verified']);
    }
    public function index(Request $request)
    {
        $q = $request["q"]??"";
        $items = Category::whereRaw("true");
        if ($items == null) {
            session::flash('msg', 'w:نأسف لا يوجد بيانات لعرضها');
            return redirect('/account/category');
        }
        if ($q)
            $items->whereRaw("(name like ? )"
                , ["%$q%"]);
      

        $items = $items->orderBy("name")->paginate(12)->appends([
            "q" => $q]);
        return view("account.category.index", compact('items'));
    }

    public function create()
    {
        return view("account.category.create");
    }

    public function store(CategoryRequest $request)
    {
        $isExists = Category::where("name", $request["name"])->count();
        if ($isExists) {
            Session::flash("msg", "e:القيمة المدخلة موجودة مسبقا");
            return redirect("/account/category/create")->withInput();
        }
        Category::create($request->all());
        Session::flash("msg", "تمت عملية الاضافة بنجاح");
        return redirect("/account/category/create");
    }

    public function edit($id)
    {
        $item = Category::find($id);
        if ($item == NULL) {
            Session::flash("msg", "e:الرجاء التاكد من الرابط المطلوب");
            return redirect("/account/category");
        }
        return view("account.category.edit", compact("item"));
    }
    
    public function update(CategoryRequest $request, $id)
    {
		$item = Category::find($id);
        if ($item == NULL) {
            Session::flash("msg", "e:الرجاء التاكد من الرابط المطلوب");
            return redirect("/account/account");
        }

        $isExists = Category::where("name", $request["name"])->where("id", "!=", $item->id)->count();
        if ($isExists) {
            Session::flash("msg", "e:القيمة المدخلة موجودة مسبقا");
            return redirect("/account/category/$id/edit");
        }

        $item->update($request->all());
        Session::flash("msg", "i:تمت عملية الحفظ بنجاح");
        return redirect("/account/category");
    }

    public function delete($id)
    { 
        $item =Category::find($id);
		   if ($item == NULL){
			 Session::flash("msg", "e:الرجاء التاكد من الرابط المطلوب");
                return redirect("/account/category");
		    }

        if ($item->articles->count()>0){
            Session::flash("msg", "e:لا يمكن حذف  فئة مرتبط بها أخبار");
            return redirect("/account/category");
        }
           else {
                $item = Category::find($id);
                $item->delete();

                Session::flash("msg", "تم حذف الفئة بنجاح");
                return redirect("/account/category");
            }

     }
    public function deletegroup(Request $request)
    {
        if($request->ids=='')
            Session::flash("msg","e:لم يتم تحديد أي عنصر");
        else
            Session::flash("msg","تمت عملية الحذف بنجاح");

        $items = preg_split('/,/',$request->ids);

        foreach(Category::find($items) as $item){
            if ($item->articles->count()>0)
                continue;
            else
                $item->delete();
         }
        return redirect("/account/category");
    }
   

}
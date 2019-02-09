<?php

namespace App\Http\Controllers\Account;

use App\Article;
use Illuminate\Http\Request;
use Session;
use App\Comment;
use App\Http\Requests\CommentRequest;
use DB;

class CommentController extends BaseController
{
    public function __construct()
    {
        $this->middleware(['verified']);
    }
    public function active($id)
    {
        $item = Comment::find($id);

        if ($item == NULL){
            Session::flash("msg", "e:الرجاء التاكد من الرابط المطلوب");
            return redirect("/account/comment");
        }
        if($item->status == 1) {
            $item->status = 2;
            $item->save();
        }
        elseif ($item->status == 2) {
            $item->status = 1;
            $item->save();
        }

    }
    public function index(Request $request)
    {
        $q = $request["q"]??"";
        $status = $request["status"] ?? "";

        $items = Comment::whereRaw(true);
        if ($items == null) {
            session::flash('msg', 'w:نأسف لا يوجد بيانات لعرضها');
            return redirect('/account/comment');
        }
        if ($q)
            $items->whereRaw("(comment like ?)"
                , ["%$q%"]);
        if ($status != "")
            $items->whereRaw("status = ?", [$status]);

        $items = $items->orderBy("id",'desc')->paginate(12)->appends([
            "q" => $q ]);
        return view("account.comment.index", compact('items'));
    }

    public function commentinart(Request $request,$id)
    {
        $q = $request["q"]??"";
        $status = $request["status"] ?? "";

        $item= Article::find($id);
        $items = $item->comments()->whereRaw(true);
        if ($items == null) {
            session::flash('msg', 'w:نأسف لا يوجد بيانات لعرضها');
            return redirect('/account/comment');
        }
        if ($q)
            $items->whereRaw("(comment like ?)"
                , ["%$q%"]);
        if ($status != "")
            $items->whereRaw("status = ?", [$status]);

        $items = $items->orderBy("id",'desc')->paginate(12)->appends([
            "q" => $q ]);
        return view("account.comment.commentinart", compact('items','item'));
    }

    public function store(CommentRequest $request)
    {
        $request['status']=0;
        Comment::create($request->all());
        echo "تم اضافة تعليق بنجاح";
    }



    public function delete($id)
    {
        $item =Comment::find($id);
		   if ($item == NULL){
			 Session::flash("msg", "e:الرجاء التاكد من الرابط المطلوب");
                return redirect("/account/comment");
		    }
           else {
                $item = Comment::find($id);
                $item->delete();

                Session::flash("msg", "تم حذف تعليق بنجاح");
                return redirect("/account/comment");
            }

     }
    public function deletegroup(Request $request)
    {
        if($request->ids=='')
            Session::flash("msg","e:لم يتم تحديد أي عنصر");
        else
            Session::flash("msg","تمت عملية الحذف بنجاح");

        $items = preg_split('/,/',$request->ids);


        Comment::destroy($items);
        return redirect("/account/comment");
    }
   

}
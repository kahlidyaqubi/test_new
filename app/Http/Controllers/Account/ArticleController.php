<?php

namespace App\Http\Controllers\Account;

use Illuminate\Http\Request;
use Session;
use App\Article;
use App\Category;
use App\Http\Requests\ArticleRequest;
use DB;
use App\Files;
use Illuminate\Support\Facades\Storage;

class ArticleController extends BaseController
{
    public function __construct()
    {
        $this->middleware(['verified']);
    }
    public function active($id)
    {
        //

        $item = Article::find($id);

        if ($item == NULL){
            Session::flash("msg", "e:الرجاء التاكد من الرابط المطلوب");
            return redirect("/account/article");
        }
        if($item->active == 1) {
            $item->active = 2;
            $item->save();
        }
        elseif ($item->active == 2) {
            $item->active = 1;
            $item->save();
        }

    }
    public function index(Request $request)
    {
        $q = $request["q"]??"";
        $items = Article::join('categories', 'categories.id', '=', 'articles.category_id')->select('articles.*')->whereRaw("true");
        if ($items == null) {
            session::flash('msg', 'w:نأسف لا يوجد بيانات لعرضها');
            return redirect('/account/article');
        }
        if ($q)
            $items->whereRaw("(title like ? or categories.name like ?)"
                , ["%$q%","%$q%"]);
      

        $items = $items->orderBy("articles.id",'desc')->paginate(12)->appends([
            "q" => $q]);
        return view("account.article.index", compact('items'));
    }

    public function create()
    {
        $categories=Category::all();
        return view("account.article.create" ,compact('categories'));
    }

    public function store(ArticleRequest $request)
    {

        $request['publish']=1;
        $mycontect = $request->input('news');
        unset($request['news']);
        $id =Article::create($request->all())->id;
        Storage::disk('uploads')->makeDirectory("/newsfile/$id/images");

        foreach ($request->file('files') as $file) {
            $file->move(public_path() . '/newsfile/' . $id . '/images', $file->getClientOriginalName());
            Files::create(['file' => $file->getClientOriginalName(), 'news_id' => $id]);
        }
//

        $mycontect2 = str_replace('data-filename="', 'src="' . asset('/newsfile/' . $id . '/images/') . "/", $mycontect);

        Storage::disk('uploads')->put('/newsfile/' . $id . '/myfile.txt', $mycontect2);

        $imge = $request->file('imge');
        $imge->move(public_path() . '/newsfile/' . $id, $imge->getClientOriginalName());


        $thenews =Article::find($id);
        $thenews->news = 'myfile.txt';
        $thenews->imge = $imge->getClientOriginalName();
        $thenews->save();

        Session::flash("msg", "تمت عملية الاضافة بنجاح");
        return redirect("/account/article/create");
    }

    public function edit($id)
    {
        $item = Article::find($id);
        if ($item == NULL) {
            Session::flash("msg", "e:الرجاء التاكد من الرابط المطلوب");
            return redirect("/account/article");
        }
        $categories=Category::all();
        return view("account.article.edit", compact("item",'categories'));
    }
    
    public function update(ArticleRequest $request, $id)
    {
		$item = Article::find($id);
        if ($item == NULL) {
            Session::flash("msg", "e:الرجاء التاكد من الرابط المطلوب");
            return redirect("/account/article");
        }
        $rule = [
            'summary' => 'required|string|max:500',
        ];
        if ($request->hasFile('imge'))
            $rule['imge'] = 'image|mimes:jpeg,png,jpg,gif,svg|max:2048';

        if ($request->hasFile('files'))
            $rule['files.*'] = 'image|mimes:jpeg,png,jpg,gif,svg';
        $valid = $this->validate($request, $rule);

        if ($request->hasFile('files')) {
            foreach ($request->file('files') as $file) {
                $file->move(public_path() . '/newsfile/' . $id . '/images', $file->getClientOriginalName());
                Files::create(['file' => $file->getClientOriginalName(), 'news_id' => $id]);
            }
        }

        $mycontect = $request->input('news');
        $mycontect2 = str_replace('data-filename="', 'src="' . asset('/newsfile/' . $id . '/images/') . "/", $mycontect);
        if ($request->hasFile('imge')) {
            //delete old
            $aoldimg = $item->getAttribute('imge');
            $mypath = public_path() . '/newsfile/' . $id . '/images';
            if (file_exists($mypath . $aoldimg)) {
                unlink($mypath . $aoldimg);
            }
            //add newimg
            $imge = $request->file('imge');
            $imge->move(public_path() . '/newsfile/' . $id, $imge->getClientOriginalName());
            $item->imge = $imge->getClientOriginalName();
        }
        if (Storage::disk('uploads')->exists('/newsfile/' . $id . '/myfile.txt')) {
            Storage::disk('uploads')->delete('/newsfile/' . $id . '/myfile.txt');
        }

        Storage::disk('uploads')->put('/newsfile/' . $id . '/myfile.txt', $mycontect2);
        unset($request['news']);
        $item->update($request->all());
        Session::flash("msg", "i:تمت عملية الحفظ بنجاح");
        return redirect("/account/article");
    }

    public function delete($id)
    { 
        $item =Article::find($id);
		   if ($item == NULL){
			 Session::flash("msg", "e:الرجاء التاكد من الرابط المطلوب");
                return redirect("/account/article");
		    }
           else {
                $item = Article::find($id);
                $item->delete();

                Session::flash("msg", "تم حذف خبر بنجاح");
                return redirect("/account/article");
            }

     }
    public function deletegroup(Request $request)
    {
        if($request->ids=='')
            Session::flash("msg","e:لم يتم تحديد أي عنصر");
        else
            Session::flash("msg","تمت عملية الحذف بنجاح");

        $items = preg_split('/,/',$request->ids);


        Article::destroy($items);
        return redirect("/account/article");
    }
   

}
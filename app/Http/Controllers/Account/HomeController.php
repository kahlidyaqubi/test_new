<?php

namespace App\Http\Controllers\Account;

use Illuminate\Http\Request;
use Session;
use App\User;
use App\Account;
use App\Http\Requests\ChangePasswordRequest;
use App\Http\Requests\ProfileRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class HomeController extends BaseController
{
    
    public function dashboard()
    {
        $item = auth()->user()->account;
        $articles = $item->articles;
        
      return view("account.home.dashboard",compact('item','articles'));
    }
    public function profile($id)
    {
        $item = Account::find($id);
        if ($item == NULL) {
            Session::flash("msg", "e:الرجاء التاكد من الرابط المطلوب");
            return redirect("/account/account");
        }
        if ($item->id != auth()->user()->account->id) {
            Session::flash("msg", "e:لا تملك الصلاحية التعديل");
            return redirect("/account/account");
        }
        return view("account.home.profile", compact("item"));
    }
      //
    public function profileup(ProfileRequest $request, $id)
    {
        $testeroor=$this->validate($request,[
            'imge'=> 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',

        ]);
        $item = Account::find($id);
        if ($item == NULL) {
            Session::flash("msg", "e:الرجاء التاكد من الرابط المطلوب");
            return redirect("/account");
        }
        $isExists = User::where("email", $request["email"])->where("id", "!=", $item->user->id)->count();
        if ($isExists) {
            Session::flash("msg", "e:القيمة المدخلة موجودة مسبقا");
            return redirect("/account/account/profile/$id");
        }//
        $isExists = User::where("name", $request["name"])->where("id", "!=", $item->user->id)->count();
        if ($isExists) {
            Session::flash("msg", "e:القيمة المدخلة موجودة مسبقا");
            return redirect("/account/account/profile/$id");
        }
       
        $user = User::find($item->user_id);
        if ($request["password"] != "") {
            $user->password = bcrypt($request["password"]);
        }
        
        if ($request->hasFile('imge')) {
            //deleted old
            $aoldimg = $item->getAttribute('image');
            $mypath = public_path() . '/storage/images/' . $item['id'] . '/';
            if (file_exists($mypath . $aoldimg) && $aoldimg != null) {
                unlink($mypath . $aoldimg);
            }
            $imge = $request->file('imge');
            if (!file_exists(public_path() . '/storage/images/' . $item['id']))
                Storage::disk('uploads')->makeDirectory('/storage/images/' . $item['id']);

            $imagename=basename($request->file('imge')->store('/public/'. 'images/' . $item['id'] . '/'));
            //$imge->move(public_path() . '/images/' . $item['id'] . '/', $imagename);
            unset($request['imge']);
            $request['image']=$imagename;
          
        }
		$item->update($request->all());
		 $user->update($request->all());
        Session::flash("msg", "i:تمت عملية الحفظ بنجاح");
        return redirect("/account");
    }
     
    public function noaccess(){        
        return view("account.home.noaccess");
    }
    public function changePassword(){        
        return view("account.home.change-password");
    } 
    public function changePasswordPost(ChangePasswordRequest $request)
    {
        $credentials = [
            'email'=>Auth::user()->email ,
            'password'=>$request->old_password
        ];

        if (Auth::attempt($credentials)) {
            $user = Auth::user();
            $user->password = bcrypt($request["password"]);
            $user->save();
            
            Session::flash("msg","s:تم تغيير كلمة المرور بنجاح");
        }
        else{
            Session::flash("msg","e: كلمة المرور الحالية غير صحيحة");
        }    
        return redirect('/account/home/change-password');
    }
    public function convertlang($lang){

        if(in_array($lang,['ar','en']))
        {
            if(auth()->user())
            {
                $user=auth()->user();
                $user->lang=$lang;
                $user->save();
            }else{
                session()->put('lang',$lang);
            }
        }else{
            if(auth()->user())
            {
                $user=auth()->user();
                $user->lang='en';
                $user->save();
            }else{
                session()->put('lang','en');
            }
        }
        return back();

    }
        
}
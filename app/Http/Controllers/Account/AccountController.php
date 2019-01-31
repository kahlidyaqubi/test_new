<?php

namespace App\Http\Controllers\Account;


use App\Imports\AccountsExport;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Session;
use App\Account;
use App\User;
use App\Http\Requests\AccountRequest;
use DB;
use App\Imports\CitizenExport;
use Maatwebsite\Excel\Facades\Excel;
use  PDF;

class AccountController extends BaseController
{
    public function index(Request $request)
    {
        $q = $request["q"]??"";
        $items = Account::join('users', 'users.id', '=', 'accounts.user_id')->select('accounts.id','accounts.user_id','users.name','accounts.full_name','accounts.mobile','users.email')->whereRaw("true");
        if ($items == null) {
            session::flash('msg', 'w:نأسف لا يوجد بيانات لعرضها');
            return redirect('/account/account');
        }
        if ($q)
            $items->whereRaw("(full_name like ? or users.email like ? or mobile like ? or users.name like ? )"
                , ["%$q%", "%$q%", "%$q%", "%$q%"]);
      

        if ($request['theaction'] == 'excel') {
            $items = $items->get();
            return Excel::download(new AccountsExport($items), 'accounts.xlsx');
        } elseif ($request['theaction'] == 'print'){
            $items = $items->get();
            $pdf = PDF::loadView("account.account.printall", compact('items'));
            return $pdf->stream('document.pdf');
        }else{
            $items = $items->orderBy("full_name")->paginate(5)->appends([
                "q" => $q]);
            return view("account.account.index", compact('items'));
        }
    }

    public function create()
    {
        return view("account.account.create");
    }

    public function store(AccountRequest $request)
    {
        $isExists = User::where("email", $request["email"])->count();
        if ($isExists) {
            Session::flash("msg", "e:القيمة المدخلة موجودة مسبقا");
            return redirect("/account/account/create")->withInput();
        }
        $isExists = User::where("name", $request["name"])->count();
        if ($isExists) {
            Session::flash("msg", "e:القيمة المدخلة موجودة مسبقا");
            return redirect("/account/account/create")->withInput();
        }
        $password = $request["password"];
        if (trim($password) == '') {
            Session::flash("msg", "e:الرجاء ادخال كلمة المرور");
            return redirect("/account/account/create")->withInput();
        }
        $user= User::create([
            'name' => $request["name"],
            'email' => $request["email"],
            'password' => bcrypt($password),
            
        ]);
        $user->sendEmailVerificationNotification();
        $user_id=$user->id;
        $request["user_id"] = $user_id;
        $theid = Account::create($request->all())->id;
         Session::flash("msg", "تمت عملية الاضافة بنجاح");
        return redirect("/account/account/permission/$theid");
    }

    public function edit($id)
    {
        $item = Account::find($id);
        if ($item == NULL) {
            Session::flash("msg", "e:الرجاء التاكد من الرابط المطلوب");
            return redirect("/account/account");
        }
        return view("account.account.edit", compact("item"));
    }
    
    public function update(AccountRequest $request, $id)
    {
		$item = Account::find($id);
        if ($item == NULL) {
            Session::flash("msg", "e:الرجاء التاكد من الرابط المطلوب");
            return redirect("/account/account");
        }
		
        $isExists = User::where("email", $request["email"])->where("id", "!=", $item->user->id)->count();
        if ($isExists) {
            Session::flash("msg", "e:القيمة المدخلة موجودة مسبقا");
            return redirect("/account/account/$id/edit");
        }//
        $isExists = User::where("name", $request["name"])->where("id", "!=", $item->user->id)->count();
        if ($isExists) {
            Session::flash("msg", "e:القيمة المدخلة موجودة مسبقا");
            return redirect("/account/account/$id/edit");
        }
        
        $user = User::find($item->user_id);
        if ($request["password"] != "") {
            $user->password = bcrypt($request["password"]);
        }
        $user->name = $request["name"];
        $user->email = $request["email"];
        $user->save();

        $item->update($request->all());
        Session::flash("msg", "i:تمت عملية الحفظ بنجاح");
        return redirect("/account/account");
    }

    public function delete($id)
    { 
        $item =Account::find($id);
		   if ($item == NULL){
			 Session::flash("msg", "e:الرجاء التاكد من الرابط المطلوب");
                return redirect("/account/account");
		    }
		   if(Auth::user()->account->id == $item->id ){
                Session::flash("msg", "e:لا يمكن لصاحب الحساب حذف نفسه");
                return redirect("/account/account");
            }
           if ( $item->id==1 ) {
                Session::flash("msg", "e:لا يمكن حذف أول حساب في النظام");
                return redirect("/account/account");
            }
           else {
                $item = Account::find($id);
                $aoldimg = $item->getAttribute('image');
            $mypath = public_path() . '/images/' . $item['id'] . '/';
            if (file_exists($mypath . $aoldimg) && $aoldimg != null) {
                unlink($mypath . $aoldimg);
            }
                
                
                
                $accounlin = DB::table('account_link')->whereIn('account_id', [$item->id])->pluck('id');
                if (count($accounlin) > 0)
                    DB::table('account_link')->whereIn('id', $accounlin)->delete();
                    $theuser = $item->user;
                    $item->delete();
				
				$theuser->delete();
                Session::flash("msg", "تم حذف حساب بنجاح");
                return redirect("/account/account");
            }

     }
    public function deletegroup(Request $request)
    {
        if($request->ids=='')
            Session::flash("msg","e:لم يتم تحديد أي عنصر");
        else
            Session::flash("msg","تمت عملية الحذف بنجاح");

        $items = preg_split('/,/',$request->ids);
		if (($key = array_search('1', $items)) !== false) {
             unset($items[$key]);
           }
        foreach(Account::find($items) as $item){
            $aoldimg = $item->getAttribute('image');
            $mypath = public_path() . '/images/' . $item['id'] . '/';
            if (file_exists($mypath . $aoldimg) && $aoldimg != null) {
                unlink($mypath . $aoldimg);
            }
            $accounlin = DB::table('account_link')->whereIn('account_id', [$item->id])->pluck('id');
            if (count($accounlin) > 0)
            DB::table('account_link')->whereIn('id', $accounlin)->delete();
            
            $theuser = $item->user;
            $theuser->delete();
            
        }
		;
        Account::destroy($items);
        return redirect("/account/account");
    }
   

    public function permission($id)
    {
        $item = Account::find($id);
        if ($item == NULL) {
            Session::flash("msg", "e:الرجاء التاكد من الرابط المطلوب");
            return redirect("/account/account");
        }
        return view("account.account.permission", compact("item"));
    }

    public function permissionPost(Request $request, $id)
    {
        $item = Account::find($id);
        if ($item == NULL) {
            Session::flash("msg", "e:الرجاء التاكد من الرابط المطلوب");
            return redirect("/account/account");
        }
        \DB::table("account_link")->where("account_id", $id)->delete();
        if ($request["permission"]) {
            foreach ($request["permission"] as $link)
                \DB::table("account_link")->insert(["account_id" => $id,
                    "link_id" => $link]);
        }
        Session::flash("msg", "i:تمت عملية الحفظ بنجاح");
        return redirect("/account/account");
    }
}
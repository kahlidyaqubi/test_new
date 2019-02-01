<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Company;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;

class CreateFirstAdmin extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */


    public function run()
    {


        /*************************/
        $user_id = DB::table('users')->insertGetId([
            'name' => 'admin11',
            'email' => 'khalid.yaqubi.94@gmail.com',
            'password' => bcrypt('aa'),
            
        ]);

        $account_id = DB::table('accounts')->insertGetId([
            'full_name' => 'admin',
            'mobile' => '+972 599 624984',
            'user_id' => $user_id,
        ]);
        $link_id = DB::table('links')->insertGetId([
            'title' => 'accounts',
            'icon' => 'icon-diamond',//https://fontawesome.com/v4.7.0/icons/
            'parent_id' => 0,
            'show' => 1,
            'url' => '',
        ]);
        $link2 = DB::table('links')->insertGetId([
            'title' => 'accounts control',
            'icon' => '',
            'parent_id' => $link_id,
            'show' => 1,
            'url' => '/account/account',
        ]);
        $link3 = DB::table('links')->insertGetId([
            'title' => 'add account',
            'icon' => '',
            'parent_id' => $link_id,
            'show' => 1,
            'url' => '/account/account/create',
        ]);
        
         $link4 = DB::table('links')->insertGetId([
            'title' => 'edit account',
            'icon' => '',
            'parent_id' => $link_id,
             'show' => 0,
            'url' => '/account/account/edit',
        ]);
        $link5 = DB::table('links')->insertGetId([
            'title' => 'delete account',
            'icon' => '',
            'parent_id' => $link_id,
             'show' => 0,
            'url' => '/account/account/delete',
        ]);
        $link6 = DB::table('links')->insertGetId([
            'title' => 'permission account',
            'icon' => '',
            'parent_id' => $link_id,
             'show' => 0,
            'url' => '/account/account/permission',
        ]);
        /*************************************************/
        DB::table('account_link')->insertGetId([
            'account_id' => $account_id,
            'link_id' => $link_id,
        ]);
        DB::table('account_link')->insertGetId([
            'account_id' => $account_id,
            'link_id' => $link2,
        ]);
        DB::table('account_link')->insertGetId([
            'account_id' => $account_id,
            'link_id' => $link3,
        ]);
        DB::table('account_link')->insertGetId([
            'account_id' => $account_id,
            'link_id' => $link4,
        ]);
        DB::table('account_link')->insertGetId([
            'account_id' => $account_id,
            'link_id' => $link5,
        ]);
        DB::table('account_link')->insertGetId([
            'account_id' => $account_id,
            'link_id' => $link6,
        ]);
        /************************************/
        $link_id = DB::table('links')->insertGetId([
            'title' => 'categories',
            'icon' => 'icon-diamond',//https://fontawesome.com/v4.7.0/icons/
            'parent_id' => 0,
            'show' => 1,
            'url' => '',
        ]);
        $link2 = DB::table('links')->insertGetId([
            'title' => 'category control',
            'icon' => '',
            'parent_id' => $link_id,
            'show' => 1,
            'url' => '/account/category',
        ]);
        $link3 = DB::table('links')->insertGetId([
            'title' => 'add category',
            'icon' => '',
            'parent_id' => $link_id,
            'show' => 1,
            'url' => '/account/category/create',
        ]);

        $link4 = DB::table('links')->insertGetId([
            'title' => 'edit category',
            'icon' => '',
            'parent_id' => $link_id,
            'show' => 0,
            'url' => '/account/category/edit',
        ]);
        $link5 = DB::table('links')->insertGetId([
            'title' => 'delete category',
            'icon' => '',
            'parent_id' => $link_id,
            'show' => 0,
            'url' => '/account/category/delete',
        ]);
        /********/
        $link_id = DB::table('links')->insertGetId([
            'title' => 'articles',
            'icon' => 'icon-diamond',//https://fontawesome.com/v4.7.0/icons/
            'parent_id' => 0,
            'show' => 1,
            'url' => '',
        ]);
        $link2 = DB::table('links')->insertGetId([
            'title' => 'article control',
            'icon' => '',
            'parent_id' => $link_id,
            'show' => 1,
            'url' => '/account/article',
        ]);
        $link3 = DB::table('links')->insertGetId([
            'title' => 'add article',
            'icon' => '',
            'parent_id' => $link_id,
            'show' => 1,
            'url' => '/account/article/create',
        ]);

        $link4 = DB::table('links')->insertGetId([
            'title' => 'edit article',
            'icon' => '',
            'parent_id' => $link_id,
            'show' => 0,
            'url' => '/account/article/edit',
        ]);
        $link5 = DB::table('links')->insertGetId([
            'title' => 'delete article',
            'icon' => '',
            'parent_id' => $link_id,
            'show' => 0,
            'url' => '/account/article/delete',
        ]);
        /********/
        $link_id = DB::table('links')->insertGetId([
            'title' => 'notifications',
            'icon' => 'icon-diamond',//https://fontawesome.com/v4.7.0/icons/
            'parent_id' => 0,
            'show' => 1,
            'url' => '',
        ]);
        $link2 = DB::table('links')->insertGetId([
            'title' => 'notifications control',
            'icon' => '',
            'parent_id' => $link_id,
            'show' => 1,
            'url' => '/account/notifications',
        ]);

}
    
}

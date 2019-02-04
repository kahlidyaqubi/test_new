<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Company;

class CreateAdminLinks extends Seeder
{

    /*
    You need to put SongsTableSeeder into file SongsTableSeeder.php in the same directory where you have your DatabaseSeeder.php file.

    And you need to run in your console:

    composer dump-autoload
    to generate new class map and then run:

    php artisan db:seed
    */

    public function run()
    {
        $link_id = DB::table('links')->insertGetId([
            'title' => 'test prem',
            'icon' => 'icon-diamond',//https://fontawesome.com/v4.7.0/icons/
            'parent_id' => 0,
            'show' => 1,
            'url' => '',
        ]);
        $link2 = DB::table('links')->insertGetId([
            'title' => 'test prem show',
            'icon' => '',
            'parent_id' => $link_id,
            'show' => 1,
            'url' => '/tests',
        ]);
        $link3 = DB::table('links')->insertGetId([
            'title' => 'test prem edit',
            'icon' => '',
            'parent_id' => $link_id,
            'show' => 1,
            'url' => '/tests/edit',
        ]);
        /********************/
        $link_id = DB::table('links')->insertGetId([
            'title' => 'test prem zz',
            'icon' => 'icon-diamond',//https://fontawesome.com/v4.7.0/icons/
            'parent_id' => 0,
            'show' => 1,
            'url' => '',
        ]);
        $link2 = DB::table('links')->insertGetId([
            'title' => 'test prem show zz',
            'icon' => '',
            'parent_id' => $link_id,
            'show' => 1,
            'url' => '/tests/zz',
        ]);
        $link3 = DB::table('links')->insertGetId([
            'title' => 'test prem edit zz',
            'icon' => '',
            'parent_id' => $link_id,
            'show' => 1,
            'url' => '/tests/zz/edit',
        ]);
        $link4 = DB::table('links')->insertGetId([
            'title' => 'test prem delete zz',
            'icon' => '',
            'parent_id' => $link_id,
            'show' => 1,
            'url' => '/tests/zz/delete',
        ]);
        $link5 = DB::table('links')->insertGetId([
            'title' => 'test prem edit zz',
            'icon' => '',
            'parent_id' => $link_id,
            'show' => 1,
            'url' => '/tests/zz/edits',
        ]);
        $link6 = DB::table('links')->insertGetId([
            'title' => 'test prem delete zz',
            'icon' => '',
            'parent_id' => $link_id,
            'show' => 1,
            'url' => '/tests/zz/deletes',
        ]);

    }
}

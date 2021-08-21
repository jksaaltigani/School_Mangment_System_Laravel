<?php

namespace Database\Seeders;

use App\Models\Articals;
use App\Models\Category;
use App\Models\Permissions;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'mohammed altigani osman',
            'email' => 'jksaaltigani@gmsail.comm',
            'password' => bcrypt(1234567890),
            'permission_id' => 1,
        ]);

        $category = ['السياسيه ', ' الرياضيه', ' الثقافيه'];
        for ($i = 0; $i < count($category); $i++) {
            Category::create([
                'name' => $category[$i],
                'active' => true,
            ]);
        }


        // Permissions::create([
        //     'name' => 'super admin',
        //     'permissions' => "'{\"user\" , '\permissions\'}' "
        // ]);
        DB::beginTransaction();

        for ($j = 1; $j < count($category); $j++) {


            for ($i = 0; $i < 4; $i++) {
                Articals::create([

                    "name" => "mohammed altigani osman",
                    "description" => "this is first books to upladed herer",
                    "slug" => "mohammed-altigani-osman",
                    "tags" => "ةخاشةةثي شمفهلشىه خسةشى",
                    "short_desc" => "اول مقال",
                    "content" => "ةخاشةةثي شمفهلشىه خسةشى ةخاشةةثي شمفهلشىه خسةشى ةخاشةةثي شمفهلشىه خسةشى ةخاشةةثي شمفهلشىه خسةشى ةخاشةةثي شمفهلشىه خسةشى",
                    "active" => 0,
                    "photo" => "3hPJvLXpinw35s3q1COu7boa8eVJxTVtuVVmDEyj.png",
                    "user_id" => 1,
                    "category_id" => $j,
                    "view" => 0,
                ]);
            }
            DB::commit();
        }
    }
}
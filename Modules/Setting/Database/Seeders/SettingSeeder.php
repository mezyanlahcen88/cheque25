<?php

namespace Modules\Setting\Database\Seeders;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;

class SettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('settings')->insert([
            'option_name' => 'system_name',
            'option_value' => 'TECHIMO',
        ]);
        DB::table('settings')->insert([
            'option_name' => 'title',
            'option_value' => 'App description',
        ]);
         DB::table('settings')->insert([
            'option_name' => 'address',
            'option_value' => 'Quartier el Wafaa II N° 5254 FRANCE',
        ]);

         DB::table('settings')->insert([
            'option_name' => 'phone',
            'option_value' => '+212 657 04 19 93',
        ]);

         DB::table('settings')->insert([
            'option_name' => 'email',
            'option_value' => 'TECHIMO@gmail.com',
        ]);
        DB::table('settings')->insert([
            'option_name' => 'picture',
            'option_value' => 'setting_picture.jpg',
        ]);
        DB::table('settings')->insert([
            'option_name' => 'favorites_icon',
            'option_value' => 'favorites_icon.jpg',
        ]);
        DB::table('settings')->insert([
            'option_name' => 'logo',
            'option_value' => 'logo.jpg',
        ]);
        DB::table('settings')->insert([
            'option_name' => 'favicon',
            'option_value' => 'favicon.jpg',
        ]);
        DB::table('settings')->insert([
            'option_name' => 'copyrigth',
            'option_value' => 'copyrigth',
        ]);
        DB::table('settings')->insert([
            'option_name' => 'facebook',
            'option_value' => 'facebook',
        ]);
        DB::table('settings')->insert([
            'option_name' => 'twitter',
            'option_value' => 'twitter',
        ]);
        DB::table('settings')->insert([
            'option_name' => 'youtube',
            'option_value' => 'youtube',
        ]);
        DB::table('settings')->insert([
            'option_name' => 'linkedin',
            'option_value' => 'linkedin',
        ]);
        DB::table('settings')->insert([
            'option_name' => 'instagram',
            'option_value' => 'instagram',
        ]);
        DB::table('settings')->insert([
            'option_name' => 'auth_description',
            'option_value' => '<h1 class="d-none d-lg-block text-white fs-2qx fw-bolder text-center mb-7">
                        Fast, Efficient and Productive
                    </h1>
                    <!--end::Title-->

                    <!--begin::Text-->
                    <div class="d-none d-lg-block text-white fs-base text-center">
                        In this kind of post, <a href="#" class="opacity-75-hover text-warning fw-bold me-1">the blogger</a>

                        introduces a person they’ve interviewed <br/> and provides some background information about

                        <a href="#" class="opacity-75-hover text-warning fw-bold me-1">the interviewee</a>
                        and their <br/> work following this is a transcript of the interview.
                    </div>',
        ]);

        DB::table('settings')->insert([
            'option_name' => 'auth_picture',
            'option_value' => 'auth_picture.jpg',
        ]);
        DB::table('settings')->insert([
            'option_name' => 'protocol',
            'option_value' => 'SMTP',
        ]);
        DB::table('settings')->insert([
            'option_name' => 'encryption',
            'option_value' => 'ssl',
        ]);
        DB::table('settings')->insert([
            'option_name' => 'host',
            'option_value' => 'smtp.gmail.com',
        ]);
        DB::table('settings')->insert([
            'option_name' => 'port',
            'option_value' => '465',
        ]);
        DB::table('settings')->insert([
            'option_name' => 'username',
            'option_value' => 'mezyan.lahcen17@gmail.com',
        ]);
        DB::table('settings')->insert([
            'option_name' => 'password',
            'option_value' => 'baoogsqwlfsaevep',
        ]);
        DB::table('settings')->insert([
            'option_name' => 'sender_default_name',
            'option_value' => 'sender default name',
        ]);
        DB::table('settings')->insert([
            'option_name' => 'sender_default_email',
            'option_value' => 'setting@gmail.com',
        ]);
    }
}

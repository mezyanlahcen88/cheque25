<?php

namespace Modules\Category\Database\Seeders;

use Illuminate\Database\Seeder;
use Modules\Category\App\Models\Category;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;


class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         Category::factory(1000)->create();
        // Get all countries, states, cities, payment terms, and payment methods
        //$countries = \App\Models\Country::get();
        //$states = \App\Models\State::get();
        // $cities = \App\Models\City::get();
        // $pts = \App\Models\PaymentTerm::get();
        // $pms = \App\Models\PaymentMethod::get();

        // Create 200 clients using the Client factory (example client belongs to )
        // $clients = \App\Models\Client::factory(200)->make()
        //     ->each(function ($client) use ($countries, $states, $cities, $pts, $pms) {
        //         // Assign random country, state, city, payment term, and payment method to each client
        //         $client->country_id = $countries->random()->id;
        //         $client->state_id = $states->random()->id;
        //         $client->city_id = $cities->random()->id;
        //         $client->payment_method_id = $pms->random()->id;
        //         $client->payment_term_id = $pts->random()->id;
        //         $client->save();
        //     })
        //     ->each(function ($client) {
        //         // For each client, create and associate a shipping address using ShippingAdresse factory
        //         //(example client has one )
        //        $client->ShippingAdresses()->save(ShippingAdresse::factory()->make());
        //     });

                // $options = ['Jantes aluminium', 'Airbags', 'Climatisation', 'Système de navigation/GPS', 'Toit ouvrant', 'Sièges cuir', 'Radar de recul', 'Caméra de recul', 'Vitres électriques', 'ABS', 'ESP', 'Régulateur de vitesse', 'Limiteur de vitesse', 'CD/MP3/Bluetooth', 'Ordinateur de bord', 'Verrouillage centralisé à distance'];
        // foreach ($options as $option) {
        //     Option::create(['name' => $option]);
        // }
       // $path = database_path('sql/options.sql');
        //$sql = File::get($path);
        //DB::unprepared($sql);
    }
}

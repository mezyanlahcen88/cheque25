<?php

namespace Modules\Numerotation\Database\Seeders;

use Illuminate\Database\Seeder;
use Modules\Numerotation\App\Models\Numerotation;


class NumerotationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         Numerotation::create([
            'id' => 'fb7a7118-7b76-4cad-ba47-af7536686300',
            'doc_type' => 'Founisseur',
            'prefix' => 'FR-',
            'increment_num' => 0,
            'comment' => '<p>Founisseur</p>',
            'isactive' => 1,
            'created_at' => '2023-12-27 18:59:44',
            'updated_at' => '2023-12-27 18:59:44',
            'deleted_at' => null,
         ]);

         Numerotation::create([
            'id' => 'b706edbc-e91e-4e71-adf0-225f8428e38a',
            'doc_type' => 'Client',
            'prefix' => 'CL-',
            'increment_num' => 0,
            'comment' => '<p>Client</p>',
            'isactive' => 1,
            'created_at' => '2023-12-27 18:59:44',
            'updated_at' => '2023-12-27 18:59:44',
            'deleted_at' => null,
         ]);
    }
}

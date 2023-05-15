<?php

namespace Database\Seeders;

use App\Models\Regra;
use Illuminate\Database\Seeder;

class RegraSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Regra::insert([
            [
                'nome' => 'leitor',
                'link' => 'leitor',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'nome' => 'escritor',
                'link' => 'escritor',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'nome' => 'editor',
                'link' => 'editor',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'nome' => 'admin',
                'link' => 'admin',
                'created_at' => now(),
                'updated_at' => now()
            ],

        ]);
    }
}

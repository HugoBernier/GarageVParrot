<?php

namespace Database\Seeders;

use App\Models\AvisClient;
use App\Models\FormulaireContact;
use App\Models\Vehicule;
use Database\Factories\VehiculeFactory;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeders.
     */
    public function run(): void
    {
        DB::table('users')->insert([
            'name' => 'admin',
            'email' => Str::random(10) . '@gmail.com',
            'is_admin' => true,
            'password' => Hash::make('password'),
        ]);

        DB::table('jour_ouverture')->insert([
            'jour' => 'Lundi',
            'horaire' => '8:45 - 12:00, 14:00 - 18:00'
        ]);
        DB::table('jour_ouverture')->insert([
            'jour' => 'Mardi',
            'horaire' => '8:45 - 12:00, 14:00 - 18:00'
        ]);
        DB::table('jour_ouverture')->insert([
            'jour' => 'Mercredi',
            'horaire' => '8:45 - 12:00, 14:00 - 18:00'
        ]);
        DB::table('jour_ouverture')->insert([
            'jour' => 'Jeudi',
            'horaire' => '8:45 - 12:00, 14:00 - 18:00'
        ]);
        DB::table('jour_ouverture')->insert([
            'jour' => 'Vendredi',
            'horaire' => '8:45 - 12:00, 14:00 - 18:00'
        ]);
        DB::table('jour_ouverture')->insert([
            'jour' => 'Samedi',
            'horaire' => '8:45 - 12:00'
        ]);
        DB::table('jour_ouverture')->insert([
            'jour' => 'Dimanche',
            'horaire' => 'Fermé'
        ]);

        Vehicule::factory(500)->create();
        AvisClient::factory(150)->create();
        FormulaireContact::factory(20)->create();
    }
}

<?php

namespace Database\Seeders;

use App\Models\Admin;
use Ramsey\Uuid\Uuid;
use App\Models\Customer;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class Customers extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create('id_ID');
        $id = Uuid::uuid4()->getHex();

        Customer::create([

            'id' => $id,

            'nama' => "Admin",
            'email' => 'admin@sipakehutanan.id',
            'alamat' => "Yogyakarta",
            'noTelepon' => 0274512102,

            'username' => Str::random(10),
            'password' => bcrypt('Admin'),
        ]);

    }
}

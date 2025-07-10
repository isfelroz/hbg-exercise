<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Base;

class BaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $names = ['Alpha', 'Bravo', 'Charlie', 'Delta', 'Echo'];

        foreach ($names as $name) {
            Base::create([
                'name' => $name,
            ]);
        }
    }
}

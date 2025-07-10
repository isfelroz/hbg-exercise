<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Base;
use App\Models\Pilot;

class PilotSeeder extends Seeder
{
    public function run(): void
    {
        $bases = Base::all();

        if ($bases->isEmpty()) {
            $this->command->warn("not bases found");
            return;
        }

        foreach (range(1, 100) as $i) {
            Pilot::create([
                'name' => "Pilot $i",
                'base_id' => $bases->random()->id,
            ]);
        }
    }
}

<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class InstrumentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $instruments = [
            ['name' => 'Piano', 'description' => 'A large keyboard musical instrument with a wooden case.'],
            ['name' => 'Guitar', 'description' => 'A stringed musical instrument with a fretted fingerboard.'],
            ['name' => 'Violin', 'description' => 'A string instrument which has four strings and is played with a bow.'],
            ['name' => 'Drums', 'description' => 'A percussion instrument sounded by being struck with sticks or the hands.'],
            ['name' => 'Saxophone', 'description' => 'A member of a family of metal wind instruments with a single-reed mouthpiece.'],
        ];

        foreach ($instruments as $instrument) {
            \App\Models\Instrument::create($instrument);
        }
    }
}

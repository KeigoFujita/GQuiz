<?php

use App\Strand;
use Illuminate\Database\Seeder;

class StrandSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Strand::create([
            'strand_name' => 'BSCS',
            'strand_description' => 'Bachelor of Science in Computer Science'
        ]);

        Strand::create([
            'strand_name' => 'BSIT',
            'strand_description' => 'Bachelor of Science in Information Technology'
        ]);

        Strand::create([
            'strand_name' => 'BSIS',
            'strand_description' => 'Bachelor of Science in Information System'
        ]);

        Strand::create([
            'strand_name' => 'BSBA',
            'strand_description' => 'Bachelor of Science in Business Administration'
        ]);

        Strand::create([
            'strand_name' => 'BSCE',
            'strand_description' => 'Bachelor of Science in Computer Engineering'
        ]);

        Strand::create([
            'strand_name' => 'BSE',
            'strand_description' => 'Bachelor of Science in Entrepreneurship'
        ]);

    }
}
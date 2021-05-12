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
            'strand_name' => 'STEM',
            'strand_description' => 'Science Technology Engineering Mathematics'
        ]);

        Strand::create([
            'strand_name' => 'HUMSS',
            'strand_description' => 'Humanities and Social Sciences'
        ]);

        Strand::create([
            'strand_name' => 'ABM',
            'strand_description' => 'Accountancy and Business Management'
        ]);

        Strand::create([
            'strand_name' => 'GAS',
            'strand_description' => 'General Academic Strand'
        ]);

        Strand::create([
            'strand_name' => 'ICT - Programming',
            'strand_description' => 'Information and Computer Technology- Programming'
        ]);

        Strand::create([
            'strand_name' => 'ICT - Animation',
            'strand_description' => 'Information and Computer Technology - Animation'
        ]);
    }
}
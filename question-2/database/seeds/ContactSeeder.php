<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class ContactSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // seed the table for testing
        for ($i = 0; $i < 48; $i++) {
            DB::table('contacts')->insert([
                'first_name' => ucfirst($this->rand_character(10)), // random 10 characters and set 1st character to upper case
                'last_name' => ucfirst($this->rand_character(10)), // random 10 characters and set 1st character to upper case
                'email' => $this->rand_character(10).'@gmail.com', // random 10 characters
                'telephone' => '077'.rand(10000000, 99999999), // random 8 integer
            ]);
        }
    }

    private function rand_character($length) {
        $seed = str_split('abcdefghijklmnopqrstuvwxyz'); // prefered characters

        $generated_characters = '';
        foreach (array_rand($seed, $length) as $k) $generated_characters .= $seed[$k];

        return $generated_characters;
    }
}

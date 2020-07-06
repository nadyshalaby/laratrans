<?php

use App\_Person;
use App\Person;
use Illuminate\Database\Seeder;

class PersonSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Person::truncate();
        _Person::truncate();
        factory(Person::class, 30)->create();
    }
}

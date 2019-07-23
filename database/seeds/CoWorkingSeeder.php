<?php

use Illuminate\Database\Seeder;

class CoWorkingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Models\CoWorking::class, 10)->create();
    }
}

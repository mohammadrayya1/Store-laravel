<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use Illuminate\Support\Collection;
use  Illuminate\Support\Facades\DB;

class CatigoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('categories')->where('id','1')->update(
            [
                'name'=>'Catigory 2',
                'slug'=>Str::slug('Catigory 2'),

            ]);
    }
}

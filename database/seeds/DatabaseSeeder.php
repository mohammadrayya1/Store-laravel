<?php
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use App\Models\User;
class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       // factory(\App\Models\Tag::class, 10)->create();
       factory(User::class, 10)->create();
        factory(\App\Models\Product::class, 10)->create();
    }
}

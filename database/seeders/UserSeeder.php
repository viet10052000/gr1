<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = DB::table('users')->where('email', '=', 'viet@gmail.com');
        if ($user)
        {
            $user->delete();
        }

        User::create([
            'name' => 'admin',
            'email' =>'viet@gmail.com',
            'image' =>'favicon.png',
            'password' => bcrypt('123123123')
        ]);
    }
}

<?php

use Illuminate\Database\Seeder;
use App\User;
use Illuminate\Support\Facades\Hash;
class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = User::where('email','user@email.com')->first();
        if(is_null($user)){
            $user = new User();
            $user->name = "MD Shuvo";
            $user->email = "user@email.com";
            $user->password = Hash::make('11111111');
            $user->save();
        }
    }
}

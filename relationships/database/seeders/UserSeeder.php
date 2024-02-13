<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'id' => 1,
            'name'=> 'examplse',
            'email' =>'exampl@exhamp.com'  ,    
            'password'=> Hash::make('1231256')
        ]);
        User::create([
            'id' => 2,
            'name'=> 'seconn',
            'email' =>'exampl22@exsdeegundo.com'  ,    
            'password'=> Hash::make('123236')
        ]);
        User::create([
            'id' => 3,
            'name'=> 'etercerr',
            'email' =>'tercer3@exhamp.com'  ,    
            'password'=> Hash::make('1321323456')
        ]);
        
    }
}

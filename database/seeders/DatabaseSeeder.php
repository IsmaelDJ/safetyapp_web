<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Category;
use App\Models\Contractor;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        User::create(
            [
                'role'     => 'superadmin',
                'name'     => 'ismatech',
                'email'    => 'contact@ismatech.co',
                'password' => Hash::make('la magie'),
                'avatar'   => '/images/1664845880.png',
            ]
        );

        User::create(
            [
                'role'     => 'particular',
                'name'     => 'particular',
                'email'    => 'particular@excp.co',
                'password' => Hash::make('JsIwBAsNQTqS7AF'),
                'avatar'   => '/images/1664845880.png',
            ]
        );
    }
}

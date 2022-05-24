<?php

namespace Database\Seeders;

use App\Models\Company;
use App\Models\ContactList;
use App\Models\Department;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Sequence;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $admin = User::query()->create([
            'name' => 'root',
            'email' => 'root@email.com',
            'password' => 'root',
            'department_id' => 1
        ]);

        $departments = Department::factory()
            ->count(2)
            ->state(new Sequence(
                ['name' => 'sales'],
                ['name' => 'customer service']
            ))->create();

        $staffs = User::factory()->count(4)->create();

        $compaines = Company::factory()->count(5)->create();

        $contactlist = ContactList::factory()->count(10)->create();
    }
}

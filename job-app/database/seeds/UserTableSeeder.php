<?php

use App\Permission;
use App\Role;
use App\User;
use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $company_role           = Role::where('slug','company')->first();
        $applicant_role         = Role::where('slug', 'applicant')->first();
        $company_perm           = Permission::where('slug','create-job')->first();
        $applicant_perm         = Permission::where('slug','apply-job')->first();
        $company                = new User();
        $company->name          = 'Company1';
        $company->email         = 'company1@test.com';
        $company->password      = bcrypt('secret');
        $company->save();
        $company->roles()->attach($company_role);
        $company->permissions()->attach($company_perm);
        $applicant              = new User();
        $applicant->name        = 'Applicant 1';
        $applicant->email       = 'applicant1@test.com';
        $applicant->password    = bcrypt('secret');
        $applicant->save();
        $applicant->roles()->attach($applicant_role);
        $applicant->permissions()->attach($applicant_perm);
    }
}

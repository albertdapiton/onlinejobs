<?php

use App\Permission;
use App\Role;
use Illuminate\Database\Seeder;

class PermissionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $company_role           = Role::where('slug','company')->first();
        $applicant_role         = Role::where('slug', 'manager')->first();
        $createJob              = new Permission();
        $createJob->slug        = 'create-job';
        $createJob->name        = 'Create Jobs';
        $createJob->save();
        $createJob->roles()->attach($company_role);
        $applyJob               = new Permission();
        $applyJob->slug         = 'apply-job';
        $applyJob->name         = 'Apply Job';
        $applyJob->save();
        $applyJob->roles()->attach($applicant_role);
    }
}

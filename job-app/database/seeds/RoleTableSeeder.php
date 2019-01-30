<?php

use App\Permission;
use App\Role;
use Illuminate\Database\Seeder;

class RoleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $company_permission     = Permission::where('slug','create-job')->first();
        $applicant_permission   = Permission::where('slug', 'apply-job')->first();
        $company_role           = new Role();
        $company_role->slug     = 'company';
        $company_role->name     = 'Company';
        $company_role->save();
        $company_role->permissions()->attach($company_permission);
        $applicant_role         = new Role();
        $applicant_role->slug   = 'applicant';
        $applicant_role->name   = 'Applicant';
        $applicant_role->save();
        $applicant_role->permissions()->attach($applicant_permission);
    }
}

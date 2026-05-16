<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class PermissionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $permissions = [
            //admin
            'show-admins'=>'showAdmins',
            'create-admin'=>'createAdmin',
            'show-profile'=>'adminProfile',
            'update-profile'=>'updateProfile',
            'edit-profile'=>'editProfile',
            'delete-admin'=>'deleteAdmin',
            //category
             'show-categories'=>'showCategory',
            'create-category'=>'storeCategory',
            'update-category'=>'updateCategory',
            'delete-category'=>'deleteCategory',
            //city
            'show-cities'=>'showCity',
            'create-city'=>'storeCity',
            'update-city'=>'updateCity',
            'delete-city'=>'deleteCity',
            //region
            'show-regions'=>'showRegion',
            'create-region'=>'storeRegion',
            'update-region'=>'updateRegion',
            'delete-region'=>'deleteRegion',
            //setting
            'show-setting'=>'showSetting',
            'create-setting'=>'storeSetting',
            'update-setting'=>'updateSetting',
            'delete-setting'=>'deleteSetting',
            //payment
            'show-payment'=>'showPayment',
            'create-payment'=>'storePayment',
            'update-payment'=>'updatePayment',
            'delete-payment'=>'deletePayment',
            //role
            'role-list'=>'roles.index',
            'role-create'=>'roles.create',
            'role-edit'=>'roles.edit',
            'role-delete'=>'roles.destroy',
        ];
        foreach($permissions as $permission=>$route){
            Permission::create([
                'name' => $permission,
                'routes'=>$route,
            ]);

        }
        }
}

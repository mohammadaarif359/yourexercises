<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\Role;
use App\Models\User;

class CreateDefaultRole extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // default role
        $defaultrole = array('super-admin','doctor','patient');
        foreach($defaultrole as $roleData) {
          if(!Role::where('name',$roleData)->exists()) {
            $role = new Role();
            $role->name = $roleData;
            $role->display_name = ucwords(str_replace("-"," ",$roleData));
            $role->save();
          }
		    } 
        // create deafult superadmin user and attach role
        $user = new User;
        $user->name     = 'superadmin user';
        $user->email    = 'superadmin@yourexercises.com';
        $user->mobile   = 9999999999;
        $user->password = bcrypt('Ali@12345');
        $user->status   = 1;
        $user->save();
			  
        // attach role
			  $user->attachRole(1);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
       
    }
}

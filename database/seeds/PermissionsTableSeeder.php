<?php

use Illuminate\Database\Seeder;

class PermissionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('permissions')->insert([
          'name' => 'VIEW_ORDERS',
          'created_at' => date('Y-m-d H:i:s', time())
        ]);
        
        DB::table('permissions')->insert([
          'name' => 'UPDATE_ORDERS',
          'created_at' => date('Y-m-d H:i:s', time())
        ]);
        
        DB::table('permissions')->insert([
          'name' => 'DELETE_ORDERS',
          'created_at' => date('Y-m-d H:i:s', time())
        ]);       
       
    }
}

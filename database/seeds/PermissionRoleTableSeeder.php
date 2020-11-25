<?php

use Illuminate\Database\Seeder;

class PermissionRoleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('permission_role')->insert([
            'role_id' => 1,
            'permission_id' => 25,
            'created_at' => date('Y-m-d H:i:s', time())
        ]);

        DB::table('permission_role')->insert([
            'role_id' => 1,
            'permission_id' => 26,
            'created_at' => date('Y-m-d H:i:s', time())
        ]);

        DB::table('permission_role')->insert([
            'role_id' => 1,
            'permission_id' => 27,
            'created_at' => date('Y-m-d H:i:s', time())
        ]);

        DB::table('permission_role')->insert([
            'role_id' => 5,
            'permission_id' => 25,
            'created_at' => date('Y-m-d H:i:s', time())
        ]);

        DB::table('permission_role')->insert([
            'role_id' => 5,
            'permission_id' => 26,
            'created_at' => date('Y-m-d H:i:s', time())
        ]);

        DB::table('permission_role')->insert([
            'role_id' => 5,
            'permission_id' => 27,
            'created_at' => date('Y-m-d H:i:s', time())
        ]);
    }
}

<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $datas = [
            ['name' => 'can not login'],
            ['name' => 'can not book event'],
            ['name' => 'can not add event'],
            ['name' => 'add events'],
            ['name' => 'edit events'],
            ['name' => 'delete events'],
            // ['name' => ''],
        ];

        foreach($datas as $data){
            Permission::create($data);
        }

    }
}

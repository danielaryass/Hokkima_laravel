<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
// use model detail user
use App\Models\ManagementAccess\DetailUser;

class DetailUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $detail_user = [
            'user_id' => 1,
            'type_user_id' => 1,
            'contact' => null,
            'address' => null,
            'photo' => null,
            'gender' => null,
            'age' => '19',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ];
        DetailUser::insert($detail_user);
    }
}

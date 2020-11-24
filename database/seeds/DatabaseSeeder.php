<?php

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
        // $this->call(UserSeeder::class);
        DB::table('users')->insert([
        	'name'		=>	'HR',
        	'email'		=> 	'1@gmail.com',
        	'password'	=>	Hash::make('1')
        ]);
//        for ($i = 0; $i < 100;$i++){
//            $arr = ['on','off'];
//            DB::table('jobs')->insert([
//                'talenpools_id' => rand(1,3),
//                'name'          => Str::random(5),
//                'descrip'       => Str::random(10),
//                'target'        => rand(1,100),
//                'start_end'     => '10/16/2020 0:00 - 10/16/2020 23:59',
//                'status'        =>  $arr[rand(0,1)],
//            ]);
//        }
//        for ($i = 0; $i < 50000;$i++){
//            $arr = ['Pass','Fail','Invite',"Offer","Blacklist",'default'];
//            DB::table('cvs')->insert([
//                'birthday' => '2020-10-01',
//                'name'          => Str::random(10),
//                'email'       => Str::random(10).'@gmail.com',
//                'phone'        => "1234567",
//                'exp'     => '0',
//                'description'        =>  "0000",
//                'salary'        =>  "0,10",
//                'source'        => "ứng viên",
//                'job'           =>  DB::table('jobs')->find(rand(4,106))->name,
//                'cv'            => 'uploads/cv/1602856442-CV-Nguyen-Cong-Cuong.pdf',
//                'status'        => $arr[rand(0,5)],
//            ]);
//        }
    }
}

<?php

use Illuminate\Database\Seeder;

class RemindersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	//日期随机
    	$dType = ['days', 'weeks'];
        for($i=0; $i<100;$i++){
        	DB::table('reminders')->insert([
	            'content' => str_random(10),
	            'enddate' => date('Y-m-d H:i:s', strtotime(rand(2, 10).$dType[rand(0, 1)])),
	            'loopLevel' => rand(0, 7),
	            'personsend' => '褚魁',
	            'personemail' => str_random(10).'@gmail.com',
	        ]);
        }
    }
}

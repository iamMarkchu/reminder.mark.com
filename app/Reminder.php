<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Reminder extends Model
{
    public function getLooplevelAttribute($value)
    {
    	$loopMapping = [
    			'0' => '永不',
    			'1' => '每天',
    			'2' => '每周',
    			'3' => '每月',
    			'4' => '每年',
    	];

        return $loopMapping[$value];
    }
}

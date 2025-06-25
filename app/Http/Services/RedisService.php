<?php

namespace App\Http\Services;
use Illuminate\Support\Facades\Redis;

class RedisService
{
    public function StorePosition($position){
        Redis::hset('position', 'data', json_encode($position));
    }

    public function GetPosition(){
        $position = Redis::hgetall('position');
        return json_decode($position['data'], true);
    }

    public function clearTasks()
    {
        Redis::del('position');
    }

    public function replacePosition($position){
        Redis::del('position');
        Redis::hset('position', 'data', json_encode($position));
    }
}
<?php
namespace App\Http\Services;
use Illuminate\Support\Facades\Redis;
use Symfony\Component\HttpFoundation\Response;

class RedisService
{
    public function StorePosition($position){
        Redis::hset('position', json_encode($position));
    }

    public function GetPosition(){
        $position = Redis::hgetall('position');
        return $position;
    }

     public function clearTasks()
    {
        Redis::del('position');
    }
}
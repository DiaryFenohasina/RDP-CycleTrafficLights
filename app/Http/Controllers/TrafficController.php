<?php

namespace App\Http\Controllers;

use App\Http\Services\RedisService;
use App\Http\Services\TrafficService;
use Illuminate\Http\Request;

class TrafficController extends Controller
{
    private $trafficService;
    private $redisService;

    private $NS;
    private $OE;

    public function __construct(TrafficService $trafficService, RedisService $redisService) {
        $this->trafficService = $trafficService;
        $this->redisService = $redisService;
    }

    public function getPosition(Request $request){
        $ns = $request->ns;
        $oe = $request->oe;

        $position = [];

        if($ns){
            $this->OE = $this->trafficService->detectPosition($ns);
            $position = [
                "NS_$ns",
                "OE_$this->OE"
            ];
        }
        if($oe){
            $this->NS = $this->trafficService->detectPosition($oe);
            $position  = [
                "NS_$this->NS",
                "OE_$oe"
            ];
        }

        $this->redisService->StorePosition($position);
        return response()->json('succes');
    }
}

<?php
namespace App\Http\Services;

class TrafficService
{
    private $trafficData = [
        'Green',
        'Orange-Red',
        'Red',
        'Orange-Green',
    ];

    public function detectPosition ($NsOrOe): string{
        switch ($NsOrOe) {
            case 'Green':
                return 'Red';
            case 'Orange-Red':
                return 'Orange-Green';
            case 'Red':
                return 'Green';
            case 'Orange-Green':
                return 'Orange-Red';
            default:
                return 'Red';
        }
    }

    public function GetNextTraffic($position){
        for ($i=0; $i < $length = count($this->trafficData); $i++) { 
            if($i === ($length - 1)) $i = 0;
            if($this->trafficData[$i] === $position) return $this->trafficData[($i+1)] ? ($i + 1) < $length : $this->trafficData[($i + 1 - $length)] ;
        }
    }
}
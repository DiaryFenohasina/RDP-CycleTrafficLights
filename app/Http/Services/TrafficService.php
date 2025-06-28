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

    public function GetNextTraffic($position)
    {
        $length = count($this->trafficData);

        for ($i = 0; $i < $length; $i++) {
            if ($this->trafficData[$i] === $position) {
                $nextIndex = ($i + 1) % $length;
                return $this->trafficData[$nextIndex];
            }
        }
        return null;
    }
}
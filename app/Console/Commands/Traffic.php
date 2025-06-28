<?php

namespace App\Console\Commands;

use App\Http\Controllers\TrafficController;
use App\Http\Services\RedisService;
use App\Http\Services\TrafficService;
use Illuminate\Console\Command;

class Traffic extends Command
{
    private $trafficService;
    private $redisService;
    private $TrafficController;
    private $next_NS;
    private $next_OE;
    public function __construct(RedisService $redisService, TrafficService $trafficService,TrafficController $trafficController) {
        parent::__construct();
        $this->redisService = $redisService;
        $this->trafficService = $trafficService;
        $this->TrafficController = $trafficController;
    }
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:traffic';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Cycle the traffic lights between NS and EO directions';
    
    /**
     * Execute the console command.
     */
    public function handle()
    {
        $position = $this->redisService->getPosition();

        foreach ($position as $color) {
            $this->info($color);
            [$prefix, $label] = explode('_', $color, 2);
            if($prefix == 'NS') $this->next_NS = $this->trafficService->GetNextTraffic($label); 
            if($prefix == 'OE') $this->next_OE = $this->trafficService->GetNextTraffic($label); 
        }

        $positions = [
            "NS_$this->next_NS",
            "OE_$this->next_OE"
        ];

        $this->redisService->replacePosition($positions);
    }
}

<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Artisan;

class SyncLocations extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'sync:locations';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Fetch Location from IP Address of visitors.';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $this->info('Fetching Location from IP Address of visitors.');
        $visitors = \App\Models\Visitor::whereNull('countryName')->get();
        foreach ($visitors as $visitor){
            $this->info('Fetching Location for IP: ' . $visitor->ip_address);
            Artisan::call('get:location', ['id' => $visitor->id]);
            $this->info('Location saved');
            $this->line('---------------------------------');
        }
    }
}

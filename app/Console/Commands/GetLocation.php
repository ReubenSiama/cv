<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Stevebauman\Location\Facades\Location;

class GetLocation extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'get:location {id}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Get Location of visitor using IP Address.';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $visitor = \App\Models\Visitor::find($this->argument('id'));
        $location = Location::get($visitor->ip_address);
        if (!$location) {
            $this->error('Location not found for IP: ' . $visitor->ip_address);
            return;
        }
        $visitor->update([
            'countryName' => $location->countryName,
            'currencyCode' => $location->currencyCode,
            'countryCode' => $location->countryCode,
            'regionCode' => $location->regionCode,
            'regionName' => $location->regionName,
            'cityName' => $location->cityName,
            'zipCode' => $location->zipCode,
            'isoCode' => $location->isoCode,
            'postalCode' => $location->postalCode,
            'latitude' => $location->latitude,
            'longitude' => $location->longitude,
            'metroCode' => $location->metroCode,
            'areaCode' => $location->areaCode,
            'timezone' => $location->timezone,
        ]);
    }
}

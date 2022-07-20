<?php


namespace App\Modules\Address\Model;


use Dadata\CleanClient;
use Location\Coordinate;
use Location\Distance\Vincenty;

class Address
{
    const token = "fa6ac428e2d4149a7b3937636f5e5a9540f37378";
    const secret = "ceeef2f680ee3511bfacfef1e085f945dc8b87cc";

    private $name;
    private $geo_lat;
    private $geo_lon;

    public function __construct($address)
    {
        $dadata = new CleanClient(self::token,self::secret);
        $response = $dadata->clean("address", $address['address']);

        $this->name = $response['result'];
        $this->geo_lat = $response['geo_lat'];
        $this->geo_lon = $response['geo_lon'];
    }

    public function getDistance(){
        $coordinate1 = new Coordinate(55.6627982, 37.4856038);
        $coordinate2 = new Coordinate($this->geo_lat, $this->geo_lon);

        $calculator = new Vincenty();

        return $calculator->getDistance($coordinate1, $coordinate2); // returns 128130.850 (meters; ≈128 kilometers)
    }
}
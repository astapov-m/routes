<?php


namespace App\Controllers;
use App\Modules\Address\Model\Address;
use Dadata\CleanClient;

class MainController
{
    public function index($request){
        $address = new Address($request);
        echo json_encode($address->getDistance());
    }
}
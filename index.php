<?php


use App\Airplane;
use App\Car;
use App\Ship;
use App\VehicleDelivery;

require_once './vendor/autoload.php';

function vehicleDelivery(VehicleDelivery $vehicleDelivery)
{
    return $vehicleDelivery->init(3500);
}

$carTicketPrice = vehicleDelivery(new Car('Ford Focus', 34, 7.6, 4));

$airplaneTicketPrice = vehicleDelivery(new Airplane('EL-AL3289', 390));

$shipTicketPrice = vehicleDelivery( new Ship( 'Gold Greece', 3200 ) );

echo "In car ticket price is $carTicketPrice\n";
echo "In airplane ticket price is $airplaneTicketPrice\n";
echo "In ship ticket price is $shipTicketPrice\n";
<?php

namespace App;

class Car extends VehicleDelivery
{

    private $name, $fuelBank, $fuelExpend, $passengers;
    private int $avgSpeed = 90;
    private float $fuelCoast = 5.25;
    private const FUELSTOPTIME = 0.25;

    /**
     * Car constructor.
     * @param $name
     * @param $fuelBank
     * @param $fuelExpend
     * @param $passengers
     */
    public function __construct($name, $fuelBank, $fuelExpend, $passengers)
    {
        $this->name = $name;
        $this->fuelBank = $fuelBank;
        $this->fuelExpend = $fuelExpend;
        $this->passengers = $passengers;
    }

    /**
     * @return mixed
     */
    public function getPassengers()
    {
        return $this->passengers;
    }

    /**
     * @param mixed $passengers
     */
    public function setPassengers($passengers): void
    {
        $this->passengers = $passengers;
    }



    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param mixed $name
     */
    public function setName($name): void
    {
        $this->name = $name;
    }

    /**
     * @return mixed
     */
    public function getFuelBank()
    {
        return $this->fuelBank;
    }

    /**
     * @param mixed $fuelBank
     */
    public function setFuelBank($fuelBank): void
    {
        $this->fuelBank = $fuelBank;
    }

    /**
     * @return mixed
     */
    public function getFuelExpend()
    {
        return $this->fuelExpend;
    }

    /**
     * @param mixed $fuelExpend
     */
    public function setFuelExpend($fuelExpend): void
    {
        $this->fuelExpend = $fuelExpend;
    }

    /**
     * @return int
     */
    public function getAvgSpeed(): int
    {
        return $this->avgSpeed;
    }

    /**
     * @param int $avgSpeed
     */
    public function setAvgSpeed(int $avgSpeed): void
    {
        $this->avgSpeed = $avgSpeed;
    }

    /**
     * @return float
     */
    public function getFuelCoast(): float
    {
        return $this->fuelCoast;
    }

    /**
     * @param float $fuelCoast
     */
    public function setFuelCoast(float $fuelCoast): void
    {
        $this->fuelCoast = $fuelCoast;
    }

    public function traveling($distance)
    {
        // How much fuel needs to travel to full distance
        $fuelNeeds = $distance / $this->fuelExpend;
        // How much stops needs for all refueling operations
        $refuelStops = $fuelNeeds / $this->fuelBank;
        // The full price of needs fuel
        $fullPriceFuel = round($fuelNeeds * $this->fuelCoast, 2);
        // How long will be traveling
        $travelTime = round($distance / $this->avgSpeed + $refuelStops * self::FUELSTOPTIME);

        $ticketPrice = round($fullPriceFuel / $this->passengers, 2);
//        echo "A distance of $distance km by $this->name will take you about $travelTime hours. Bring $ticketPrice shekels for gas for each passenger ;-)\n";

        return $ticketPrice;
    }
}
<?php


namespace App;


class Airplane extends VehicleDelivery
{

    private $flightNumber, $passengers;
    private float $fuelCost = 1.8;
    private const FUELEXPAND = 2600; // In one hour of fly
    private int $dinnerCost = 43;
    private int $breakfastCost = 26;
    private int $avgSpeed = 870;

    /**
     * @return int
     */
    public function getAvgspeed(): int
    {
        return $this->avgSpeed;
    }

    /**
     * @param int $avgSpeed
     */
    public function setAvgspeed(int $avgSpeed): void
    {
        $this->avgSpeed = $avgSpeed;
    } // km/h

    /**
     * Airplane constructor.
     * @param $flightNumber
     * @param $passengers
     */
    public function __construct($flightNumber, $passengers)
    {
        $this->flightNumber = $flightNumber;
        $this->passengers = $passengers;
    }

    /**
     * @return mixed
     */
    public function getFlightNumber()
    {
        return $this->flightNumber;
    }

    /**
     * @param mixed $flightNumber
     */
    public function setFlightNumber($flightNumber): void
    {
        $this->flightNumber = $flightNumber;
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
     * @return float
     */
    public function getFuelCost(): float
    {
        return $this->fuelCost;
    }

    /**
     * @param float $fuelCost
     */
    public function setFuelCost(float $fuelCost): void
    {
        $this->fuelCost = $fuelCost;
    }

    /**
     * @return int
     */
    public function getBreakfastCost(): int
    {
        return $this->breakfastCost;
    }

    /**
     * @param int $breakfastCost
     */
    public function setBreakfastCost(int $breakfastCost): void
    {
        $this->breakfastCost = $breakfastCost;
    }

    /**
     * @return int
     */
    public function getDinnerCost(): int
    {
        return $this->dinnerCost;
    }

    /**
     * @param int $dinnerCost
     */
    public function setDinnerCost(int $dinnerCost): void
    {
        $this->dinnerCost = $dinnerCost;
    }

    public function traveling($distance)
    {
        // How long will be fly
        $timeFly = round($distance / $this->avgSpeed, 2);
        // Cost of eating for one passenger from flying time: less 5 hours - only breakfast else breakfast and dinner
        $eatCost = $timeFly < 5 ? $this->breakfastCost : $this->breakfastCost + $this->dinnerCost;
        $eatText = $timeFly < 5 ? '' : ' and lunch';
        // How much fuel needs to fly
        $fuelNeeds = self::FUELEXPAND * $timeFly;
        // The full price of needs fuel
        $fullPriceFuel = round($fuelNeeds * $this->fuelCost);
        // The prime cost of fly for ne passenger
        $primeCost = round($fullPriceFuel / $this->passengers, 2);
        // The full price of ticket for one passenger
        $ticketPrice = $primeCost + $eatCost;
//        echo "You can fly a distance of $distance km on the Airplane #$this->flightNumber in about $timeFly hours. The price of the ticket (with breakfast$eatText) for one passenger will be $ticketPrice.  ;-)\n";

        return $ticketPrice;

    }
}
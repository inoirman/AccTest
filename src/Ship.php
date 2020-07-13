<?php


namespace App;


class Ship extends VehicleDelivery
{
    private $name, $passengers;
    private int $avgSpeed = 40; // km in hour
    private const FUELEXPAND = 40000; // kg in one day of move
    private int $fuelCost = 405; // shekels for 1000 kg
    private int $dinnerCost = 43;
    private int $breakfastCost = 26;

    /**
     * Ship constructor.
     * @param $name
     * @param $passengers
     */
    public function __construct($name, $passengers)
    {
        $this->name = $name;
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
        // How much days will be cruise
        $days = round($distance / $this->avgSpeed / 24, 0, PHP_ROUND_HALF_UP);
        // How much fuel needs to cruise
        $fuelNeeds = self::FUELEXPAND * $days;
        // The full price of needs fuel
        $fullPriceFuel = round($fuelNeeds * $this->fuelCost / 1000);
        // The prime cost of fly for ne passenger
        $primeCost = round($fullPriceFuel / $this->passengers, 2);
        // The full price of ticket for one passenger
        $ticketPrice = $primeCost + ($this->breakfastCost + $this->dinnerCost) * $days;
//        echo "The ticket to cruise $this->name ($days days, breakfast and dinners each day including) will be $ticketPrice \n";

        return $ticketPrice;
    }
}
<?php

namespace App;

abstract class VehicleDelivery
{

    abstract public function traveling($distance);

    public function init($distance)
    {
        return $this->traveling($distance);
    }
}
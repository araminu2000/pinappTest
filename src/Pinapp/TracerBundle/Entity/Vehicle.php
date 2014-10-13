<?php


namespace Cegeka\FlandersDriveBundle\Entity;

use Doctrine\ORM\Mapping as ORM;


/**
 * Holds information on the vehicle entity.
 * @package Cegeka\FlanderDriveBundle\Entity
 * @ORM\Entity
 * @ORM\Table(name="vehicle")
 */
class Component extends EntityBase
{
    /**
     * @ORM\Column(type="string", length=50)
     */
    protected $vin;

    /**
     * @ORM\Column(type="string", length=50)
     */
    protected $plateNumber;

    /**
     * @param mixed $plateNumber
     * @return Vehicle
     */
    public function setPlateNumber($plateNumber)
    {
        $this->plateNumber = $plateNumber;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getPlateNumber()
    {
        return $this->plateNumber;
    }

    /**
     * @param mixed $vin
     * @return Vehicle
     */
    public function setVin($vin)
    {
        $this->vin = $vin;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getVin()
    {
        return $this->vin;
    }
} 
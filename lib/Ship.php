<?php

class Ship
{
    /**
     * @var string
     */
    private $name;

    /**
     * @var int
     */
    private $weaponPower = 0;

    /**
     * @var int
     */
    private $jediFactor = 0;

    /**
     * @var int
     */
    private $strength = 0;

    /**
     * @var bool
     */
    private $underRepair;

    public function __construct($name)
    {
        $this->name = $name;
        $this->underRepair = mt_rand(1, 100) < 30;
    }

    /**
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param string $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * @return int
     */
    public function getWeaponPower()
    {
        return $this->weaponPower;
    }

    /**
     * @param int $weaponPower
     * @throws Exception
     */
    public function setWeaponPower($weaponPower)
    {
        if(!is_numeric($weaponPower)) {
            throw new Exception('Invalid weapon power passed: '.$weaponPower);
        }

        $this->weaponPower = $weaponPower;
    }

    /**
     * @return int
     */
    public function getJediFactor()
    {
        return $this->jediFactor;
    }

    /**
     * @param int $jediFactor
     * @throws Exception
     */
    public function setJediFactor($jediFactor)
    {
        if(!is_numeric($jediFactor)) {
            throw new Exception('Invalid Jedi factor passed: '.$jediFactor);
        }

        $this->jediFactor = $jediFactor;
    }

    /**
     * @param int $strength
     * @throws Exception
     */
    public function setStrength($strength)
    {
        if(!is_numeric($strength)) {
            throw new Exception('Invalid stength passed: '.$strength);
        }
        $this->strength = $strength;
    }

    /**
     * @return int
     */
    public function getStrength()
    {
        return $this->strength;
    }

    public function isFunctional()
    {
        return !$this->underRepair;
    }

    /**
     * @param bool $useShortFormat
     * @return string
     */
    public function getNameAndSpecs($useShortFormat = false)
    {
        if($useShortFormat) {
            return sprintf(
                '%s: %s/%s/%s',
                $this->name,
                $this->weaponPower,
                $this->jediFactor,
                $this->strength
            );
        } else {
            return sprintf(
                '%s: w:%s, j:%s, s:%s',
                $this->name,
                $this->weaponPower,
                $this->jediFactor,
                $this->strength
            );
        }
    }

    /**
     * @param Ship $givenShip
     * @return bool
     */
    public function doesGivenShipHaveMoreStrength($givenShip)
    {
        return $givenShip->strength > $this->strength;
    }
}
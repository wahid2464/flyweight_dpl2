<?php
require_once 'Player.php';

class CounterTerrorist implements Player
{
    // Intrinsic Attribute
    private $TASK;

    // Extrinsic Attribute
    private $weapon;

    public function __construct()
    {
        $this->TASK = "DIFFUSE BOMB";
    }

    public function assignWeapon($weapon)
    {
        $this->weapon = $weapon;
    }

    public function mission()
    {
        echo "Counter Terrorist with weapon " . $this->weapon . " | Task is " . $this->TASK . "\n";
    }
}
?>

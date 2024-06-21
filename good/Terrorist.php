<?php
require_once 'Player.php';

class Terrorist implements Player
{
    // Intrinsic Attribute
    private $TASK;

    // Extrinsic Attribute
    private $weapon;

    public function __construct()
    {
        $this->TASK = "PLANT A BOMB";
    }

    public function assignWeapon($weapon)
    {
        // Assign a weapon
        $this->weapon = $weapon;
    }

    public function mission()
    {
        // Work on the Mission
        echo "Terrorist with weapon " . $this->weapon . " | Task is " . $this->TASK . "\n";
    }
}

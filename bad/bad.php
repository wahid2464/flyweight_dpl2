<?php
// A PHP program to demonstrate a bad design without FlyWeight Pattern
// with example of Counter Strike Game

// A common interface for all players
interface Player
{
    public function assignWeapon($weapon);
    public function mission();
}

// Terrorist must have weapon and mission
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

// CounterTerrorist must have weapon and mission
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

// Driver class
class CounterStrike
{
    // All player types and weapon (used by getRandPlayerType()
    // and getRandWeapon()
    private static $playerType = array("Terrorist", "CounterTerrorist");
    private static $weapons = array("AK-47", "Maverick", "Gut Knife", "Desert Eagle");

    // Driver code
    public static function main()
    {
        // Assume that we have a total of 10 players in the game.
        for ($i = 0; $i < 10; $i++) {
            // Create a new player every time
            $p = self::createPlayer(self::getRandPlayerType());

            // Assign a weapon chosen randomly uniformly from the weapon array
            $p->assignWeapon(self::getRandWeapon());

            // Send this player on a mission
            $p->mission();
        }
    }

    // Method to create a player
    public static function createPlayer($type)
    {
        switch ($type) {
            case "Terrorist":
                echo "Terrorist Created\n";
                return new Terrorist();
            case "CounterTerrorist":
                echo "Counter Terrorist Created\n";
                return new CounterTerrorist();
            default:
                echo "Unreachable code!\n";
                return null;
        }
    }

    // Utility methods to get a random player type and weapon
    public static function getRandPlayerType()
    {
        $randInt = rand(0, count(self::$playerType) - 1);
        return self::$playerType[$randInt];
    }

    public static function getRandWeapon()
    {
        $randInt = rand(0, count(self::$weapons) - 1);
        return self::$weapons[$randInt];
    }
}

// Run the main function
CounterStrike::main();

<?php
// A PHP program to demonstrate working of
// FlyWeight Pattern with example of Counter
// Strike Game

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

// Class used to get a player using HashMap (Returns
// an existing player if a player of given type exists.
// Else creates a new player and returns it.
class PlayerFactory
{
    // HashMap stores the reference to the object
    // of Terrorist(TS) or CounterTerrorist(CT).
    private static $hm = array();

    // Method to get a player
    public static function getPlayer($type)
    {
        $p = null;

        // If an object for TS or CT has already been
        // created simply return its reference
        if (array_key_exists($type, self::$hm)) {
            $p = self::$hm[$type];
        } else {
            // Create an object of TS/CT
            switch ($type) {
                case "Terrorist":
                    echo "Terrorist Created\n";
                    $p = new Terrorist();
                    break;
                case "CounterTerrorist":
                    echo "Counter Terrorist Created\n";
                    $p = new CounterTerrorist();
                    break;
                default:
                    echo "Unreachable code!\n";
            }

            // Once created insert it into the HashMap
            self::$hm[$type] = $p;
        }
        return $p;
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
            // getPlayer() is called simply using the class name since the method is a static one
            $p = PlayerFactory::getPlayer(self::getRandPlayerType());

            // Assign a weapon chosen randomly uniformly from the weapon array
            $p->assignWeapon(self::getRandWeapon());

            // Send this player on a mission
            $p->mission();
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
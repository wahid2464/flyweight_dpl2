<?php
require_once 'PlayerFactory.php';

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
?>

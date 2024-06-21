<?php
require_once 'Terrorist.php';
require_once 'CounterTerrorist.php';

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

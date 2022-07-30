<?php

class ServerHelper
{
    public static $ram_regex = '/(\d+)(?:\/\d+)*\s*([GT]B)(.*)/i';
    public static $disk_regex = "/(\d+)x(\d+)([GT]B)(.*)/i";
    public static $price_regex = "/(*UTF8)([$|€])(\d+.+)/i";

    /**
    * Get Disk info based on the given string and
    * @param string $disk
    * @return array
    */
    public static function getDiskInfo(string $disk): array
    {
        preg_match(self::$disk_regex, $disk, $matches);
        return [
            'disk' => $disk,
            'storage' => $matches[1] * $matches[2],
            'unit' => $matches[3],
            'type' => $matches[4],
        ];
    }

    /**
    * Get RAM info based on the given string and
    * @param string $ram
    * @return array
    */
    public static function getRamInfo(string $ram): array
    {
        preg_match(self::$ram_regex, $ram, $matches);
        return [
            'ram' => $ram,
            'capacity' => $matches[1],
            'unit' => $matches[2],
            'type' => $matches[3],
        ];
    }

    /**
    * Get Price info based on the given string and
    * @param string $price
    * @return array
    */
    public static function getPriceInfo(string $price): array
    {
        preg_match(self::$price_regex, $price, $matches);
        return [
            'price' => $matches[2],
            'currency' => $matches[1],
            'currency_name' => ($matches[1] === '€') ? 'euro' : 'dollar',
        ];
    }

    /**
    * Get Location info based on the given string and
    * @param string $location
    * @return array
    */
    public static function getLocationInfo(string $location): array
    {
        return [
            'city' => substr($location, 0, -6),
            'sector' => substr($location, -6),
        ];
    }
}
<?php


namespace Sofiakb\Lumen\ApiKey\Services;


/**
 * Class Caesar
 * @package Sofiakb\Lumen\ApiKey\Services
 */
class Caesar
{
    protected static $LETTERS = 'abcdefghijklmnopqrstuvwxyz0123456789';
    
    /**
     * @param string $data
     * @param $shift
     * @return string
     */
    public function encrypt(string $data, $shift = null): string
    {
        $letters = str_split(self::$LETTERS);
        $size = count($letters);
        
        if (is_null($shift)) {
            $shifts = array();
            for ($i = 0; $i < 5; $i++)
                $shifts[] = mt_rand(0, $size - 1);
            shuffle($shifts);
            $shift = $shifts[0];
        } else {
            $shift = (int)self::shift($data);
            $data = self::data($data);
        }
        
        $encoded = '';
        foreach (str_split($data) as $letter) {
            if ($letter !== '-') {
                $index = array_search($letter, $letters);
                $encoded .= $letters[($index + $shift) % $size];
            } else $encoded .= '-';
        }
        $encoded .= ".s00$shift";
        return $encoded;
    }
    
    /**
     * @param string $data
     * @return string
     * @throws \Exception
     */
    public function decrypt(string $data): string
    {
        $letters = str_split(self::$LETTERS);
        $size = count($letters);
    
        $shiftExpr = explode(".s00", $data);
        
        if (count($shiftExpr) < 2)
            throw new \Exception("La donnée est mal formattée");
        
        $shift = $shiftExpr[1];
        $key = $shiftExpr[0];
        
        $decoded = '';
        foreach (str_split($key) as $letter) {
            if ($letter !== '-') {
                $index = array_search($letter, $letters);
                $decoded .= $letters[($shift <= $index ? $index - $shift : (($size + ($index - $shift)) % $size)) % $size];
            } else $decoded .= '-';
        }
        
        return $decoded . '.s00' . $shift;
    }
    
    /**
     * @param $data
     * @return mixed|string|null
     */
    public static function shift($data)
    {
        return explode('.s00', $data)[1] ?? null;
    }
    
    /**
     * @param $data
     * @return mixed|string|null
     */
    public static function data($data)
    {
        return explode('.s00', $data)[0] ?? null;
    }
    
}

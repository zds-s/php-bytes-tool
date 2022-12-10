<?php

namespace DeathSatan\BytesTool;

class ASCII
{
    /**
     * 将字符串转换为ASCII码
     * @param string $str
     * @return ?string
     */
    public static function encode(string $str): ?string
    {
        $result = null;
        for ($i=0;$i<strlen($str);$i++)
        {
            $current_val = $str[$i];
            $result .= hex2bin(base_convert(ord($current_val),10,16));
        }
        return $result;
    }

}
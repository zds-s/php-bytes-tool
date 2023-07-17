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

    /**
     * 将二进制字符串转换为ascii字符
     * 大于127则取0
     * @param string $binStr
     * @return string
     */
    public static function decode(string $binStr):string
    {
        $result = "";
        for ($i=0;$i<strlen($binStr);$i++)
        {
            $currentStr = $binStr[$i];
            $intValue = hexdec(bin2hex($currentStr));
            // 如果大于127则取0
            $intValue = $intValue>127?0:$intValue;
            $result .= chr($intValue);
        }
        return $result;
    }
}
<?php

namespace DeathSatan\BytesTool;

/**
 * BCD
 */
class BCD
{
    /**
     * 将一个数字转换为BCD形式的二进制字符串
     * @param int $val
     * @return string
     */
    public static function encode(int $val)
    {
        $hex = base_convert($val,10,16);
        if ((strlen($hex) % 2) !== 0)
        {
            $hex = '0'.$hex;
        }
        return hex2bin($hex);
    }

    /**
     * 将二进制字符串转换为实际真实值
     * @param string $binStr
     * @return string
     */
    public static function decode(string $binStr): string
    {
        return hexdec(bin2hex($binStr));
    }
}
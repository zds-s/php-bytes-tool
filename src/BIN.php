<?php

namespace DeathSatan\BytesTool;

/**
 * BIN解码类
 */
class BIN
{
    /**
     * 将传入的二进制字符串解析成16进制字符串。解析结果默认补0
     * @param string $binStr
     * @return ?string
     */
    public static function decode(string $binStr): ?string
    {
        $result = null;
        $str = strrev($binStr);
        for ($i = 0; $i < strlen($str); ++$i) {
            $res = bin2hex($str[$i]);
            $res = str_pad($res, 2, '0', STR_PAD_LEFT);
            $result .= $res;
        }
        return $result;
    }

    /**
     * 将传入的16进制字符串转换为二进制字符
     * @param string $hexStr
     * @return ?string
     */
    public static function encode(string $hexStr): ?string
    {
        $result = null;
        // 如果字符串长度不够除2，就在左边补0
        if ((strlen($hexStr) % 2) !== 0)
        {
            $hexStr = '0'.$hexStr;
        }
        $hexData = str_split($hexStr,2);
        foreach ($hexData as $hex)
        {
            $result .= hex2bin($hex);
        }
        return strrev($result);
    }
}
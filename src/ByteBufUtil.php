<?php

namespace DeathSatan\BytesTool;

class ByteBufUtil
{
    private static function getBinToNumber($binStr): int
    {
        return (int)hexdec(bin2hex($binStr));
    }

    static function getByte(string $binStr,int $index):string {return $binStr[$index];}

    static function getShort(string $binStr,int $index):int{ return (self::getBinToNumber(self::getBinToNumber($binStr[$index]))<<8 | self::getBinToNumber($binStr[$index+1]) & 255); }

    static function getShortLE(string $binStr,int $index):int {return (self::getBinToNumber($binStr[$index]) & 255 | self::getBinToNumber($binStr[$index + 1]) << 8);}

    static function getUnsignedMedium(string $binStr,int $index): int
    {
        return (self::getBinToNumber($binStr[$index]) & 255) << 16 | (self::getBinToNumber($binStr[$index + 1]) & 255) << 8 | self::getBinToNumber($binStr[$index + 2]) & 255;
    }

    static function getUnsignedMediumLE(string $binStr,int $index):int
    {
        return self::getBinToNumber($binStr[$index]) & 255 | (self::getBinToNumber($binStr[$index + 1]) & 255) << 8 | (self::getBinToNumber($binStr[$index + 2]) & 255) << 16;
    }

    static function getInt(string $binStr,int $index): int
    {
        return (
            self::getBinToNumber($binStr[$index]) & 255) << 24
            | (self::getBinToNumber($binStr[$index + 1]) & 255) << 16
            | (self::getBinToNumber($binStr[$index + 2]) & 255) << 8
            | self::getBinToNumber($binStr[$index + 3]) & 255;
    }

    static function getIntLE(string $binStr,int $index): int
    {
        return self::getBinToNumber($binStr[$index]) & 255 | (self::getBinToNumber($binStr[$index + 1]) & 255 << 8) | (self::getBinToNumber($binStr[$index + 2]) & 255 << 16) | (self::getBinToNumber($binStr[$index + 3]) & 255 << 24);
    }

    static function getLong(string $binStr,int $index): int
    {
        return (self::getBinToNumber($binStr[$index]) & 255) << 56 | (self::getBinToNumber($binStr[$index + 1]) & 255) << 48 | (self::getBinToNumber($binStr[$index + 2]) & 255) << 40 | (self::getBinToNumber($binStr[$index + 3]) & 255) << 32 | ($binStr[$index + 4] & 255) << 24 | ($binStr[$index + 5] & 255) << 16 | ($binStr[$index + 6] & 255) << 8 | $binStr[$index + 7] & 255;
    }

    static function getLongLE(string $binStr,int $index): int
    {
        return self::getBinToNumber($binStr[$index]) & 255 | (self::getBinToNumber($binStr[$index + 1]) & 255) << 8 | (self::getBinToNumber($binStr[$index + 2]) & 255) << 16 | (self::getBinToNumber($binStr[$index + 3]) & 255) << 24 | ($binStr[$index + 4] & 255) << 32 | ($binStr[$index + 5] & 255) << 40 | ($binStr[$index + 6] & 255) << 48 | ($binStr[$index + 7] & 255) << 56;
    }

    static function buildByte(int $value): string
    {
        return hex2bin(self::decConvertHex($value));
    }

    static function buildShort(int $value): string
    {
        $binStr = hex2bin(dechex($value/(int)bcpow(2,8)));
        $binStr .=  hex2bin(self::decConvertHex($value));
        return $binStr;
    }

    static function buildShortLE(int $value): string
    {
        $binStr  = hex2bin(self::decConvertHex($value));
        $binStr .= hex2bin(self::decConvertHex(self::shiftRight($value,8)));
        return $binStr;
    }

    static function buildMedium(int $value): string
    {
        $binStr = hex2bin(self::decConvertHex(self::shiftRight($value,16)));
        $binStr .= hex2bin(self::decConvertHex(self::shiftRight($value,8)));
        $binStr .= hex2bin(self::decConvertHex($value));
        return $binStr;
    }

    static function buildMediumLE( int $value): string
    {
        $binStr = hex2bin(self::decConvertHex($value));
        $binStr .= hex2bin(self::decConvertHex(self::shiftRight($value,8)));
        $binStr .= hex2bin(self::decConvertHex(self::shiftRight($value,16)));
        return $binStr;
    }

    static function buildInt(int $value): string
    {
        return pack("N",$value);
    }

    static function buildIntLE( int $value): string
    {
        return pack('n',$value);
    }

    static function setLong( int $value): string
    {
        $binStr = hex2bin(self::decConvertHex(self::shiftRight($value,56)));
        $binStr .= hex2bin(self::decConvertHex(self::shiftRight($value,48)));
        $binStr .= hex2bin(self::decConvertHex(self::shiftRight($value,40)));
        $binStr .= hex2bin(self::decConvertHex(self::shiftRight($value,32)));
        $binStr .= hex2bin(self::decConvertHex(self::shiftRight($value,24)));
        $binStr .= hex2bin(self::decConvertHex(self::shiftRight($value,16)));
        $binStr .= hex2bin(self::decConvertHex(self::shiftRight($value,8)));
        $binStr .= hex2bin(self::decConvertHex($value));
        return $binStr;
    }

    static function setLongLE( int $value): string
    {
        $binStr  = self::getBinStr($value);
        $binStr .= hex2bin(self::decConvertHex(self::shiftRight($value,32)));
        $binStr .= hex2bin(self::decConvertHex(self::shiftRight($value,40)));
        $binStr .=hex2bin(self::decConvertHex(self::shiftRight($value,48)));
        $binStr .= hex2bin(self::decConvertHex(self::shiftRight($value,56)));
        return $binStr;
    }

    /**
     * @param int $value
     * @param string $binStr
     * @param int $index
     * @return string
     */
    public static function getBinStr(int $value): string
    {
        $binStr = hex2bin(self::decConvertHex($value));
        $binStr .= hex2bin(self::decConvertHex(self::shiftRight($value,8)));
        $binStr .= hex2bin(self::decConvertHex(self::shiftRight($value,16)));
        $binStr .= hex2bin(self::decConvertHex(self::shiftRight($value,24)));
        return $binStr;
    }

    private static function shiftRight(int $value,int $offset ): int
    {
        return $value >> $offset & 0xff;
    }

    private static function decConvertHex(int $val):string
    {
        $hexValue = dechex($val);
        if ((strlen($hexValue) % 2) !=0)
        {
            $hexValue = '0'.$hexValue;
        }
        return $hexValue;
    }
}
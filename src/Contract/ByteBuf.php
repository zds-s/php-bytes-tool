<?php

namespace DeathSatan\BytesTool\Contract;

interface ByteBuf
{
    /**
     * 返回当前读取的第几位数
     * @return int
     */
    public function readerIndex(): int;

    /**
     * 设置当前读取的第几位字节
     * @param int $readerIndex
     * @return ByteBuf
     */
    public function setReaderIndex(int $readerIndex):ByteBuf;

    /**
     * 清空当前读取的字节位数
     * @return ByteBuf
     */
    public function clearIndex():ByteBuf;

    /**
     * 判断是否还能读取到 $numBytes个字节
     * @param int $numBytes
     * @return bool
     */
    public function isReadable(int $numBytes = 0):bool;

    /**
     * 返回剩余字节
     * @return int
     */
    public function readableBytes():int;

    /**
     * 获取指定数量字节
     * @param int $numBytes
     * @return string
     */
    public function getByte(int $numBytes):string;

    /**
     * 大端
     * @return int
     */
    public function getShort():int;

    /**
     * 小端
     * @return int
     */
    public function getShortLE():int;

    /**
     * 读取三字节大端转int
     * @return int
     */
    public function getUnsignedMedium():int;

    /**
     * 小端
     * @return int
     */
    public function getUnsignedMediumLE():int;

    /**
     * 四字节大端转int
     * @return int
     */
    public function getInt():int;

    /**
     * 四字节小端转int
     * @return int
     */
    public function getIntLE():int;

    /**
     * 八字节大端转int
     * @return int
     */
    public function getLong():int;

    /**
     * 八字节小端转int
     * @return int
     */
    public function getLongLE():int;

}
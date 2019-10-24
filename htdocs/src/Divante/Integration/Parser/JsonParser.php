<?php

namespace Divante\Integration\Parser;

/**
 * Class JsonParser
 * @package Divante\Integration\Parser
 */
class JsonParser implements ParserInterface
{
    /**
     * Type of data for parsing
     */
    const TYPE = 'json';

    /**
     * @return string
     */
    public static function getType()
    {
        return self::TYPE;
    }

    /**
     * @param $content
     * @return array|mixed
     */
    public function parse($content)
    {
        return json_decode($content, true);
    }
}
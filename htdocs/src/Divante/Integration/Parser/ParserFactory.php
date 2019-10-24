<?php

namespace Divante\Integration\Parser;

/**
 * Class ParserFactory
 * @package Divante\Integration\Parser
 */
class ParserFactory implements FactoryInterface
{
    /**
     * @param string $type
     * @return JsonParser|ParserInterface|XmlParser|null
     */
    public function getParser($type)
    {
        $parser = null;
        switch ($type) {
        case 'xml':
            $parser = new XmlParser();
            break;
        case 'json':
            $parser = new JsonParser();
            break;
        default:
            throw new \InvalidArgumentException('wrong parser type');
        }
        return $parser;
    }
}
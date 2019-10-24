<?php

use PHPUnit\Framework\TestCase;
use Divante\Integration\Parser\JsonParser;

/**
 * Class JsonParserTest
 */
final class JsonParserTest extends TestCase
{
    /**
     * Test creating instance
     */
    public function testInstance()
    {
        $jsonParser = new JsonParser();
        $this->assertInstanceOf('Divante\Integration\Parser\JsonParser', $jsonParser);
    }

    /**
     * Test parse empty json
     */
    public function testParseEmpty()
    {
        $jsonParser = new JsonParser();
        $this->assertEquals([], $jsonParser->parse('{}'));
    }

    /**
     * test parse json
     */
    public function testParse()
    {
        $jsonParser = new JsonParser();
        $this->assertEquals(
            ['test' => 123, 'test2' => 345],
            $jsonParser->parse('{"test":123,"test2":345}')
        );
    }
}
<?php

use PHPUnit\Framework\TestCase;
use Divante\Integration\Parser\XmlParser;

/**
 * Class XmlParserTest
 */
final class XmlParserTest extends TestCase
{
    /**
     * Test creating instance
     */
    public function testInstance()
    {
        $xmlParser = new XmlParser();
        $this->assertInstanceOf('Divante\Integration\Parser\XmlParser', $xmlParser);
    }

    /**
     * Test parse empty string as xml
     */
    public function testParseEmpty()
    {
        $xmlParser = new XmlParser();
        $this->assertEquals(false, $xmlParser->parse(''));
    }

    /**
     * test parse xml
     */
    public function testParse()
    {
        $xml = <<<XML
<?xml version="1.0"?>
<root>
  <param1>abc</param1>
  <param2>zxc</param2>
</root>
XML;
        $xmlParser = new XmlParser();
        $this->assertEquals(
            'abc',
            $xmlParser->parse($xml)->param1
        );
        $this->assertEquals(
            'zxc',
            $xmlParser->parse($xml)->param2
        );
    }
}
<?php
use PHPUnit\Framework\TestCase;
use Divante\Integration\Supplier\Supplier1;
use \Mockery as mock;

/**
 * Class Supplier1Test
 */
final class Supplier1Test extends TestCase
{
    /**
     * Test creating instance
     */
    public function testInstance()
    {
        $parserMock = mock::mock(\Divante\Integration\Parser\XmlParser::class);
        $dispatcherMock = mock::mock(\Symfony\Component\EventDispatcher\EventDispatcher::class);
        $dispatcherMock->shouldReceive('addListener');
        $supplier = new Supplier1($parserMock, $dispatcherMock);
        $this->assertInstanceOf('Divante\Integration\Supplier\Supplier1', $supplier);
    }

    /**
     * Test getName method
     */
    public function testGetName()
    {
        $this->assertEquals('supplier1', Supplier1::getName());
    }

    /**
     * Test response type
     */
    public function testGetResponseType()
    {
        $this->assertEquals('xml', Supplier1::getResponseType());
    }

    /**
     * Test product list
     */
    public function testGetProducts()
    {
        $parserMock = mock::mock(\Divante\Integration\Parser\XmlParser::class);
        $dispatcherMock = mock::mock(\Symfony\Component\EventDispatcher\EventDispatcher::class);
        $dispatcherMock->shouldReceive('addListener');
        $row = new stdClass();
        $row->id = 123; $row->name = 'test name'; $row->desc = 'test desc';
        $parserMock->shouldReceive('parse')
            ->andReturn([$row]);
        $dispatcherMock->shouldReceive('dispatch');
        $supplier = new Supplier1($parserMock, $dispatcherMock);
        $this->assertEquals(
            [['ID' => 123, 'Name' => 'test name', 'Desc' => 'test desc']],
            $supplier->getProducts()
        );
    }
}
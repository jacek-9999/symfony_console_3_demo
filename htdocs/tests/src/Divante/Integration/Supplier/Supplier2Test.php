<?php
use PHPUnit\Framework\TestCase;
use Divante\Integration\Supplier\Supplier2;
use \Mockery as mock;

/**
 * Class Supplier2Test
 */
final class Supplier2Test extends TestCase
{
    /**
     * Test creating instance
     */
    public function testInstance()
    {
        $parserMock = mock::mock(\Divante\Integration\Parser\XmlParser::class);
        $dispatcherMock = mock::mock(\Symfony\Component\EventDispatcher\EventDispatcher::class);
        $dispatcherMock->shouldReceive('addListener');
        $supplier = new Supplier2($parserMock, $dispatcherMock);
        $this->assertInstanceOf('Divante\Integration\Supplier\Supplier2', $supplier);
    }

    /**
     * Test getName method
     */
    public function testGetName()
    {
        $this->assertEquals('supplier2', Supplier2::getName());
    }

    /**
     * Test response type
     */
    public function testGetResponseType()
    {
        $this->assertEquals('xml', Supplier2::getResponseType());
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
        $row->key = 123; $row->title = 'test name'; $row->description = 'test desc';
        $parserMock->shouldReceive('parse')
            ->andReturn([$row]);
        $dispatcherMock->shouldReceive('dispatch');
        $supplier = new Supplier2($parserMock, $dispatcherMock);
        $this->assertEquals(
            [['ID' => 123, 'Name' => 'test name', 'Desc' => 'test desc']],
            $supplier->getProducts()
        );
    }
}
<?php
use PHPUnit\Framework\TestCase;
use Divante\Integration\Supplier\Supplier3;
use \Mockery as mock;

/**
 * Class Supplier3Test
 */
final class Supplier3Test extends TestCase
{
    /**
     * Test creating instance
     */
    public function testInstance()
    {
        $parserMock = mock::mock(\Divante\Integration\Parser\JsonParser::class);
        $dispatcherMock = mock::mock(\Symfony\Component\EventDispatcher\EventDispatcher::class);
        $dispatcherMock->shouldReceive('addListener');
        $supplier = new Supplier3($parserMock, $dispatcherMock);
        $this->assertInstanceOf('Divante\Integration\Supplier\Supplier3', $supplier);
    }

    /**
     * Test getName method
     */
    public function testGetName()
    {
        $this->assertEquals('supplier3', Supplier3::getName());
    }

    /**
     * Test response type
     */
    public function testGetResponseType()
    {
        $this->assertEquals('json', Supplier3::getResponseType());
    }

    /**
     * Test product list
     */
    public function testGetProducts()
    {
        $parserMock = mock::mock(\Divante\Integration\Parser\XmlParser::class);
        $dispatcherMock = mock::mock(\Symfony\Component\EventDispatcher\EventDispatcher::class);
        $dispatcherMock->shouldReceive('addListener');
        $row = ['id' => 678, 'name' => 'supplier 3 test'];
        $parserMock->shouldReceive('parse')
            ->andReturn(['list' => [$row]]);
        $dispatcherMock->shouldReceive('dispatch');
        $supplier = new Supplier3($parserMock, $dispatcherMock);
        $this->assertEquals(
            [['ID' => 678, 'Name' => 'supplier 3 test', 'Desc' => '---']],
            $supplier->getProducts()
        );
    }
}
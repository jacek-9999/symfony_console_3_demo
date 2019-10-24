<?php

use PHPUnit\Framework\TestCase;
use \Mockery as mock;
use Divante\Integration\Command\SupplierSync;

/**
 * Class SupplierSyncTest
 */
final class SupplierSyncTest extends TestCase
{

    /**
     * Test creating instance
     */
    public function testInstance()
    {
        $supplierFactory = mock::mock(Divante\Integration\Supplier\Factory::class);
        $supplierSync = new SupplierSync(null, $supplierFactory);
        $this->assertInstanceOf('Divante\Integration\Command\SupplierSync', $supplierSync);
    }

    /**
     * @throws Exception
     */
    public function testExecute()
    {
        $supplierFactory = mock::mock(Divante\Integration\Supplier\Factory::class);
        $supplierSync = new SupplierSync(null, $supplierFactory);

        $inputMock =
            mock::mock(Symfony\Component\Console\Input\InputInterface::class);
        $outputMock =
            mock::mock(Symfony\Component\Console\Output\OutputInterface::class);
        $supplier1Mock = mock::mock(\Divante\Integration\Supplier\Supplier1::class);

        $inputMock->shouldReceive('bind');
        $inputMock->shouldReceive('isInteractive');
        $inputMock->shouldReceive('hasArgument')->andReturn(true);
        $inputMock->shouldReceive('getArgument');
        $inputMock->shouldReceive('setArgument');
        $inputMock->shouldReceive('validate');

        $inputMock->shouldReceive('getArguments')
            ->andReturn(['supplier' => 'supplier_name_from_arg']);
        $supplierFactory->shouldReceive('getSupplier')
            ->with('supplier_name_from_arg')
            ->andReturn($supplier1Mock);
        $supplier1Mock->shouldReceive('getProducts')->andReturn([]);
        $formatterMock = mock::mock(Symfony\Component\Console\Formatter\OutputFormatterInterface::class);
        $outputMock->shouldReceive('getFormatter')->andReturn($formatterMock);
        $formatterMock->shouldReceive('isDecorated');
        $formatterMock->shouldReceive('setDecorated');
        $formatterMock->shouldReceive('format');
        $outputMock->shouldReceive('writeln');
        $outputMock->shouldReceive('write');

        $supplierSync->run($inputMock, $outputMock);
    }
}

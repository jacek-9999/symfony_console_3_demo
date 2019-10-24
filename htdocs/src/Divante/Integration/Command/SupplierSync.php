<?php

/*
 * This file is part of the "Divante/Integration" package.
 *
 * (c) Divante Sp. z o. o.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Divante\Integration\Command;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Helper\Table;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Divante\Integration\Supplier\FactoryInterface as SupplierFactoryInterface;

/**
 * Class SupplierSync
 *
 * @package Divante\Integration\Command
 */
class SupplierSync extends Command
{
    /**
     * Supplier factory
     *
     * @var SupplierFactoryInterface
     */
    protected $supplierFactory;

    /**
     * {@inheritdoc}
     */
    public function __construct($name = null, SupplierFactoryInterface $supplierFactory)
    {
        parent::__construct($name);

        $this->supplierFactory = $supplierFactory;
    }

    /**
     * {@inheritdoc}
     */
    protected function configure()
    {
        $this
            ->setName('divante:supplier:sync')
            ->setDescription('Synchronize one or more suppliers')
            ->addArgument(
                'supplier',
                InputArgument::REQUIRED,
                'Which supplier do you want to synchronize?'
            );
    }

    /**
     * {@inheritdoc}
     */
    protected function execute(InputInterface $input, OutputInterface $output)
    {
        try {
            $supplier = $this
                ->supplierFactory
                ->getSupplier($input->getArguments()['supplier']);
            $products = $supplier->getProducts();
            $table = new Table($output);
            $table->setHeaders(array('ID', 'Name', 'Desc'))->setRows($products);
            $table->render();

        } catch (\InvalidArgumentException $e) {
            $output->writeln('<error>'.$e->getMessage().'</error>');
        }
    }
}

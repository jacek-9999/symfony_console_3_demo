<?php

/*
 * This file is part of the "Divante/Integration" package.
 *
 * (c) Divante Sp. z o. o.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Divante\Integration\Supplier;

use Divante\Integration\IntegrationEvents;
use Divante\Integration\Parser\FactoryInterface as ParserFactoryInterface;
use Divante\Integration\Supplier\Listener\ProductsListener;
use Symfony\Component\EventDispatcher\EventDispatcher;

/**
 * Class Factory
 *
 * @package Divante\Integration\Supplier
 */
class Factory implements FactoryInterface
{
    /**
     * Parser factory
     *
     * @var ParserFactoryInterface
     */
    protected $parserFactory;

    /**
     * Event dispatcher
     *
     * @var EventDispatcher
     */
    protected $eventDispatcher;

    /**
     * Constructor
     *
     * @param ParserFactoryInterface $parserFactory
     * @param EventDispatcher        $eventDispatcher
     */
    public function __construct(ParserFactoryInterface $parserFactory, EventDispatcher $eventDispatcher)
    {
        $this->parserFactory = $parserFactory;
        $this->eventDispatcher = $eventDispatcher;

        // add listener
        $this->eventDispatcher->addListener(
            IntegrationEvents::SUPPLIER_GET_PRODUCTS,
            array(new ProductsListener(), 'logProducts')
        );
    }

    /**
     * {@inheritdoc}
     */
    public function getSupplier($supplierName)
    {
        $supplier = null;
        $supplierName = strtolower($supplierName);
        switch ($supplierName) {
        case 'supplier1':
            $supplier =
                new Supplier1(
                    $this->parserFactory->getParser(Supplier1::getResponseType()),
                    $this->eventDispatcher
                );
            break;
        case 'supplier2':
            $supplier =
                new Supplier2(
                    $this->parserFactory->getParser(Supplier2::getResponseType()),
                    $this->eventDispatcher
                );
            break;
        case 'supplier3':
            $supplier =
                new Supplier3(
                    $this->parserFactory->getParser(Supplier3::getResponseType()),
                    $this->eventDispatcher
                );
            break;
        default:
            throw new \InvalidArgumentException('Wrong supplier');
                break;
        }
        return $supplier;
    }
}

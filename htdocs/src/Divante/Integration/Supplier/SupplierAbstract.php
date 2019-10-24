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
use Divante\Integration\Parser\ParserInterface;
use Divante\Integration\Supplier\Event\GetProductsEvent;
use Divante\Integration\Supplier\Listener\ProductsListener;
use Symfony\Component\EventDispatcher\EventDispatcher;

/**
 * Class SupplierAbstract
 *
 * @package Divante\Integration\Supplier
 */
abstract class SupplierAbstract implements SupplierInterface
{
    /**
     * Parser
     *
     * @var ParserInterface
     */
    protected $parser;

    /**
     * Event dispatcher
     *
     * @var EventDispatcher
     */
    protected $eventDispatcher;

    /**
     * {@inheritdoc}
     */
    public function __construct(ParserInterface $parser, EventDispatcher $eventDispatcher)
    {
        $this->parser = $parser;
        $this->eventDispatcher = $eventDispatcher;
        $listener = new ProductsListener();
        $this->eventDispatcher->addListener(
            IntegrationEvents::SUPPLIER_GET_PRODUCTS,
            [$listener, 'logProducts']
        );
    }

    /**
     * Parse response
     *
     * @return array
     */
    abstract protected function parseResponse();

    /**
     * {@inheritdoc}
     */
    public function getProducts()
    {
        $products = $this->parseResponse();
        $event = new GetProductsEvent($products, $this->getName());
        $this->eventDispatcher->dispatch(IntegrationEvents::SUPPLIER_GET_PRODUCTS, $event);
        return $products;
    }
}

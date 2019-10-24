<?php

/*
 * This file is part of the "Divante/Integration" package.
 *
 * (c) Divante Sp. z o. o.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Divante\Integration\Supplier\Listener;

use Divante\Integration\Supplier\Event\GetProductsEvent;
use Monolog\Handler\StreamHandler;
use Monolog\Logger;
use Symfony\Component\EventDispatcher\Event;

/**
 * Class ProductsListener
 *
 * @package Divante\Integration\Supplier\Listener
 */
class ProductsListener
{
    /**
     * Filename path
     */
    const FILENAME_PATH = './log/supplier.log';

    /**
     * Logger
     *
     * @var Logger
     */
    protected $logger;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->logger = new Logger(
            'suppliers_logger',
            array(new StreamHandler(self::FILENAME_PATH, Logger::INFO))
        );
    }

    /**
     * Log products
     *
     * @param Event $event
     */
    public function logProducts(Event $event)
    {
        if ($event instanceof GetProductsEvent) {
            foreach ($event->getProducts() as $product) {
                $productKeys = array_keys($product);
                $this->logger->addInfo(
                    'Added product: '.$product[$productKeys[0]],
                    array('supplier' => $event->getSupplierName())
                );
            }
        }
    }
}

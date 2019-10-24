<?php

/*
 * This file is part of the "Divante/Integration" package.
 *
 * (c) Divante Sp. z o. o.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Divante\Integration\Supplier\Event;

use Symfony\Component\EventDispatcher\Event;

/**
 * Class GetProductsEvent
 *
 * @package Divante\Integration\Supplier\Event
 */
class GetProductsEvent extends Event
{
    /**
     * Products array
     *
     * @var array
     */
    protected $products;

    /**
     * Supplier name
     *
     * @var string
     */
    protected $supplierName;

    /**
     * Constructor
     *
     * @param array  $products
     * @param string $supplierName
     */
    public function __construct(array $products, $supplierName)
    {
        $this->products = $products;
        $this->supplierName = $supplierName;
    }

    /**
     * Get products array
     *
     * @return array
     */
    public function getProducts()
    {
        return $this->products;
    }

    /**
     * Get supplier name
     *
     * @return string
     */
    public function getSupplierName()
    {
        return $this->supplierName;
    }
}

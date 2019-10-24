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

/**
 * Interface FactoryInterface
 *
 * @package Divante\Integration\Supplier
 */
interface FactoryInterface
{
    /**
     * Get supplier
     *
     * @param string $supplierName
     *
     * @throws \InvalidArgumentException
     * @return SupplierInterface
     */
    public function getSupplier($supplierName);
}

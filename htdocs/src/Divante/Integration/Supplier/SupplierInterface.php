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

use Divante\Integration\Parser\ParserInterface;
use Symfony\Component\EventDispatcher\EventDispatcher;

/**
 * Interface SupplierInterface
 *
 * @package Divante\Integration\Supplier
 */
interface SupplierInterface
{
    /**
     * Constructor
     *
     * @param ParserInterface $parser
     * @param EventDispatcher $eventDispatcher
     */
    public function __construct(ParserInterface $parser, EventDispatcher $eventDispatcher);

    /**
     * Get products array
     *
     * @return array
     */
    public function getProducts();

    /**
     * Get supplier name
     *
     * @return string
     */
    public static function getName();

    /**
     * Get response type
     *
     * @return string
     */
    public static function getResponseType();
}

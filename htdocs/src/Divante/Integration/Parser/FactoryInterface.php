<?php

/*
 * This file is part of the "Divante/Integration" package.
 *
 * (c) Divante Sp. z o. o.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Divante\Integration\Parser;

/**
 * Interface FactoryInterface
 *
 * @package Divante\Integration\Parser
 */
interface FactoryInterface
{
    /**
     * Get parser
     *
     * @param string $type
     *
     * @throws \InvalidArgumentException
     * @return ParserInterface
     */
    public function getParser($type);
}

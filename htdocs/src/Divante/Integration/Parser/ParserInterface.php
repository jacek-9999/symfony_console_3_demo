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
 * Interface ParserInterface
 *
 * @package Divante\Integration\Parser
 */
interface ParserInterface
{
    /**
     * Get parser type
     *
     * @return string
     */
    public static function getType();

    /**
     * Parse content to array
     *
     * @param $content
     *
     * @return array
     */
    public function parse($content);
}

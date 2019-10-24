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
 * Class Supplier3
 *
 * @package Divante\Integration\Supplier
 */
class Supplier3 extends SupplierAbstract
{
    const NAME = 'supplier3';
    const RESPONSE_TYPE = 'json';

    /**
     * {@inheritdoc}
     */
    public static function getName()
    {
        return self::NAME;
    }

    /**
     * {@inheritdoc}
     */
    public static function getResponseType()
    {
        return self::RESPONSE_TYPE;
    }

    /**
     * {@inheritdoc}
     */
    protected function parseResponse()
    {
        $output = [];
        foreach ($this->parser->parse($this->getResponse())['list'] as $row) {
            array_push(
                $output,
                ['ID' => $row['id'], 'Name' => $row['name'], 'Desc' => '---']
            );
        }
        return $output;
    }

    /**
     * Simulate get response method
     *
     * @return string
     */
    protected function getResponse()
    {
        return file_get_contents('http://localhost/supplier3.json');
    }
}

<?php
/*
 * This file is part of the "Divante/Integration" package.
 *
 * (c) Divante Sp. z o. o.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

require __DIR__.'/../vendor/autoload.php';

use Symfony\Component\Console\Application;
use Symfony\Component\EventDispatcher\EventDispatcher;
use Divante\Integration\Command\SupplierSync;
use Divante\Integration\Supplier\Factory;
use Divante\Integration\Parser\ParserFactory;
$application = new Application();

$supplierFactory = new Factory(new ParserFactory(), new EventDispatcher());
$application->add(
    new SupplierSync(null, $supplierFactory)
);
$application->run();

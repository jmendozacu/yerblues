<?php
/**
 * Copyright © Magento, Inc. All rights reserved.
 * See COPYING.txt for license details.
 */


$fichero = 'var/log/test.log';
$actual = file_get_contents($fichero);
$actual .= "\n-------------------------\n".date('l jS \of F Y h:i:s A')."\ninstalando modulo : simplifiedMagento_firstModule \n".__DIR__;
file_put_contents($fichero, $actual);


use \Magento\Framework\Component\ComponentRegistrar;

ComponentRegistrar::register(ComponentRegistrar::MODULE, 'simplifiedMagento_firstModule', __DIR__);

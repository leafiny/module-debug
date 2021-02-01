<?php
/**
 * This file is part of Leafiny.
 *
 * Copyright (C) Magentix SARL
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare(strict_types=1);

/**
 * Class Debug_Observer_Queries
 */
class Debug_Observer_Queries extends Debug_Observer_Abstract
{
    /**
     * Execute
     *
     * @param Leafiny_Object $object
     *
     * @return void
     */
    public function execute(Leafiny_Object $object): void
    {
        if (!$this->isActive()) {
            return;
        }

        /** @var Core_Model $object */
        $object = $object->getData('object');

        $object->setCustom('db_debug', true);
    }
}

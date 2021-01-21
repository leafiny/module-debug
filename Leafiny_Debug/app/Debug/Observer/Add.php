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
 * Class Debug_Observer_Add
 */
class Debug_Observer_Add extends Debug_Observer_Abstract
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

        /** @var Leafiny_Object $object */
        $object = $object->getData('object');

        if ($object instanceof Leafiny_Object && !$object instanceof $this) {
            if ($object->getData('object_identifier') === 'debug') {
                return;
            }

            if (count($this->debugOnly())) {
                if (!in_array($object->getData('object_type'), $this->debugOnly())) {
                    return;
                }
            }

            /** @var Debug_Model_Debug $debug */
            $debug = App::getSingleton('event', 'debug');
            $debug->addObject($object);
        };
    }
}

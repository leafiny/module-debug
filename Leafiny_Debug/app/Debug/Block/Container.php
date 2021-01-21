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
 * Class Debug_Block_Container
 */
class Debug_Block_Container extends Core_Block
{
    /**
     * Retrieve all objects
     *
     * @return array
     */
    public function getObjects(): array
    {
        /** @var Debug_Model_Debug $debug */
        $debug = App::getSingleton('event', 'debug');

        return $debug->getObjects();
    }

    /**
     * Object as HTML
     *
     * @param Leafiny_Object $object
     *
     * @return string
     * @throws Twig\Error\LoaderError
     * @throws Twig\Error\RuntimeError
     * @throws Twig\Error\SyntaxError
     */
    public function objectAsHtml(Leafiny_Object $object): string
    {
        /** @var Core_Block $block */
        $block = $this->getBlock('debug.container.object');
        $block->setCustom('debug_object', $object);

        return $block->render();
    }
}

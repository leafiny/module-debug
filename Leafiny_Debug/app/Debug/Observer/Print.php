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
 * Class Debug_Observer_Print
 */
class Debug_Observer_Print extends Debug_Observer_Abstract
{
    /**
     * Execute
     *
     * @param Leafiny_Object $object
     *
     * @return void
     * @throws Twig\Error\LoaderError
     * @throws Twig\Error\RuntimeError
     * @throws Twig\Error\SyntaxError
     */
    public function execute(Leafiny_Object $object): void
    {
        if (!$this->isActive()) {
            return;
        }

        /** @var Leafiny_Object $object */
        $object = $object->getData('object');

        /** @var Debug_Block_Container $block */
        $block = App::getObject('block', 'debug.container');
        $block->setCurrentContext(Core_Template_Abstract::CONTEXT_DEFAULT);

        $object->setData('render', $object->getData('render') . $block->render());
    }
}

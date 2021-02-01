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
     * Retrieve all queries
     *
     * @return array
     */
    public function getQueries(): array
    {
        /** @var Core_Model $model */
        $model = App::getObject('model');

        try {
            return $model->getAdapter()->getQueries();
        } catch (Throwable $throwable) {
            return [];
        }
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
     * @throws Exception
     */
    public function objectAsHtml(Leafiny_Object $object): string
    {
        /** @var Core_Block $block */
        $block = $this->getBlock('debug.container.object');
        $block->setCustom('debug_object', $object);

        return $block->render();
    }

    /**
     * Object as HTML
     *
     * @param Leafiny_Object $query
     *
     * @return string
     * @throws Twig\Error\LoaderError
     * @throws Twig\Error\RuntimeError
     * @throws Twig\Error\SyntaxError
     * @throws Exception
     */
    public function queryAsHtml(Leafiny_Object $query): string
    {
        /** @var Core_Block $block */
        $block = $this->getBlock('debug.container.query');

        $params = $query->getData('params');
        if ($params) {
            array_shift($params);
            $query->setData('params', $params);
        }

        $block->setCustom('debug_query', $query);

        return $block->render();
    }
}

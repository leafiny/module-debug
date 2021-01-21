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
 * Class Debug_Observer_Abstract
 */
abstract class Debug_Observer_Abstract extends Core_Event
{
    /**
     * Retrieve debug only objects
     *
     * @return array
     */
    public function debugOnly(): array
    {
        return App::getConfig('app.debug_only') ?: [];
    }

    /**
     * Check whether debug is active
     *
     * @return bool
     */
    public function isActive(): bool
    {
        return (bool)App::getConfig('app.debug');
    }

    /**
     * Event post process
     *
     * @return void
     */
    public function postProcess(): void {}
}

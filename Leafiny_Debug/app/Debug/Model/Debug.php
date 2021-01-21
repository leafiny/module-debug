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
 * Class Debug_Model_Debug
 */
class Debug_Model_Debug extends Leafiny_Object
{
    /**
     * Collection of objects
     *
     * @var array $objects
     */
    protected $objects = [];

    /**
     * Current time
     *
     * @var float|null $time
     */
    protected $time = null;

    /**
     * Debug_Model_Debug constructor
     */
    public function __construct()
    {
        parent::__construct();

        if ($this->time === null) {
            $this->time = microtime(true);
        }
    }

    /**
     * Add Object
     *
     * @param Leafiny_Object $object
     */
    public function addObject(Leafiny_Object $object): void
    {
        $object->setData('debug_time', $this->getCurrentTime());
        $object->setData('debug_number', count($this->objects) + 1);

        $this->objects[] = $object;
    }

    /**
     * Retrieve all objects
     *
     * @return array
     */
    public function getObjects(): array
    {
        return $this->objects;
    }

    /**
     * Retrieve current time in ms
     *
     * @return float
     */
    private function getCurrentTime(): float
    {
        if ($this->time === null) {
            return 0;
        }

        return (microtime(true) - $this->time);
    }
}

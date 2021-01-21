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
 * Class Debug_Twig_Filters
 */
class Debug_Twig_Filters
{
    /**
     * Add twig filters
     *
     * @param Twig\Environment $twig
     */
    public function __construct(Twig\Environment $twig)
    {
        $twig->addFilter(new Twig\TwigFilter('debug_get_class', 'get_class'));
        $twig->addFilter(new Twig\TwigFilter('debug_print_data', [$this, 'debugData']));
    }

    /**
     * Debug data
     *
     * @param mixed $content
     *
     * @return mixed
     */
    public function debugData($content)
    {
        return print_r($content, true);
    }
}

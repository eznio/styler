<?php

namespace eznio\styler\traits;


use eznio\ar\Ar;
use eznio\styler\references\BackgroundColors;
use eznio\styler\references\ForegroundColors;

/**
 * Supports setting linux console styles for the elements
 * Style constants are defined in linux console and supported by Style helper
 * Reference constants can be found in \eznio\tabler\references namespace
 * @see http://misc.flogisoft.com/bash/tip_colors_and_formatting
 * @package eznio\styler
 */
trait StyleAware
{
    /** @var array */
    protected $styles = [];

    /**
     * Add single style line
     * @param $style
     * @return StyleAware
     */
    public function addStyle(int $style) : StyleAware
    {
        $this->styles[$style] = $style;
        return $this;
    }

    /**
     * Remove single style line
     * @param $style
     * @return StyleAware
     */
    public function removeStyle(int $style) : StyleAware
    {
        unset($this->styles[$style]);
        return $this;
    }

    /**
     * Set all styles at once
     * @param $styles
     * @return StyleAware
     */
    public function setStyles(array $styles) : StyleAware
    {
        $this->styles = array_merge($this->styles, $styles);
        return $this;
    }

    /**
     * Get all styles at once
     * @return array
     */
    public function getStyles() : array
    {
        return $this->styles;
    }

    /**
     * Set element foreground color
     * If any other fg color constant was added before - it will be removed
     * @param $color
     * @return StyleAware
     */
    public function setForegroundColor($color) : StyleAware
    {
        $this->setColor($color, ForegroundColors::ALL);
        return $this;
    }

    /**
     * Get element foreground color
     * @return int
     */
    public function getForegroundColor() : int
    {
        return $this->getColor(ForegroundColors::ALL);
    }

    /**
     * Set element background color
     * If any other bg color constant was added before - it will be removed
     * @param $color
     * @return StyleAware
     */
    public function setBackgroundColor($color) : StyleAware
    {
        $this->setColor($color, BackgroundColors::ALL);
        return $this;
    }

    /**
     * Get element background color
     * @return int
     */
    public function getBackgroundColor() : int
    {
        return $this->getColor(BackgroundColors::ALL);
    }

    /**
     * Returns first element of given reference
     * @param array $reference
     * @return int
     */
    private function getColor(array $reference) : int
    {
        return Ar::reduce($this->styles, function($item, $prevValue) use ($reference) {
            if (null !== $prevValue) {
                return $prevValue;
            }
            if (in_array($item, $reference)) {
                return $item;
            }
            return null;
        });
    }

    /**
     * Sets style and removes all other styles from given reference
     * @param $color
     * @param array $reference
     * @return StyleAware
     */
    private function setColor($color, array $reference) : StyleAware
    {
        $this->styles = Ar::reject($this->styles, function ($item) use ($reference) {
            return in_array($item, $reference);
        });
        $this->addStyle($color);
        return $this;
    }
}

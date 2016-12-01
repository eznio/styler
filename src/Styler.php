<?php

namespace eznio\styler;


/**
 * Main helper class
 * @package eznio\styler
 */
class Styler
{
    const ESCAPE_TEMPLATE = "\033[%sm";
    const STYLE_RESET_SEQUENCE = '0';

    /**
     * Returns escape string to prepend to styled text for any amount of styles
     * If several styles of one type (bg-/fg-color) are presented - last one is used
     * @param $style
     * @return string
     */
    public static function get($style)
    {
        if (is_array($style)) {
            return self::combined($style);
        }
        return self::single($style);
    }

    /**
     * Returns escape string to prepend to styling text for single style
     * @param $style
     * @return string
     */
    public static function single($style)
    {
        return sprintf(
            self::ESCAPE_TEMPLATE,
            $style
        );
    }

    /**
     * Returns escape string to prepend to styling text for multiple styles
     * @param $style
     * @return string
     */
    public static function combined($style)
    {
        return sprintf(
            self::ESCAPE_TEMPLATE,
            implode(';', $style)
        );
    }

    /**
     * Returns escape string to reset custom style to default one. Should be appended to styled text
     * @return string
     */
    public static function reset()
    {
        return self::single(self::STYLE_RESET_SEQUENCE);
    }
}

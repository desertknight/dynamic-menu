<?php

namespace Application\MainBundle\Form\Type;

class ColorType
{

    const COLOR_PURPLE = 'purple';
    const COLOR_NAVY = 'navy';
    const COLOR_YELLOW = 'yellow';
    const COLOR_GRAY = 'gray';
    const COLOR_TEAL = 'teal';
    const COLOR_OLIVE = 'olive';
    const COLOR_FUCHSIA = 'fuchsia';
    const COLOR_SILVER = 'silver';
    const COLOR_BLACK = 'black';
    const COLOR_LIME = 'lime';
    const COLOR_AQUA = 'aqua';
    const COLOR_PINK = 'pink';
    const COLOR_GREEN = 'green';
    const COLOR_MAROON = 'maroon';
    const COLOR_BLUE = 'blue';

    /**
     *
     * @var array
     */
    public static $choices = array(
        self::COLOR_PURPLE => 'Purple',
        self::COLOR_NAVY => 'Navy',
        self::COLOR_YELLOW => 'Yellow',
        self::COLOR_GRAY => 'Gray',
        self::COLOR_TEAL => 'Teal',
        self::COLOR_OLIVE => 'Olive',
        self::COLOR_FUCHSIA => 'Fuchsia',
        self::COLOR_SILVER => 'Silver',
        self::COLOR_BLACK => 'Black',
        self::COLOR_LIME => 'Lime',
        self::COLOR_AQUA => 'Aqua',
        self::COLOR_PINK => 'Pink',
        self::COLOR_GREEN => 'Green',
        self::COLOR_MAROON => 'Maroon',
        self::COLOR_BLUE => 'Blue',
    );

}

<?php

namespace eznio\db\tests\helpers;


use eznio\styler\Styler;
use eznio\styler\references\BackgroundColors;
use eznio\styler\references\ForegroundColors;
use eznio\styler\references\TextStyles;

class StylerTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @test
     * @dataProvider stylerDataProvider
     * @param $input
     * @param $expectedOutput
     */
    public function shouldReturnRightValues($input, $expectedOutput)
    {
        $styler = new Styler();

        $output = $styler->get($input);

        $this->assertEquals($expectedOutput, $output);
    }

    public function stylerDataProvider()
    {
        return [
            [
                null,
                "\033[m"
            ],
            [
                ForegroundColors::BLACK,
                "\033[30m"
            ],
            [
                BackgroundColors::RED,
                "\033[41m"
            ],
            [
                TextStyles::UNDERLINED,
                "\033[4m"
            ],
            [
                [
                    ForegroundColors::BLACK,
                    BackgroundColors::RED,
                    TextStyles::UNDERLINED
                ],
                "\033[30;41;4m"
            ]
        ];
    }
}

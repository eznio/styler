<?php

require '../vendor/autoload.php';

use \eznio\styler\Styler;
use eznio\styler\references\StyleSets as Styles;


echo Styler::get(Styles::HYPERLINK) . "test\n" . Styler::reset();
<?php

namespace WPPB\Services;

use WPPB\Core\Constants;

class I18n
{

    public static function text(string $string)
    {
        return __($string, Constants::PLUGIN_BASE_NAME);
    }
}
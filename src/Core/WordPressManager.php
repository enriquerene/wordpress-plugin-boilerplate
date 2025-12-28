<?php

namespace WPPB\Core;

class WordPressManager
{
    public static function getVersion(): string
    {
        return get_bloginfo('version');
    }
}
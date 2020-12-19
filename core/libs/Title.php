<?php

namespace FBLA;

use FBLA\Routing\Routing;

class Title {
    public static $full_title;
    public static $site_title;
    public static $page_title;

    public static function start($site_title) {

        self::$site_title = $site_title;
    }

    public static function set($page_title, $full = false) {

        self::$page_title = $page_title;

        self::$full_title = self::$page_title . ($full ? null : ' - ' . self::$site_title);

    }


    public static function get() {

        return self::$full_title;

    }

}

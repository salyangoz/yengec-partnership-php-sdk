<?php

declare(strict_types=1);

use Yengec\Options;

class Config {

    /**
     * Options Class
     * Configure and get global Options instance
     *
     * @return Options
     */
    public static function get(): Options
    {
        return new Options(
            "client-id",
            "client-secret",
            "https://api-test.yengec.co/"
        );
    }
}
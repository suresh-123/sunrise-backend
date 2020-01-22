<?php

namespace Core;

/**
 * Configuration Class
 * Set Application Configuration Details
 */
class Configuration {

    /**
     * Method used to load config_APP_ENV.php file
     * @param  string $file Path to file
     * @return Configuration Application Configuration Details
     */
    public static function load(string $file): Router {
        $config = new static;
        require_once $file;
        return $config;
    }

}

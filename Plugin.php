<?php

namespace App\Vito\Plugins\Vitodeploy\PluginTemplate;

use App\Plugins\AbstractPlugin;
use App\Plugins\RegisterServiceType;
class AltPhpPlugin extends AbstractPlugin
{
    protected string $name = 'Tuxcare Php els extension';

    protected string $description = 'php plugin for vitodeploy tuxcare php';

    public function boot(): void
    {
        // Register plugin features here
            // https://vitodeploy.com/docs/plugins
// Register alt-php 7.3 as an example 
        RegisterServiceType::make('alt-php73')
        ->type('php')
        ->label('alt-php 7.3')
        ->handler(\App\Services\PHP\PHP::class)   
        ->versions(['7.3'])                       // just this one version
        ->data([
                'cli_binary' => '/opt/alt/php73/usr/bin/php',     // typical CloudLinux path
                'fpm_binary' => '/opt/alt/php73/usr/sbin/php-fpm',
                'fpm_socket' => '/var/run/alt-php73.sock',        // or adjust to your setup
                'extensions' => [
                        'imagick', 'exif', 'gd', 'intl', 'opcache', 'pdo_mysql', /* etc */
                ],
                'ini_path' => '/opt/alt/php73/etc/php.ini',       // or /etc/cl.selector/
                'fpm_pool_path' => '/etc/php-fpm.d/www.conf',     // usually per-version in alt-php
                'is_default' => true
        ])
        ->register();



    }
}

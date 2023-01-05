<?php

namespace Config;

use CodeIgniter\Config\BaseConfig;
use CodeIgniter\Filters\CSRF;
use CodeIgniter\Filters\DebugToolbar;
use CodeIgniter\Filters\Honeypot;
use CodeIgniter\Filters\InvalidChars;
use CodeIgniter\Filters\SecureHeaders;

class Filters extends BaseConfig
{
    /**
     * Configures aliases for Filter classes to
     * make reading things nicer and simpler.
     *
     * @var array
     */
    public $aliases = [
        'csrf'          => CSRF::class,
        'toolbar'       => DebugToolbar::class,
        'honeypot'      => Honeypot::class,
        'invalidchars'  => InvalidChars::class,
        'secureheaders' => SecureHeaders::class,
        'filteradmin' => \App\Filters\FilterAdmin::class,
        'filterpengguna' => \App\Filters\FilterPengguna::class,
    ];

    /**
     * List of filter aliases that are always
     * applied before and after every request.
     *
     * @var array
     */
    public $globals = [
        'before' => [
            'filteradmin' => ['except' => [
                'auth', 'auth/*',
                'home', 'home/*',
                'deteksi', 'deteksi/*',
                'penularan', 'penularan/*',
                '/'
            ]],
            'filterpengguna' => ['except' => [
                'auth', 'auth/*',
                'home', 'home/*',
                'deteksi', 'deteksi/*',
                'penularan', 'penularan/*',
                '/'
            ]]
            // 'honeypot',
            // 'csrf',
            // 'invalidchars',
        ],
		'after'  => [
            'filteradmin' => ['except' => [
                'home', 'home/*',
                'deteksi', 'deteksi/*',
                '/',
                'admin', 'admin/*',
                'gejala', 'gejala/*',
                'subgejala', 'subgejala/*',
                'himpunan', 'himpunan/*',
                'aturan', 'aturan/*',
                'solusi', 'solusi/*',
                'pengguna', 'pengguna/*',
                'penularan', 'penularan/*',
            ]],
            'filterpengguna' => ['except' => [
                'auth', 'auth/*',
                'home', 'home/*',
                'deteksi', 'deteksi/*',
                'penularan', 'penularan/*',
                '/'
            ]],
			// 'honeypot',
            'toolbar',
        ],
    ];

    /**
     * List of filter aliases that works on a
     * particular HTTP method (GET, POST, etc.).
     *
     * Example:
     * 'post' => ['csrf', 'throttle']
     *
     * @var array
     */
    public $methods = [];

    /**
     * List of filter aliases that should run on any
     * before or after URI patterns.
     *
     * Example:
     * 'isLoggedIn' => ['before' => ['account/*', 'profiles/*']]
     *
     * @var array
     */
    public $filters = [];
}

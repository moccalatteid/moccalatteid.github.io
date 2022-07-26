<?php

namespace Config;

use CodeIgniter\Config\BaseConfig;
use CodeIgniter\Filters\CSRF;
use CodeIgniter\Filters\DebugToolbar;
use CodeIgniter\Filters\Honeypot;

class Filters extends BaseConfig
{
	/**
	 * Configures aliases for Filter classes to
	 * make reading things nicer and simpler.
	 *
	 * @var array
	 */
	public $aliases = [
		'csrf'     => CSRF::class,
		'toolbar'  => DebugToolbar::class,
		'honeypot' => Honeypot::class,
		'filteradmin' => \App\Filters\FilterAdmin::class,
		'filterdosen' => \App\Filters\FilterDosen::class,
		'filtermahasiswa' => \App\Filters\FilterMahasiswa::class,
	];

	/**
	 * List of filter aliases that are always
	 * applied before and after every request.
	 *
	 * @var array
	 */
	public $globals = [
		'before' => [
			// 'honeypot',
			// 'csrf',
			// 'login'
			'filteradmin' => ['except' => [
				'login', 'login/*',
				'pages', 'pages/*',
				'download', 'download/*',
				'/'
			]],
			'filterdosen' => ['except' => [
				'login', 'login/*',
				'pages', 'pages/*',
				'download', 'download/*',
				'/'
			]],
			'filtermahasiswa' => ['except' => [
				'login', 'login/*',
				'pages', 'pages/*',
				'download', 'download/*',
				'/'
			]]
		],
		'after'  => [
			'filteradmin' => ['except' => [
				'sita', 'sita/*',
				'admin', 'admin/*',
			]],
			'filterdosen' => ['except' => [
				'sita', 'sita/*',
				'dosen', 'dosen/*',
			]],
			'filtermahasiswa' => ['except' => [
				'sita', 'sita/*',
				'mahasiswa', 'mahasiswa/*',
			]],
			'toolbar'
			// 'honeypot',
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

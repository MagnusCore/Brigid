<?php
namespace MagnusApp {
	spl_autoload_register(function ($className) {

		$className = str_replace("\\", '/', $className);
		$vendors   = dirname(__DIR__) . '/vendor/';
		$appDir   = __DIR__ . '/app/';
		$sourceDir = dirname(dirname(dirname(__DIR__)));

		if (file_exists($vendors . $className . '.php')) {
			require_once $vendors . $className . '.php';
		} elseif (file_exists($appDir . $className . '.php')) {
			require_once $appDir . $className . '.php';	
		} else if (file_exists(__DIR__ . '/' . $className . '.php')) {
			require_once __DIR__ . '/' . $className . '.php';
		} else if (file_exists(__DIR__ . '/vendor/' . $className . '.php')) {
			require_once __DIR__ . '/vendor/' . $className . '.php';
		} else if (file_exists($sourceDir . '/' . $className . '.php')) {
			require_once $sourceDir . '/' . $className . '.php';
		}
		
	});
}
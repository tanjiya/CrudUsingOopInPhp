<?php

spl_autoload_register(function($className) {
	$file = 'classes/' . $className . '.php';
	if (file_exists($file)) {
		include $file;
	}
});
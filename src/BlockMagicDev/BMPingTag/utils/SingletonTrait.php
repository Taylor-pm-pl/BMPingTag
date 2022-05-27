<?php

declare(strict_types=1);

namespace BlockMagicDev\BMPingTag\utils;

use BlockMagicDev\BMPingTag\BMPingTag;

trait SingletonTrait {
	public static BMPingTag $instance;

	public static function setInstance(BMPingTag $instance) : void {
		self::$instance = $instance;
	}

	public static function getInstance() : BMPingTag {
		return self::$instance;
	}
}
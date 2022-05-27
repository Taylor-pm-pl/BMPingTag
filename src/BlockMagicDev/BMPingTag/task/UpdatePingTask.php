<?php

declare(strict_types=1);

namespace BlockMagicDev\BMPingTag\task;

use BlockMagicDev\BMPingTag\BMPingTag;
use pocketmine\scheduler\Task;

class UpdatePingTask extends Task {
	protected BMPingTag $plugin;

	public function __construct(BMPingTag $plugin) {
		$this->plugin = $plugin;
	}

	public function onRun() : void {
		$this->plugin->updatePing();
	}
}
<?php

declare(strict_types=1);

namespace NoobMCBG\RoyalPingTag\task;

use pocketmine\scheduler\Task;
use NoobMCBG\RoyalPingTag\RoyalPingTag;

class UpdatePingTask extends Task {

	private RoyalPingTag $plugin;

	public function __construct(RoyalPingTag $plugin){
		$this->plugin = $plugin;
	}

	public function onRun() : void {
		$this->plugin->updatePing();
	}
}
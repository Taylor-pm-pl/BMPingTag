<?php

declare(strict_types=1);

namespace BlockMagicDev\BMPingTag;

use pocketmine\event\entity\EntityDamageByEntityEvent;
use pocketmine\event\Listener;
use pocketmine\event\player\PlayerJoinEvent;

class EventListener implements Listener {
	protected BMPingTag $plugin;

	public function __construct(BMPingTag $plugin) {
		$this->plugin = $plugin;
	}

	public function onJoin(PlayerJoinEvent $event) {
		$this->plugin->updatePing();
	}


	public function onDamage(EntityDamageByEntityEvent $event) {
		$this->plugin->updatePing();
	}
}
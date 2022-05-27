<?php

declare(strict_types=1);

namespace BlockMagicDev\BMPingTag;

use BlockMagicDev\BMPingTag\commands\BMPingTagCommands;
use BlockMagicDev\BMPingTag\task\UpdatePingTask;
use BlockMagicDev\BMPingTag\utils\SingletonTrait;
use pocketmine\event\Listener;
use pocketmine\plugin\PluginBase;
use pocketmine\utils\TextFormat;
use function str_replace;
use function strval;

class BMPingTag extends PluginBase implements Listener {
	use SingletonTrait;

	public function onLoad() : void {
		$this->setInstance($this);
	}

	public function onEnable() : void {
		$this->getServer()->getPluginManager()->registerEvents(new EventListener($this), $this);
		$this->saveDefaultConfig();
		$this->getServer()->getCommandMap()->register("RoyalPingTag", new BMPingTagCommands($this));
		$this->getScheduler()->scheduleRepeatingTask(new UpdatePingTask($this), 20 * $this->getConfig()->get("update-ping-interval"));
	}

	public function updatePing() : bool {
		foreach ($this->getServer()->getOnlinePlayers() as $player) {
			$player->setScoreTag(str_replace(
				["{ping}", "{line}", "§0", "§1", "§2", "§3", "§4", "§5", "§6", "§7", "§8", "§9", "§a", "§b", "§c", "§d", "§e", "§0", "§f", "§k", "§l", "§o"],
				[$player->getNetworkSession()->getPing(), "\n", TextFormat::BLACK, TextFormat::DARK_BLUE, TextFormat::DARK_GREEN, TextFormat::DARK_AQUA, TextFormat::DARK_RED, TextFormat::DARK_PURPLE, TextFormat::GOLD, TextFormat::GRAY, TextFormat::DARK_GRAY, TextFormat::BLUE, TextFormat::GREEN, TextFormat::AQUA, TextFormat::RED, TextFormat::LIGHT_PURPLE, TextFormat::YELLOW, TextFormat::WHITE, TextFormat::OBFUSCATED, TextFormat::BOLD, TextFormat::ITALIC],
				strval($this->getConfig()->get("tag-format"))));
			return true;
		}
		return true;
	}

	public function setCustomFormat(string $args) : void {
		$this->getConfig()->set("tag-format", $args);
		$this->getConfig()->save();
	}
}

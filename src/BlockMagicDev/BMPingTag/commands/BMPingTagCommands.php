<?php

declare(strict_types=1);

namespace BlockMagicDev\BMPingTag\commands;

use BlockMagicDev\BMPingTag\BMPingTag;
use pocketmine\command\Command;
use pocketmine\command\CommandSender;
use pocketmine\plugin\PluginOwned;
use function array_shift;
use function implode;

class BMPingTagCommands extends Command implements PluginOwned {
	private BMPingTag $plugin;

	public function __construct(BMPingTag $plugin) {
		$this->plugin = $plugin;
		parent::__construct("bmpingtag", "Ping Tag Commands", null, ["pt", "pingtag"]);
		$this->setPermission("bmpingtag.command");
	}

	public function execute(CommandSender $sender, string $label, array $args) {
		if (!isset($args[0])) {
			$sender->sendMessage("§cUsage:§7 /bmpingtag help");
			return true;
		}
		switch ($args[0]) {
			case "help":
			case "?":
				$sender->sendMessage("§a> BMPingTag Usage <");
				$sender->sendMessage("§a> /bmpingtag help §7- Display RoyalPingTag commands");
				$sender->sendMessage("§a> /bmpingtag setcustomformat §7- Set custom format tag");
			break;
			case "setcustomformat":
			case "setformat":
			case "scfm":
			case "sfm":
			case "format":
				if (!isset($args[1])) {
					$sender->sendMessage("§cUsage:§7 /bmpingtag setcustomformat <format>");
					return true;
				} else {
					array_shift($args);
					$this->getOwningPlugin()->setCustomFormat(implode(" ", $args));
					$sender->sendMessage("§a> Ping format has been updated");
				}
			break;
			default:
				$sender->sendMessage("§cUsage:§7 /bmpingtag help");
			break;
		}
	}

	public function getOwningPlugin() : BMPingTag {
		return $this->plugin;
	}
}
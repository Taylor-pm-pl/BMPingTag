<?php

declare(strict_types=1);

namespace RoyalNoobMCBG\RoyalPingTag\commands;

use pocketmine\plugin\PluginOwned;
use pocketmine\command\Command;
use pocketmine\command\CommandSender;
use RoyalNoobMCBG\RoyalPingTag\RoyalPingTag;

class RoyalPingTagCommands extends Command implements PluginOwned {

	private RoyalPingTag $plugin;

	public function __construct(RoyalPingTag $plugin){
		$this->plugin = $plugin;
		parent::__construct("royalpingtag", "Ping Tag Commands", null, ["rpt", "rpingtag", "pingtag"]);
		$this->setPermission("royalpingtag.command");
	}

	public function execute(CommandSender $sender, string $label, array $args){
		if(!isset($args[0])){
            $sender->sendMessage("§cUsage:§7 /royalpingtag help");
            return true;
		}
		switch($args[0]){
			case "help":
			case "?":
                $sender->sendMessage("§a> RoyalPingTag Usage <");
			    $sender->sendMessage("§a> /royalpingtag help §7- Display RoyalPingTag commands");
                $sender->sendMessage("§a> /royalpingtag setcustomformat §7- Set custom format tag");
            break;
            case "setcustomformat":
            case "setformat":
            case "scfm":
            case "sfm":
            case "format":
                if(!isset($args[1])){
                	$sender->sendMessage("§cUsage:§7 /royalpingtag setcustomformat <format>");
                	return true;
                }else{
                	array_shift($args);
                    $this->getOwningPlugin()->setCustomFormat(implode(" ", $args));
                    $sender->sendMessage("§a> Ping format has been updated");
                }
            break;
            default:
                $sender->sendMessage("§cUsage:§7 /royalpingtag help");
            break;
		}
	}

	public function getOwningPlugin() : RoyalPingTag {
		return $this->plugin;
	}
}
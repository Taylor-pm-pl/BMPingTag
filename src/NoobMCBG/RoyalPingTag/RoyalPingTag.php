<?php

declare(strict_types=1);

namespace NoobMCBG\RoyalPingTag;

use pocketmine\player\Player;
use pocketmine\plugin\PluginBase;
use pocketmine\event\Listener;
use pocketmine\command\CommandSender;
use pocketmine\utils\TextFormat;
use NoobMCBG\RoyalPingTag\commands\RoyalPingTagCommands;
use NoobMCBG\RoyalPingTag\task\UpdatePingTask;
use NoobMCBG\RoyalPingTag\task\CheckUpdateTask;

class RoyalPingTag extends PluginBase implements Listener {

	public static $instance;

	public static function getInstance() : self {
		return self::$instance;
	}

	public function onEnable() : void {
		$this->getServer()->getPluginManager()->registerEvents(new EventListener($this), $this);
		$this->saveDefaultConfig();
		$this->checkUpdate();
		$this->getServer()->getCommandMap()->register("RoyalPingTag", new RoyalPingTagCommands($this));
		$this->getScheduler()->scheduleRepeatingTask(new UpdatePingTask($this), 20 * $this->getConfig()->get("update-ping-interval"));
        self::$instance = $this;
	}

	public function checkUpdate(bool $isRetry = false) : void {
        $this->getServer()->getAsyncPool()->submitTask(new CheckUpdateTask($this->getDescription()->getName(), $this->getDescription()->getVersion()));
    }

    public function updatePing(){
    	foreach($this->getServer()->getOnlinePlayers() as $player){
    		if(!$player instanceof Player){
    			return true;
    		}
    		$player->setScoreTag(str_replace(
    			["{ping}", "{line}", "§0", "§1", "§2", "§3", "§4", "§5", "§6", "§7", "§8", "§9", "§a", "§b", "§c", "§d", "§e", "§0", "§f", "§k", "§l", "§o"],
    			[$player->getNetworkSession()->getPing(), "\n", TextFormat::BLACK, TextFormat::DARK_BLUE, TextFormat::DARK_GREEN, TextFormat::DARK_AQUA, TextFormat::DARK_RED, TextFormat::DARK_PURPLE, TextFormat::GOLD, TextFormat::GRAY, TextFormat::DARK_GRAY, TextFormat::BLUE, TextFormat::GREEN, TextFormat::AQUA, TextFormat::RED, TextFormat::LIGHT_PURPLE, TextFormat::YELLOW, TextFormat::WHITE, TextFormat::OBFUSCATED, TextFormat::BOLD, TextFormat::ITALIC],
    			strval($this->getConfig()->get("tag-format"))));
    	}
    }

    public function setCustomFormat($args){
    	$this->getConfig()->set("tag-format", $args);
    	$this->getConfig()->save();
    }
}

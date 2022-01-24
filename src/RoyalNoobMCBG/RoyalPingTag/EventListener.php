<?php

declare(strict_types=1);

namespace RoyalNoobMCBG\RoyalPingTag;

use pocketmine\event\Listener;
use pocketmine\event\player\PlayerJoinEvent;
use pocketmine\event\entity\EntityDamageByEntityEvent;
use RoyalNoobMCBG\RoyalPingTag\RoyalPingTag;

class EventListener implements Listener {
	
	public $plugin;
	
	/** 
	* @param RoyalPingTag $plugin 
	*/
	public function __construct(RoyalPingTag $plugin)
	{
		$this->plugin = $plugin;
	}
    /**
    * @param PlayerJoinEvent $event
    */
	public function onJoin(PlayerJoinEvent $event){
        $this->plugin->updatePing();
	}
    
    /**
    * @param EntityDamageByEntityEvent $event
    */
	public function onDamage(EntityDamageByEntityEvent $event){
		$this->plugin->updatePing();
	}
}
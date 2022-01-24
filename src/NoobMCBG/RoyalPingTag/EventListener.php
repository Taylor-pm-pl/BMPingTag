<?php

declare(strict_types=1);

namespace NoobMCBG\RoyalPingTag;

use pocketmine\event\Listener;
use pocketmine\event\player\PlayerJoinEvent;
use pocketmine\event\entity\EntityDamageByEntityEvent;
use NoobMCBG\RoyalPingTag\RoyalPingTag;

class EventListener implements Listener {

    /**
    * @param PlayerJoinEvent $event
    */
	public function onJoin(PlayerJoinEvent $event){
        RoyalPingTag::getInstance()->updatePing();
	}
    
    /**
    * @param EntityDamageByEntityEvent $event
    */
	public function onDamage(EntityDamageByEntityEvent $event){
		RoyalPingTag::getInstance()->updatePing();
	}
}
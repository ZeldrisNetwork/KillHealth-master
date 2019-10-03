<?php

namespace Hader\KillHealth;

use pocketmine\event\entity\EntityDamageByEntityEvent;
use pocketmine\event\Listener;
use pocketmine\event\player\PlayerDeathEvent;
use pocketmine\plugin\PluginBase;
use pocketmine\utils\TextFormat;

class Main extends PluginBase implements Listener {

    public function onEnable() {
        $this->getServer()->getPluginManager()->registerEvents($this, $this);
        $this->getLogger()->info(str_repeat("=", 42));
        $this->getLogger()->info(TextFormat::BLUE . "KillHealth " . TextFormat::GREEN . "is now enabled!");
        $this->getLogger()->info(TextFormat::YELLOW . "Developer: " . TextFormat::GOLD . "Hader");
        $this->getLogger()->info(str_repeat("=", 42));
    }

    /**
     * @param PlayerDeathEvent $event
     */
    public function onDeath(PlayerDeathEvent $event): void {
        $cause = $event->getEntity()->getLastDamageCause();
        if ($cause instanceof EntityDamageByEntityEvent) {
            $killer = $cause->getDamager();
            $killer->setHealth(20);
        }
    }

    public function onDisable() {
        $this->getLogger()->info(str_repeat("=", 42));
        $this->getLogger()->info(TextFormat::BLUE . "KillHealth " . TextFormat::DARK_RED . "is now disabled!");
        $this->getLogger()->info(TextFormat::YELLOW . "Developer: " . TextFormat::GOLD . "Hader");
        $this->getLogger()->info(str_repeat("=", 42));
    }
}

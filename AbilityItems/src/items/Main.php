<?php

namespace items;

use pocketmine\plugin\PluginBase;
use pocketmine\plugin\PluginException;
use ReflectionException;
use pocketmine\event\Listener;
use pocketmine\data\bedrock\EffectIdMap;
use pocketmine\data\bedrock\EffectIds;
use pocketmine\event\player\PlayerInteractEvent;
use pocketmine\utils\TextFormat as TE;
use pocketmine\item\item;
use pocketmine\item\ItemIds;
use pocketmine\entity\{Effect, EffectInstance};
use pocketmine\entity\{InvisibilityEffect, VanillaEffects, RegenerationEffect};

class Main extends PluginBase {

    public $gcooldown = [];

    public function onEnable()
    {

        $this->getPluginManager()->registerEvents($this, $this);

    }

    public function onItems(PlayerInteractEvent $ev)
    {

        $player = $ev->getPlayer();
        $item = $ev->getItem();

        if($item->getCustomName() === "§r§l§cStrenghtAbility"){ 
  
        $item->setLore(["§7Get Strenght!"]);

            if (!isset($this->gcooldown[$player->getName()])) {

                $this->gcooldown[$player->getName()] = time() + 60;

                $player->addEffect((new EffectInstance(VanillaEffects::STRENGTH()))->setDuration(20 * 8)->setAmplifier(1)->setVisible(true));
                $player->sendMessage("§aYou got §eStrength");

            } else if (time() <= $this->gcooldown[$player->getName()]) {

                $reaming = $this->gcooldown[$player->getName()] - time();
                $player->sendMessage("§aYou have §a§lAbility time, §await" . $reaming);

            } else {

                unset($this->gcooldown[$player->getName()]);

            }
        }
        if($item->getCustomName() === "§r§l§cResistanceAbility"){{
        
        $item->setLore(["§7Get Resistance!"]);

            if (!isset($this->gcooldown[$player->getName()])) {

                $this->gcooldown[$player->getName()] = time() + 60;

                $player->addEffect((new EffectInstance(VanillaEffects::RESISTANCE))->setDuration(20 * 5)->setAmplifier(2)->setVisible(true));
                $player->sendMessage("§aYou got §eResistance");

            } else if (time() <= $this->gcooldown[$player->getName()]) {

                $reaming = $this->gcooldown[$player->getName()] - time();
                $player->sendMessage("§aYou have §a§lAbility time, §await" . $reaming);

            } else {

                unset($this->gcooldown[$player->getName()]);

            }
        }

        if($item->getCustomName() === "§r§l§cInvisibilityAbility"){{
        
        $item->setLore(["§7Get Invisibility!"]);

            if (!isset($this->gcooldown[$player->getName()])) {

                $this->gcooldown[$player->getName()] = time() + 60;

                $player->addEffect((new EffectInstance(VanillaEffects::INVISIBILITY))->setDuration(20 * 5)->setAmplifier(2)->setVisible(true));
                $player->sendMessage("§aYou got §eInvisibility");

            } else if (time() <= $this->gcooldown[$player->getName()]) {

                $reaming = $this->gcooldown[$player->getName()] - time();
                $player->sendMessage("§aYou have §a§lAbility time, §await" . $reaming);

            } else {

                unset($this->gcooldown[$player->getName()]);
            }
        }
        if($item->getCustomName() === "§r§l§cRegenerationAbility"){{
        
        $item->setLore(["§7Get Regeneration!"]);

            if (!isset($this->gcooldown[$player->getName()])) {

                $this->gcooldown[$player->getName()] = time() + 60;

                $player->addEffect((new EffectInstance(VanillaEffects::RESISTANCE))->setDuration(20 * 5)->setAmplifier(2)->setVisible(true));
                $player->sendMessage("§aYou got §eRegeneration");

            } else if (time() <= $this->gcooldown[$player->getName()]) {

                $reaming = $this->gcooldown[$player->getName()] - time();
                $player->sendMessage("§aYou have §a§lAbility time, §await" . $reaming);

            } else {

                unset($this->gcooldown[$player->getName()]);
            }
        }
    }  
}

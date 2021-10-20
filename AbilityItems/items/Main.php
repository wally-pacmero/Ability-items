<?php

namespace items\Main;

use pocketmine\plugin\PluginBase;

use pocketmine\event\Listener;

use pocketmine\event\player\PlayerInteractEvent;
use pocketmine\utils\TextFormat as TE;
use pocketmine\item\item;
use pocketmine\item\ItemIds;
use pocketmine\entity\{Effect, EffectInstance};

class Main extends PluginBase {

    public $gcooldown = [];

    public function onEnable()
    {

        $this->getServer()->getPluginManager()->registerEvents($this, $this);

    }

    public function onItems(PlayerInteractEvent $ev)
    {

        $player = $ev->getPlayer();
        $item = $ev->getItem();

        if ($item->getID() == 377) {
        $item->setCustomName ("§r§l§cStrenghtAbility");
        $item->setLore(["§7Get Strenght!"]);

            if (!isset($this->gcooldown[$player->getName()])) {

                $this->gcooldown[$player->getName()] = time() + 60;

                $player->addEffect((new EffectInstance(Effect::getEffect(Effect::STRENGTH)))->setDuration(20 * 8)->setAmplifier(1)->setVisible(true));
                $player->sendMessage("§aYou got §eStrength");

            } else if (time() <= $this->gcooldown[$player->getName()]) {

                $reaming = $this->gcooldown[$player->getName()] - time();
                $player->sendMessage("§aYou have §a§lAbility time, §await" . $reaming);

            } else {

                unset($this->gcooldown[$player->getName()]);

            }
        }
        if($item->getId() == 265){
        $item->setCustomName ("§r§l§cResistanceAbility");
        $item->setLore(["§7Get Resistance!"]);

            if (!isset($this->gcooldown[$player->getName()])) {

                $this->gcooldown[$player->getName()] = time() + 60;

                $player->addEffect((new EffectInstance(Effect::getEffect(Effect::RESISTANCE)))->setDuration(20 * 5)->setAmplifier(2)->setVisible(true));
                $player->sendMessage("§aYou got §eResistance");

            } else if (time() <= $this->gcooldown[$player->getName()]) {

                $reaming = $this->gcooldown[$player->getName()] - time();
                $player->sendMessage("§aYou have §a§lAbility time, §await" . $reaming);

            } else {

                unset($this->gcooldown[$player->getName()]);

            }
        }

        if($item->getId() == 399){
        $item->setCustomName ("§r§l§cInvisibilityAbility");
        $item->setLore(["§7Get Invisibility!"]);

            if (!isset($this->gcooldown[$player->getName()])) {

                $this->gcooldown[$player->getName()] = time() + 60;

                $player->addEffect((new EffectInstance(Effect::getEffect(Effect::INVISIBILITY)))->setDuration(20 * 5)->setAmplifier(2)->setVisible(true));
                $player->sendMessage("§aYou got §eInvisibility");

            } else if (time() <= $this->gcooldown[$player->getName()]) {

                $reaming = $this->gcooldown[$player->getName()] - time();
                $player->sendMessage("§aYou have §a§lAbility time, §await" . $reaming);

            } else {

                unset($this->gcooldown[$player->getName()]);
            }
        }
        if($item->getId() == 288){
        $item->setCustomName ("§r§l§cRegenerationAbility");
        $item->setLore(["§7Get Regeneration!"]);

            if (!isset($this->gcooldown[$player->getName()])) {

                $this->gcooldown[$player->getName()] = time() + 60;

                $player->addEffect((new EffectInstance(Effect::getEffect(Effect::REGENERATION)))->setDuration(20 * 5)->setAmplifier(2)->setVisible(true));
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

?>

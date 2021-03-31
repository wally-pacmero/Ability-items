<?php

namespace Items\Main;

use pocketmine\plugin\PluginBase;

use pocketmine\event\Listener;

use pocketmine\event\player\PlayerInteractEvent;

use pocketmine\entity\Effect;
use pocketmine\entity\EffectInstance;


class Main extends PluginBase implements Listener
{

    public $gcooldown = [];

    public function onEnable()
    {

        $this->getServer()->getPluginManager()->registerEvents($this, $this);
        $this->getServer()->getLogger()->info("[Unknown] AbilityItems » was loaded successfully!");

    }

    public function onItems(PlayerInteractEvent $ev)
    {

        $player = $ev->getPlayer();
        $item = $ev->getItem();

        if ($item->getID() == 377) {

            if (!isset($this->gcooldown[$player->getName()])) {

                $this->gcooldown[$player->getName()] = time() + 60;

                $player->addEffect((new EffectInstance(Effect::getEffect(Effect::STRENGTH)))->setDuration(20 * 8)->setAmplifier(1)->setVisible(true));
                $player->sendMessage("§aYou got §eStrength");

            } else if (time() < $this->gcooldown[$player->getName()]) {

                $reaming = $this->gcooldown[$player->getName()] - time();
                $player->sendMessage("§aYou have §a§lAbility time, §await" . $reaming);

            } else {

                unset($this->gcooldown[$player->getName()]);

            }
        }
        if($item->getId() == 265){

            if (!isset($this->gcooldown[$player->getName()])) {

                $this->gcooldown[$player->getName()] = time() + 60;

                $player->addEffect((new EffectInstance(Effect::getEffect(Effect::RESISTANCE)))->setDuration(20 * 5)->setAmplifier(2)->setVisible(true));
                $player->sendMessage("§aYou got §eResistance");

            } else if (time() < $this->gcooldown[$player->getName()]) {

                $reaming = $this->gcooldown[$player->getName()] - time();
                $player->sendMessage("§aYou have §a§lAbility time, §await" . $reaming);

            } else {

                unset($this->gcooldown[$player->getName()]);

            }
        }

    }
}

?>

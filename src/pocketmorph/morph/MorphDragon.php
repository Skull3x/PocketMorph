<?php
namespace pocketmorph\morph;
use pocketmine\network\protocol\AddEntityPacket;
use pocketmine\Player;
class MorphDragon extends Morph implements MorphEntity
{
    const NETWORK_ID = 53;
    public function getName()
    {
        return "Dragon";
    }
    public function spawnTo(Player $player)
    {
        $pk = new AddEntityPacket();
        $pk->eid = $this->getId();
        $pk->type = self::NETWORK_ID;
        $pk->x = $this->x;
        $pk->y = $this->y;
        $pk->z = $this->z;
        $pk->yaw = $this->yaw;
        $pk->pitch = $this->pitch;
        $pk->metadata = $this->dataProperties;      
      $player->dataPacket($pk);
        parent::spawnTo($player);
    }
}

<?php

namespace pawarenessc\spawnparticle;

use pocketmine\plugin\PluginBase;

use pocketmine\event\Listener;

use pocketmine\Player;

use pocketmine\Server;

use pocketmine\level\Level;
use pocketmine\level\Position;
use pocketmine\level\particle\DustParticle;

use pocketmine\math\Vector3;


class Main extends pluginBase implements Listener{

public function onEnable() {



 $this->getLogger()->info("=========================");

 $this->getLogger()->info("SpawnParticleを読み込みました");

 $this->getLogger()->info("v0.1");

 $this->getLogger()->info("=========================");

 $this->getScheduler()->scheduleRepeatingTask(new CallbackTask([$this, "particle"]), 10);
 
 }
 
 public function particle(){

 $level = $this->getServer()->getDefaultLevel();
 $pos = $level->getSafeSpawn();
 $count = 100;
 $particle = new DustParticle($pos, mt_rand(), mt_rand(), mt_rand(), mt_rand());
  for($yaw = 0, $y = $pos->y; $y < $pos->y + 4; $yaw += (M_PI * 2) / 20, $y += 1 / 20){
   $x = -sin($yaw) + $pos->x;
   $z = cos($yaw) + $pos->z;
   $particle->setComponents($x, $y, $z);
   $level->addParticle($particle);
   }
  }
 }

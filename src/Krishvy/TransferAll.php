<?php

declare(strict_types=1);

namespace Krishvy;

use pocketmine\plugin\PluginBase;

class TransferAll extends PluginBase
{
    public function onEnable(): void
    {
        $this->getServer()->getCommandMap()->register("transferall", new TransferAllCommand($this));
    }
}

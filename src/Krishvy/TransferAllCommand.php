<?php

declare(strict_types=1);

namespace Krishvy;

use pocketmine\command\Command;
use pocketmine\command\CommandSender;
use pocketmine\player\Player;
use pocketmine\Server;
use pocketmine\utils\TextFormat;

class TransferAllCommand extends Command
{
    public function __construct()
    {
        parent::__construct("transferall", "Transfer all online players to another server!");
        $this->setPermission("transferall.command");
    }

    public function execute(CommandSender $sender, string $commandLabel, array $args): bool
    {
        if (!$sender instanceof Player){
            return true;
        }
        if (!$this->testPermission($sender)){
            return true;
        }
        if(!isset($args[0])){
            $sender->sendMessage(TextFormat::RED."Usage: /transferall <ip> [port]");
            return true;
        }
        foreach(Server::getInstance()->getOnlinePlayers() as $players)
        {
            $players->transfer($args[0], (int) ($args[1] ?? 19132));
        }

        return true;
    }
}
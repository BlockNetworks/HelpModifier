<?php

declare(strict_types=1);

namespace VersionModifier;

use pocketmine\command\Command;
use pocketmine\command\CommandSender;
use pocketmine\plugin\PluginBase;
use pocketmine\event\Listener;
use pocketmine\utils\TextFormat;
use pocketmine\utils\Config;
use pocketmine\event\player\PlayerCommandPreprocessEvent;

class Main extends PluginBase implements Listener
{

    public $config;

    public function dataPath()
    {
        return $this->getDataFolder();
    }

    public function onEnable() : void
    {
        $this->getServer()->getPluginManager()->registerEvents($this, $this);

        @mkdir($this->dataPath());

        $this->config = new Config(
            $this->dataPath() . "config.yml",
            Config::YAML,
            [
                "enable-version" => true,
                "page_1" => [
                    [
                        "message_1" => "This server is running PocketMine-MP version v1.16.100"
                    ]
                ]
            ]
        );
    }

    public function onDisable() : void
    {
        $this->config->save();
    }

    public function sendHelp(PlayerCommandPreprocessEvent $event)
    {
        $command = explode(" ", strtolower($event->getMessage()));
        $player = $event->getPlayer();
        if ($command[0] == "/version" || $command[0] == "/ver" || $command[0] == "/about") {
            if ($this->config->get("enable-version") == false) {
                return;
            }
            $pageOneMessages = $this->config->get("page_1");
            $player->sendMessage($pageOneMessages["message_1"]);
            $event->setCancelled();
        }
    }

    public function onCommand(CommandSender $sender, Command $command, string $label, array $args) : bool
    {
        switch ($command->getName()) {
            case "enableversion":
                if ($sender->hasPermission("version.enable")) {
                    if ($this->config->get("enable-version") == true) {
                        $sender->sendMessage(TextFormat::RED . "Customized version is already enabled");
                    } else if ($this->config->get("enable-version") == false) {
                        $this->config->set("enable-version", true);
                        $this->config->save();
                        $sender->sendMessage(TextFormat::GREEN . "Customized version has been enabled");
                    }
                } else {
                    $sender->sendMessage(TextFormat::RED . "You do not have permission to run this command");
                }
                break;
            case "disableversion":
                if ($sender->hasPermission("version.disable")) {
                    if ($this->config->get("enable-version") == false) {
                        $sender->sendMessage(TextFormat::RED . "Customized version is already disabled");
                    } else if ($this->config->get("enable-version") == true) {
                        $this->config->set("enable-version", false);
                        $this->config->save();
                        $sender->sendMessage(TextFormat::GREEN . "Customized version has been disabled");
                    }
                } else {
                    $sender->sendMessage(TextFormat::RED . "You do not have permission to run this command");
                }
                break;
        }
        return true;
    }

}

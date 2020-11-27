<?php

declare(strict_types=1);

namespace HelpModifier;

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
                "enable-help" => true,
                "page_1" => [
                    "message_1" => "first message here",
                    "message_2" => "second message here",
                    "message_3" => "third message here",
                    "message_4" => "fourth message here",
                    "message_5" => "fifth message here",
                    "message_6" => "sixth message here",
                    "message_7" => "seventh message here",
                    "message_8" => "eighth message here",
                    "message_9" => "ninth message here",
                    "message_10" => "tenth message"
                ],
                "page_2" => [
                    "message_1" => "first message here",
                    "message_2" => "second message here",
                    "message_3" => "third message here",
                    "message_4" => "fourth message here",
                    "message_5" => "fifth message here",
                    "message_6" => "sixth message here",
                    "message_7" => "seventh message here",
                    "message_8" => "eighth message here",
                    "message_9" => "ninth message here",
                    "message_10" => "tenth message"
                ],
                "page_3" => [
                    "message_1" => "first message here",
                    "message_2" => "second message here",
                    "message_3" => "third message here",
                    "message_4" => "fourth message here",
                    "message_5" => "fifth message here",
                    "message_6" => "sixth message here",
                    "message_7" => "seventh message here",
                    "message_8" => "eighth message here",
                    "message_9" => "ninth message here",
                    "message_10" => "tenth message"
                ],
                "page_4" => [
                    "message_1" => "first message here",
                    "message_2" => "second message here",
                    "message_3" => "third message here",
                    "message_4" => "fourth message here",
                    "message_5" => "fifth message here",
                    "message_6" => "sixth message here",
                    "message_7" => "seventh message here",
                    "message_8" => "eighth message here",
                    "message_9" => "ninth message here",
                    "message_10" => "tenth message"
                ],
                "page_5" => [
                    "message_1" => "first message here",
                    "message_2" => "second message here",
                    "message_3" => "third message here",
                    "message_4" => "fourth message here",
                    "message_5" => "fifth message here",
                    "message_6" => "sixth message here",
                    "message_7" => "seventh message here",
                    "message_8" => "eighth message here",
                    "message_9" => "ninth message here",
                    "message_10" => "tenth message"
                ],
                "page_6" => [
                    "message_1" => "first message here",
                    "message_2" => "second message here",
                    "message_3" => "third message here",
                    "message_4" => "fourth message here",
                    "message_5" => "fifth message here",
                    "message_6" => "sixth message here",
                    "message_7" => "seventh message here",
                    "message_8" => "eighth message here",
                    "message_9" => "ninth message here",
                    "message_10" => "tenth message"
                ],
                "page_7" => [
                    "message_1" => "first message here",
                    "message_2" => "second message here",
                    "message_3" => "third message here",
                    "message_4" => "fourth message here",
                    "message_5" => "fifth message here",
                    "message_6" => "sixth message here",
                    "message_7" => "seventh message here",
                    "message_8" => "eighth message here",
                    "message_9" => "ninth message here",
                    "message_10" => "tenth message"
                ],
                "page_8" => [
                    "message_1" => "first message here",
                    "message_2" => "second message here",
                    "message_3" => "third message here",
                    "message_4" => "fourth message here",
                    "message_5" => "fifth message here",
                    "message_6" => "sixth message here",
                    "message_7" => "seventh message here",
                    "message_8" => "eighth message here",
                    "message_9" => "ninth message here",
                    "message_10" => "tenth message"
                ],
                "page_9" => [
                    "message_1" => "first message here",
                    "message_2" => "second message here",
                    "message_3" => "third message here",
                    "message_4" => "fourth message here",
                    "message_5" => "fifth message here",
                    "message_6" => "sixth message here",
                    "message_7" => "seventh message here",
                    "message_8" => "eighth message here",
                    "message_9" => "ninth message here",
                    "message_10" => "tenth message"
                ],
                "page_10" => [
                    "message_1" => "first message here",
                    "message_2" => "second message here",
                    "message_3" => "third message here",
                    "message_4" => "fourth message here",
                    "message_5" => "fifth message here",
                    "message_6" => "sixth message here",
                    "message_7" => "seventh message here",
                    "message_8" => "eighth message here",
                    "message_9" => "ninth message here",
                    "message_10" => "tenth message"
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
        if (
            $command[0] === "/help" ||
            $command[0] === "/?" ||
            $command[0] === "/pocketmine:help" ||
            $command[0] === "/pocketmine:?"
        ) {
            if ($this->config->get("enable-help") == false) {
                return;
            }

            $page_one_messages = $this->config->get("page_1");
            $player->sendMessage($page_one_messages["message_1"]);
            $player->sendMessage($page_one_messages["message_2"]);
            $player->sendMessage($page_one_messages["message_3"]);
            $player->sendMessage($page_one_messages["message_4"]);
            $player->sendMessage($page_one_messages["message_5"]);
            $player->sendMessage($page_one_messages["message_6"]);
            $player->sendMessage($page_one_messages["message_7"]);
            $player->sendMessage($page_one_messages["message_8"]);
            $player->sendMessage($page_one_messages["message_9"]);
            $player->sendMessage($page_one_messages["message_10"]);
            $event->setCancelled();
            if (isset($command[1])) {
                if ($command[1] === "1" || $command[1] === "one") {
                    $page_one_messages = $this->config->get("page_1");
                    $player->sendMessage($page_one_messages["message_1"]);
                    $player->sendMessage($page_one_messages["message_2"]);
                    $player->sendMessage($page_one_messages["message_3"]);
                    $player->sendMessage($page_one_messages["message_4"]);
                    $player->sendMessage($page_one_messages["message_5"]);
                    $player->sendMessage($page_one_messages["message_6"]);
                    $player->sendMessage($page_one_messages["message_7"]);
                    $player->sendMessage($page_one_messages["message_8"]);
                    $player->sendMessage($page_one_messages["message_9"]);
                    $player->sendMessage($page_one_messages["message_10"]);
                } else if ($command[1] === "2" || $command[1] === "two") {
                    $page_two_messages = $this->config->get("page_2");
                    $player->sendMessage($page_two_messages["message_1"]);
                    $player->sendMessage($page_two_messages["message_2"]);
                    $player->sendMessage($page_two_messages["message_3"]);
                    $player->sendMessage($page_two_messages["message_4"]);
                    $player->sendMessage($page_two_messages["message_5"]);
                    $player->sendMessage($page_two_messages["message_6"]);
                    $player->sendMessage($page_two_messages["message_7"]);
                    $player->sendMessage($page_two_messages["message_8"]);
                    $player->sendMessage($page_two_messages["message_9"]);
                    $player->sendMessage($page_two_messages["message_10"]);
                } else if ($command[1] === "3" || $command[1] === "three") {
                    $page_three_messages = $this->config->get("page_3");
                    $player->sendMessage($page_three_messages["message_1"]);
                    $player->sendMessage($page_three_messages["message_2"]);
                    $player->sendMessage($page_three_messages["message_3"]);
                    $player->sendMessage($page_three_messages["message_4"]);
                    $player->sendMessage($page_three_messages["message_5"]);
                    $player->sendMessage($page_three_messages["message_6"]);
                    $player->sendMessage($page_three_messages["message_7"]);
                    $player->sendMessage($page_three_messages["message_8"]);
                    $player->sendMessage($page_three_messages["message_9"]);
                    $player->sendMessage($page_three_messages["message_10"]);
                } else if ($command[1] === "4" || $command[1] === "four") {
                    $page_four_messages = $this->config->get("page_4");
                    $player->sendMessage($page_four_messages["message_1"]);
                    $player->sendMessage($page_four_messages["message_2"]);
                    $player->sendMessage($page_four_messages["message_3"]);
                    $player->sendMessage($page_four_messages["message_4"]);
                    $player->sendMessage($page_four_messages["message_5"]);
                    $player->sendMessage($page_four_messages["message_6"]);
                    $player->sendMessage($page_four_messages["message_7"]);
                    $player->sendMessage($page_four_messages["message_8"]);
                    $player->sendMessage($page_four_messages["message_9"]);
                    $player->sendMessage($page_four_messages["message_10"]);
                } else if ($command[1] === "5" || $command[1] === "five") {
                    $page_five_messages = $this->config->get("page_5");
                    $player->sendMessage($page_five_messages["message_1"]);
                    $player->sendMessage($page_five_messages["message_2"]);
                    $player->sendMessage($page_five_messages["message_3"]);
                    $player->sendMessage($page_five_messages["message_4"]);
                    $player->sendMessage($page_five_messages["message_5"]);
                    $player->sendMessage($page_five_messages["message_6"]);
                    $player->sendMessage($page_five_messages["message_7"]);
                    $player->sendMessage($page_five_messages["message_8"]);
                    $player->sendMessage($page_five_messages["message_9"]);
                    $player->sendMessage($page_five_messages["message_10"]);
                } else if ($command[1] === "6" || $command[1] === "six") {
                    $page_six_messages = $this->config->get("page_6");
                    $player->sendMessage($page_six_messages["message_1"]);
                    $player->sendMessage($page_six_messages["message_2"]);
                    $player->sendMessage($page_six_messages["message_3"]);
                    $player->sendMessage($page_six_messages["message_4"]);
                    $player->sendMessage($page_six_messages["message_5"]);
                    $player->sendMessage($page_six_messages["message_6"]);
                    $player->sendMessage($page_six_messages["message_7"]);
                    $player->sendMessage($page_six_messages["message_8"]);
                    $player->sendMessage($page_six_messages["message_9"]);
                    $player->sendMessage($page_six_messages["message_10"]);
                } else if ($command[1] === "7" || $command[1] === "seven") {
                    $page_seven_messages = $this->config->get("page_7");
                    $player->sendMessage($page_seven_messages["message_1"]);
                    $player->sendMessage($page_seven_messages["message_2"]);
                    $player->sendMessage($page_seven_messages["message_3"]);
                    $player->sendMessage($page_seven_messages["message_4"]);
                    $player->sendMessage($page_seven_messages["message_5"]);
                    $player->sendMessage($page_seven_messages["message_6"]);
                    $player->sendMessage($page_seven_messages["message_7"]);
                    $player->sendMessage($page_seven_messages["message_8"]);
                    $player->sendMessage($page_seven_messages["message_9"]);
                    $player->sendMessage($page_seven_messages["message_10"]);
                } else if ($command[1] === "8" || $command[1] === "eight") {
                    $page_eight_messages = $this->config->get("page_8");
                    $player->sendMessage($page_eight_messages["message_1"]);
                    $player->sendMessage($page_eight_messages["message_2"]);
                    $player->sendMessage($page_eight_messages["message_3"]);
                    $player->sendMessage($page_eight_messages["message_4"]);
                    $player->sendMessage($page_eight_messages["message_5"]);
                    $player->sendMessage($page_eight_messages["message_6"]);
                    $player->sendMessage($page_eight_messages["message_7"]);
                    $player->sendMessage($page_eight_messages["message_8"]);
                    $player->sendMessage($page_eight_messages["message_9"]);
                    $player->sendMessage($page_eight_messages["message_10"]);
                } else if ($command[1] === "9" || $command[1] === "nine") {
                    $page_nine_messages = $this->config->get("page_9");
                    $player->sendMessage($page_nine_messages["message_1"]);
                    $player->sendMessage($page_nine_messages["message_2"]);
                    $player->sendMessage($page_nine_messages["message_3"]);
                    $player->sendMessage($page_nine_messages["message_4"]);
                    $player->sendMessage($page_nine_messages["message_5"]);
                    $player->sendMessage($page_nine_messages["message_6"]);
                    $player->sendMessage($page_nine_messages["message_7"]);
                    $player->sendMessage($page_nine_messages["message_8"]);
                    $player->sendMessage($page_nine_messages["message_9"]);
                    $player->sendMessage($page_nine_messages["message_10"]);
                } else if ($command[1] === "10" || $command[1] === "ten") {
                    $page_ten_messages = $this->config->get("page_10");
                    $player->sendMessage($page_ten_messages["message_1"]);
                    $player->sendMessage($page_ten_messages["message_2"]);
                    $player->sendMessage($page_ten_messages["message_3"]);
                    $player->sendMessage($page_ten_messages["message_4"]);
                    $player->sendMessage($page_ten_messages["message_5"]);
                    $player->sendMessage($page_ten_messages["message_6"]);
                    $player->sendMessage($page_ten_messages["message_7"]);
                    $player->sendMessage($page_ten_messages["message_8"]);
                    $player->sendMessage($page_ten_messages["message_9"]);
                    $player->sendMessage($page_ten_messages["message_10"]);
                }
            }
        }
    }

    public function onCommand(CommandSender $sender, Command $command, string $label, array $args) : bool
    {
        switch ($command->getName()) {
            case "enablehelp":
                if ($sender->hasPermission("help.enable")) {
                    if ($this->config->get("enable-help") == true) {
                        $sender->sendMessage(TextFormat::RED . "Help is already enabled");
                    } else if ($this->config->get("enable-help") == false) {
                        $this->config->set("enable-help", true);
                        $this->config->save();
                        $sender->sendMessage(TextFormat::GREEN . "Help has been enabled");
                    }
                } else {
                    $sender->sendMessage(TextFormat::RED . "You do not have permission to run this command");
                }
                break;
            case "disablehelp":
                if ($sender->hasPermission("help.disable")) {
                    if ($this->config->get("enable-help") == false) {
                        $sender->sendMessage(TextFormat::RED . "Help is already disabled");
                    } else if ($this->config->get("enable-help") == true) {
                        $this->config->set("enable-help", false);
                        $this->config->save();
                        $sender->sendMessage(TextFormat::GREEN . "Help has been disabled");
                    }
                } else {
                    $sender->sendMessage(TextFormat::RED . "You do not have permission to run this command");
                }
                break;
        }
        return true;
    }

}

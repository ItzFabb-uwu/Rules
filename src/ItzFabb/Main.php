<?php



namespace ItzFabb;



//Basic Class 

use pocketmine\Player;

use pocketmine\Server;

use pocketmine\plugin\PluginBase;

use pocketmine\event\Listener;

use pocketmine\utils\Config;

use pocketmine\item\Item;



use pocketmine\command\Command;

use pocketmine\command\CommandSender;

use pocketmine\command\CommandExecutor;

use pocketmine\command\ConsoleCommandSender;



use pocketmine\event\player\PlayerInteractEvent;

use pocketmine\inventory\transaction\action\SlotChangeAction;

use pocketmine\network\mcpe\protocol\LevelSoundEventPacket;

use pocketmine\network\mcpe\protocol\LevelEventPacket;

//Gui Class

use libs\muqsit\invmenu\InvMenu;

use libs\muqsit\invmenu\InvMenuHandler;



class Main extends PluginBase implements Listener {

	
	public function onEnable(){

		$this->saveResource("config.yml", false);

		$this->menu = InvMenu::create(InvMenu::TYPE_DOUBLE_CHEST);

		

		if(!InvMenuHandler::isRegistered()){

			InvMenuHandler::register($this);

		}

		$this->getServer()->getPluginManager()->registerEvents($this, ($this));

	}

	public function onDisable(){

		$this->getLogger()->info("Plugin is disabled..");

	}

	public function onCommand(Commandsender $sender, Command $command, string $label, array $args) : bool{

        $config = new Config($this->getDataFolder() . "config.yml", Config::YAML);

          if($sender->hasPermission("rules.command")){

          if($command->getName() === "rules"){

            $name = $sender->getName();

              if(!$sender instanceof Player){

            	 $commandingameconfig = $config->get("command-ingame");

            	 $commandingame = str_replace(["&", "+n"], ["§", "\n"], $commandingameconfig);

                $sender->sendMessage($commandingame);

                return false;

              }

          	$config = new Config($this->getDataFolder() . "config.yml", Config::YAML);

               $this->rules($sender);

               $sender->getLevel()->broadcastLevelSoundEvent($sender->add(0, $sender->eyeHeight, 0), LevelSoundEventPacket::SOUND_BLOCK_BARREL_OPEN);

          }

          } else {

            	 $nopermconfig = $config->get("no-perm");

            	 $noperm = str_replace(["&", "+n", "%player_name%"], ["§", "\n", $sender->getName()], $nopermconfig);

                $sender->sendMessage($noperm);

                $volume = mt_rand();

	           $sender->getLevel()->broadcastLevelEvent($sender, LevelEventPacket::EVENT_SOUND_ANVIL_FALL, (int) $volume);

          }

        return true;

	}

	public function rules($sender)

	{

	    $config = new Config($this->getDataFolder() . "config.yml", Config::YAML);

	    

	    $titlerewardsconfig = $config->get("title-rules");

	    $titlerewards = str_replace(["&", "+n",], ["§", "\n"], $titlerewardsconfig);

	    $this->menu->readonly();

	    $this->menu->setListener([$this, "rulesmenu"]);

         $this->menu->setName($titlerewards);

	    $inventory = $this->menu->getInventory();

	    

	    //0

	    $inconfig = $config->get("item.name");

	    $id = $config->get("item.id");

	    $meta = $config->get("item.meta");

	    $count = $config->get("item.count");

	    $in = str_replace(["&", "+n"], ["§", "\n"], $inconfig);

	    //1

	    $inconfig1 = $config->get("item.name1");

	    $id1 = $config->get("item.id1");

	    $meta1 = $config->get("item.meta1");

	    $count1 = $config->get("item.count1");

	    $in1 = str_replace(["&", "+n"], ["§", "\n"], $inconfig1);

	    //2 

	    $inconfig2 = $config->get("item.name2");

	    $id2 = $config->get("item.id2");

	    $meta2 = $config->get("item.meta2");

	    $count2 = $config->get("item.count2");

	    $in2 = str_replace(["&", "+n"], ["§", "\n"], $inconfig2);

	    //3 

	    $inconfig3 = $config->get("item.name3");

	    $id3 = $config->get("item.id3");

	    $meta3 = $config->get("item.meta3");

	    $count3 = $config->get("item.count3");

	    $in3 = str_replace(["&", "+n"], ["§", "\n"], $inconfig3);

	    //4 

	    $inconfig4 = $config->get("item.name4");

	    $id4 = $config->get("item.id4");

	    $meta4 = $config->get("item.meta4");

	    $count4 = $config->get("item.count4");

	    $in4 = str_replace(["&", "+n"], ["§", "\n"], $inconfig4);

	    //5 

	    $inconfig5 = $config->get("item.name5");

	    $id5 = $config->get("item.id5");

	    $meta5 = $config->get("item.meta5");

	    $count5 = $config->get("item.count5");

	    $in5 = str_replace(["&", "+n"], ["§", "\n"], $inconfig5);

	    //6 

	    $inconfig6 = $config->get("item.name6");

	    $id6 = $config->get("item.id6");

	    $meta6 = $config->get("item.meta6");

	    $count6 = $config->get("item.count6");

	    $in6 = str_replace(["&", "+n"], ["§", "\n"], $inconfig6);

	    //7 

	    $inconfig7 = $config->get("item.name7");

	    $id7 = $config->get("item.id7");

	    $meta7 = $config->get("item.meta7");

	    $count7 = $config->get("item.count7");

	    $in7 = str_replace(["&", "+n"], ["§", "\n"], $inconfig7);

	    //8 

	    $inconfig8 = $config->get("item.name8");

	    $id8 = $config->get("item.id8");

	    $meta8 = $config->get("item.meta8");

	    $count8 = $config->get("item.count8");

	    $in8 = str_replace(["&", "+n"], ["§", "\n"], $inconfig8);

	    //9 

	    $inconfig9 = $config->get("item.name9");

	    $id9 = $config->get("item.id9");

	    $meta9 = $config->get("item.meta9");

	    $count9 = $config->get("item.count9");

	    $in9 = str_replace(["&", "+n"], ["§", "\n"], $inconfig9);

	    //10 

	    $inconfig10 = $config->get("item.name10");

	    $id10 = $config->get("item.id10");

	    $meta10 = $config->get("item.meta10");

	    $count10 = $config->get("item.count10");

	    $in10 = str_replace(["&", "+n"], ["§", "\n"], $inconfig10);

	    //11 

	    $inconfig11 = $config->get("item.name11");

	    $id11 = $config->get("item.id11");

	    $meta11 = $config->get("item.meta11");

	    $count11 = $config->get("item.count11");

	    $in11 = str_replace(["&", "+n"], ["§", "\n"], $inconfig11);

	    //12

	    $inconfig12 = $config->get("item.name12");

	    $id12 = $config->get("item.id12");

	    $meta12 = $config->get("item.meta12");

	    $count12 = $config->get("item.count12");

	    $in12 = str_replace(["&", "+n"], ["§", "\n"], $inconfig12);

	    //13

	    $inconfig13 = $config->get("item.name13");

	    $id13 = $config->get("item.id13");

	    $meta13 = $config->get("item.meta13");

	    $count13 = $config->get("item.count13");

	    $in13 = str_replace(["&", "+n"], ["§", "\n"], $inconfig13);

	    //14

	    $inconfig14 = $config->get("item.name14");

	    $id14 = $config->get("item.id14");

	    $meta14 = $config->get("item.meta14");

	    $count14 = $config->get("item.count14");

	    $in14 = str_replace(["&", "+n"], ["§", "\n"], $inconfig14);	    

	    //15 	    

	    $inconfig15 = $config->get("item.name15"); 	    

	    $id15 = $config->get("item.id15"); 	    

	    $meta15 = $config->get("item.meta15"); 	    

	    $count15 = $config->get("item.count15"); 	    

	    $in15 = str_replace(["&", "+n"], ["§", "\n"], $inconfig15);	    

	    //16 	    

	    $inconfig16 = $config->get("item.name16"); 	    

	    $id16 = $config->get("item.id16"); 	    

	    $meta16 = $config->get("item.meta16"); 	    

	    $count16 = $config->get("item.count16"); 	    

	    $in16 = str_replace(["&", "+n"], ["§", "\n"], $inconfig16);	    

	    //17 	    

	    $inconfig17 = $config->get("item.name17"); 	    

	    $id17 = $config->get("item.id17"); 	    

	    $meta17 = $config->get("item.meta17"); 	    

	    $count17 = $config->get("item.count17"); 	    

	    $in17 = str_replace(["&", "+n"], ["§", "\n"], $inconfig17);	    

	    //18

	    $inconfig18 = $config->get("item.name18");

	    $id18 = $config->get("item.id18");

	    $meta18 = $config->get("item.meta18");

	    $count18 = $config->get("item.count18");

	    $in18 = str_replace(["&", "+n"], ["§", "\n"], $inconfig18);

	    //19

	    $inconfig19 = $config->get("item.name19");

	    $id19 = $config->get("item.id19");

	    $meta19 = $config->get("item.meta19");

	    $count19 = $config->get("item.count19");

	    $in19 = str_replace(["&", "+n"], ["§", "\n"], $inconfig19);

	    //20

	    $inconfig20 = $config->get("item.name20");

	    $id20 = $config->get("item.id20");

	    $meta20 = $config->get("item.meta20");

	    $count20 = $config->get("item.count20");

	    $in20 = str_replace(["&", "+n"], ["§", "\n"], $inconfig20);

	    //21

	    $inconfig21 = $config->get("item.name21");

	    $id21 = $config->get("item.id21");

	    $meta21 = $config->get("item.meta21");

	    $count21 = $config->get("item.count21");

	    $in21 = str_replace(["&", "+n"], ["§", "\n"], $inconfig21);

	    //22

	    $inconfig22 = $config->get("item.name22");

	    $id22 = $config->get("item.id22");

	    $meta22 = $config->get("item.meta22");

	    $count22 = $config->get("item.count22");

	    $in22 = str_replace(["&", "+n"], ["§", "\n"], $inconfig22);

	    //23

	    $inconfig23 = $config->get("item.name23");

	    $id23 = $config->get("item.id23");

	    $meta23 = $config->get("item.meta23");

	    $count23 = $config->get("item.count23");

	    $in23 = str_replace(["&", "+n"], ["§", "\n"], $inconfig23);

	    //24

	    $inconfig24 = $config->get("item.name24");

	    $id24 = $config->get("item.id24");

	    $meta24 = $config->get("item.meta24");

	    $count24 = $config->get("item.count24");

	    $in24 = str_replace(["&", "+n"], ["§", "\n"], $inconfig24);

	    //25

	    $inconfig25 = $config->get("item.name25");

	    $id25 = $config->get("item.id25");

	    $meta25 = $config->get("item.meta25");

	    $count25 = $config->get("item.count25");

	    $in25 = str_replace(["&", "+n"], ["§", "\n"], $inconfig25);

	    //26

	    $inconfig26 = $config->get("item.name26");

	    $id26 = $config->get("item.id26");

	    $meta26 = $config->get("item.meta26");

	    $count26 = $config->get("item.count26");

	    $in26 = str_replace(["&", "+n"], ["§", "\n"], $inconfig26);

	    //27

	    $inconfig27 = $config->get("item.name27");

	    $id27 = $config->get("item.id27");

	    $meta27 = $config->get("item.meta27");

	    $count27 = $config->get("item.count27");

	    $in27 = str_replace(["&", "+n"], ["§", "\n"], $inconfig27);

	    //28

	    $inconfig28 = $config->get("item.name28");

	    $id28 = $config->get("item.id28");

	    $meta28 = $config->get("item.meta28");

	    $count28 = $config->get("item.count28");

	    $in28 = str_replace(["&", "+n"], ["§", "\n"], $inconfig28);

	    //29

	    $inconfig29 = $config->get("item.name29");

	    $id29 = $config->get("item.id29");

	    $meta29 = $config->get("item.meta29");

	    $count29 = $config->get("item.count29");

	    $in29 = str_replace(["&", "+n"], ["§", "\n"], $inconfig29);

	    //30

	    $inconfig30 = $config->get("item.name30");

	    $id30 = $config->get("item.id30");

	    $meta30 = $config->get("item.meta30");

	    $count30 = $config->get("item.count30");

	    $in30 = str_replace(["&", "+n"], ["§", "\n"], $inconfig30);

	    //31

	    $inconfig31 = $config->get("item.name31");

	    $id31 = $config->get("item.id31");

	    $meta31 = $config->get("item.meta31");

	    $count31 = $config->get("item.count31");

	    $in31 = str_replace(["&", "+n"], ["§", "\n"], $inconfig31);

	    //32

	    $inconfig32 = $config->get("item.name32");

	    $id32 = $config->get("item.id32");

	    $meta32 = $config->get("item.meta32");

	    $count32 = $config->get("item.count32");

	    $in32 = str_replace(["&", "+n"], ["§", "\n"], $inconfig32);

	    //33

	    $inconfig33 = $config->get("item.name33");

	    $id33 = $config->get("item.id33");

	    $meta33 = $config->get("item.meta33");

	    $count33 = $config->get("item.count33");

	    $in33 = str_replace(["&", "+n"], ["§", "\n"], $inconfig33);

	    //34

	    $inconfig34 = $config->get("item.name34");

	    $id34 = $config->get("item.id34");

	    $meta34 = $config->get("item.meta34");

	    $count34 = $config->get("item.count34");

	    $in34 = str_replace(["&", "+n"], ["§", "\n"], $inconfig34);

	    //35

	    $inconfig35 = $config->get("item.name35");

	    $id35 = $config->get("item.id35");

	    $meta35 = $config->get("item.meta35");

	    $count35 = $config->get("item.count35");

	    $in35 = str_replace(["&", "+n"], ["§", "\n"], $inconfig35);

	    //36

	    $inconfig36 = $config->get("item.name36");

	    $id36 = $config->get("item.id36");

	    $meta36 = $config->get("item.meta36");

	    $count36 = $config->get("item.count36");

	    $in36 = str_replace(["&", "+n"], ["§", "\n"], $inconfig36);

	    //37

	    $inconfig37 = $config->get("item.name37");

	    $id37 = $config->get("item.id37");

	    $meta37 = $config->get("item.meta37");

	    $count37 = $config->get("item.count37");

	    $in37 = str_replace(["&", "+n"], ["§", "\n"], $inconfig37);

	    //38

	    $inconfig38 = $config->get("item.name38");

	    $id38 = $config->get("item.id38");

	    $meta38 = $config->get("item.meta38");

	    $count38 = $config->get("item.count38");

	    $in38 = str_replace(["&", "+n"], ["§", "\n"], $inconfig38);

	    //39

	    $inconfig39 = $config->get("item.name39");

	    $id39 = $config->get("item.id39");

	    $meta39 = $config->get("item.meta39");

	    $count39 = $config->get("item.count39");

	    $in39 = str_replace(["&", "+n"], ["§", "\n"], $inconfig39);

	    //40

	    $inconfig40 = $config->get("item.name40");

	    $id40 = $config->get("item.id40");

	    $meta40 = $config->get("item.meta40");

	    $count40 = $config->get("item.count40");

	    $in40 = str_replace(["&", "+n"], ["§", "\n"], $inconfig40);

	    //41

	    $inconfig41 = $config->get("item.name41");

	    $id41 = $config->get("item.id41");

	    $meta41 = $config->get("item.meta41");

	    $count41 = $config->get("item.count41");

	    $in41 = str_replace(["&", "+n"], ["§", "\n"], $inconfig41);

	    //42

	    $inconfig42 = $config->get("item.name42");

	    $id42 = $config->get("item.id42");

	    $meta42 = $config->get("item.meta42");

	    $count42 = $config->get("item.count42");

	    $in42 = str_replace(["&", "+n"], ["§", "\n"], $inconfig42);

	    //43

	    $inconfig43 = $config->get("item.name43");

	    $id43 = $config->get("item.id43");

	    $meta43 = $config->get("item.meta43");

	    $count43 = $config->get("item.count43");

	    $in43 = str_replace(["&", "+n"], ["§", "\n"], $inconfig43);

	    //43

	    $inconfig43 = $config->get("item.name43");

	    $id43 = $config->get("item.id43");

	    $meta43 = $config->get("item.meta43");

	    $count43 = $config->get("item.count43");

	    $in43 = str_replace(["&", "+n"], ["§", "\n"], $inconfig43);

	    //44

	    $inconfig44 = $config->get("item.name44");

	    $id44 = $config->get("item.id44");

	    $meta44 = $config->get("item.meta44");

	    $count44 = $config->get("item.count44");

	    $in44 = str_replace(["&", "+n"], ["§", "\n"], $inconfig44);

	    //45

	    $inconfig45 = $config->get("item.name45");

	    $id45 = $config->get("item.id45");

	    $meta45 = $config->get("item.meta45");

	    $count45 = $config->get("item.count45");

	    $in45 = str_replace(["&", "+n"], ["§", "\n"], $inconfig45);

	    //46

	    $inconfig46 = $config->get("item.name46");

	    $id46 = $config->get("item.id46");

	    $meta46 = $config->get("item.meta46");

	    $count46 = $config->get("item.count46");

	    $in46 = str_replace(["&", "+n"], ["§", "\n"], $inconfig46);

	    //47

	    $inconfig47 = $config->get("item.name47");

	    $id47 = $config->get("item.id47");

	    $meta47 = $config->get("item.meta47");

	    $count47 = $config->get("item.count47");

	    $in47 = str_replace(["&", "+n"], ["§", "\n"], $inconfig47);

	    //48

	    $inconfig48 = $config->get("item.name48");

	    $id48 = $config->get("item.id48");

	    $meta48 = $config->get("item.meta48");

	    $count48 = $config->get("item.count48");

	    $in48 = str_replace(["&", "+n"], ["§", "\n"], $inconfig48);

	    //49

	    $inconfig49 = $config->get("item.name49");

	    $id49 = $config->get("item.id49");

	    $meta49 = $config->get("item.meta49");

	    $count49 = $config->get("item.count49");

	    $in49 = str_replace(["&", "+n"], ["§", "\n"], $inconfig49);

	    //50

	    $inconfig50 = $config->get("item.name50");

	    $id50 = $config->get("item.id50");

	    $meta50 = $config->get("item.meta50");

	    $count50 = $config->get("item.count50");

	    $in50 = str_replace(["&", "+n"], ["§", "\n"], $inconfig50);

	    //51

	    $inconfig51 = $config->get("item.name51");

	    $id51 = $config->get("item.id51");

	    $meta51 = $config->get("item.meta51");

	    $count51 = $config->get("item.count51");

	    $in51 = str_replace(["&", "+n"], ["§", "\n"], $inconfig51);

	    //52

	    $inconfig52 = $config->get("item.name52");

	    $id52 = $config->get("item.id52");

	    $meta52 = $config->get("item.meta52");

	    $count52 = $config->get("item.count52");

	    $in52 = str_replace(["&", "+n"], ["§", "\n"], $inconfig52);

	    //53

	    $inconfig53 = $config->get("item.name53");

	    $id53 = $config->get("item.id53");

	    $meta53 = $config->get("item.meta53");

	    $count53 = $config->get("item.count53");

	    $in53 = str_replace(["&", "+n"], ["§", "\n"], $inconfig53);

	    //Chest Section 1-8

	    $inventory->setItem(0, Item::get($id, $meta, $count)->setCustomName($in));

	    $inventory->setItem(1, Item::get($id1, $meta1, $count1)->setCustomName($in1));

	    $inventory->setItem(2, Item::get($id2, $meta2, $count2)->setCustomName($in2));

	    $inventory->setItem(3, Item::get($id3, $meta3, $count3)->setCustomName($in3));

	    $inventory->setItem(4, Item::get($id4, $meta4, $count4)->setCustomName($in4));

	    $inventory->setItem(5, Item::get($id5, $meta5, $count5)->setCustomName($in5));

	    $inventory->setItem(6, Item::get($id6, $meta6, $count6)->setCustomName($in6));

	    $inventory->setItem(7, Item::get($id7, $meta7, $count7)->setCustomName($in7));

	    $inventory->setItem(8, Item::get($id8, $meta8, $count8)->setCustomName($in8));

         //Chest Section 9-17

         $inventory->setItem(9, Item::get($id9, $meta9, $count9)->setCustomName($in9));

	    $inventory->setItem(10, Item::get($id10, $meta10, $count10)->setCustomName($in10));

	    $inventory->setItem(11, Item::get($id11, $meta11, $count11)->setCustomName($in11));

	    $inventory->setItem(12, Item::get($id12, $meta12, $count12)->setCustomName($in12));

	    $inventory->setItem(13, Item::get($id13, $meta13, $count13)->setCustomName($in13));

	    $inventory->setItem(14, Item::get($id14, $meta14, $count14)->setCustomName($in14));

	    $inventory->setItem(15, Item::get($id15, $meta15, $count15)->setCustomName($in15));

	    $inventory->setItem(16, Item::get($id16, $meta16, $count16)->setCustomName($in16));

	    $inventory->setItem(17, Item::get($id17, $meta17, $count17)->setCustomName($in17));

         //Chest Section 18-26

         $inventory->setItem(18, Item::get($id18, $meta18, $count18)->setCustomName($in18));

	    $inventory->setItem(19, Item::get($id19, $meta19, $count19)->setCustomName($in19));

	    $inventory->setItem(20, Item::get($id20, $meta20, $count20)->setCustomName($in20));

	    $inventory->setItem(21, Item::get($id21, $meta21, $count21)->setCustomName($in21));

	    $inventory->setItem(22, Item::get($id22, $meta22, $count22)->setCustomName($in22));

	    $inventory->setItem(23, Item::get($id23, $meta23, $count23)->setCustomName($in23));

	    $inventory->setItem(24, Item::get($id24, $meta24, $count24)->setCustomName($in24));

	    $inventory->setItem(25, Item::get($id25, $meta25, $count25)->setCustomName($in25));

	    $inventory->setItem(26, Item::get($id26, $meta26, $count26)->setCustomName($in26));

	    //Chest Section 27-35

	    $inventory->setItem(27, Item::get($id27, $meta27, $count27)->setCustomName($in27));

	    $inventory->setItem(28, Item::get($id28, $meta28, $count28)->setCustomName($in28));

	    $inventory->setItem(29, Item::get($id29, $meta29, $count29)->setCustomName($in29));

	    $inventory->setItem(30, Item::get($id30, $meta30, $count30)->setCustomName($in30));

	    $inventory->setItem(31, Item::get($id31, $meta31, $count31)->setCustomName($in31));

	    $inventory->setItem(32, Item::get($id32, $meta32, $count32)->setCustomName($in32));

	    $inventory->setItem(33, Item::get($id33, $meta33, $count33)->setCustomName($in33));

	    $inventory->setItem(34, Item::get($id34, $meta34, $count34)->setCustomName($in34));

	    $inventory->setItem(35, Item::get($id35, $meta35, $count35)->setCustomName($in35));

         //Chest Section 36-44

         $inventory->setItem(36, Item::get($id36, $meta36, $count36)->setCustomName($in36));

	    $inventory->setItem(37, Item::get($id37, $meta37, $count37)->setCustomName($in37));

	    $inventory->setItem(38, Item::get($id38, $meta38, $count38)->setCustomName($in38));

	    $inventory->setItem(39, Item::get($id39, $meta39, $count39)->setCustomName($in39));

	    $inventory->setItem(40, Item::get($id40, $meta40, $count40)->setCustomName($in40));

	    $inventory->setItem(41, Item::get($id41, $meta41, $count41)->setCustomName($in41));

	    $inventory->setItem(42, Item::get($id42, $meta42, $count42)->setCustomName($in42));

	    $inventory->setItem(43, Item::get($id43, $meta43, $count43)->setCustomName($in43));

	    $inventory->setItem(44, Item::get($id44, $meta44, $count44)->setCustomName($in44));

         //Chest Section 45-53

         $inventory->setItem(45, Item::get($id45, $meta45, $count45)->setCustomName($in45));

	    $inventory->setItem(46, Item::get($id46, $meta46, $count46)->setCustomName($in46));

	    $inventory->setItem(47, Item::get($id47, $meta47, $count47)->setCustomName($in47));

	    $inventory->setItem(48, Item::get($id48, $meta48, $count48)->setCustomName($in48));

	    $inventory->setItem(49, Item::get($id49, $meta49, $count49)->setCustomName($in49));

	    $inventory->setItem(50, Item::get($id50, $meta50, $count50)->setCustomName($in50));

	    $inventory->setItem(51, Item::get($id51, $meta51, $count51)->setCustomName($in51));

	    $inventory->setItem(52, Item::get($id52, $meta52, $count52)->setCustomName($in52));

	    $inventory->setItem(53, Item::get($id53, $meta53, $count53)->setCustomName($in53));

	    

	    $this->menu->send($sender);

	}

	public function rulesmenu(Player $sender, Item $item)

	{

	   $config = new Config($this->getDataFolder() . "config.yml", Config::YAML);

        $hand = $sender->getInventory()->getItemInHand()->getCustomName();

        $inventory = $this->menu->getInventory();

        

        if($item->getId() === $config->get("item.id.exit") && $item->getDamage() === $config->get("item.meta.exit")) {

        	$hand = $sender->getInventory()->getItemInHand()->getCustomName();

          $inventory = $this->menu->getInventory();

          

        	$sender->getLevel()->broadcastLevelSoundEvent($sender->add(0, $sender->eyeHeight, 0), LevelSoundEventPacket::SOUND_BLOCK_BARREL_CLOSE);

	     $sender->removeWindow($inventory);

        }

	}

}

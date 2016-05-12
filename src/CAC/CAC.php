<?php

namespace CAC;

use pocketmine\plugin\PluginBase;

use pocketmine\nbt\NBT;
use pocketmine\nbt\tag\CompoundTag;
use pocketmine\nbt\tag\IntTag;

use pocketmine\item\Item;

class CAC extends PluginBase {

	public static function get($id, $meta, $amount, Color $color = null)
	{
		if ($color === null) {
			return new Item($id,$meta,$amount);
		}else{
			$armors = [298,299,230,231];
			if (in_array($armors, $id)) {
				$item = new Item($id,$meta,$amount);
				$this->setCustomColor($color,$item);
				return $item;
			}else{
				return new Item($id,$meta,$amount);
			}
		}
	}

	function setCustomColor(Color $color,$item){
		if(($hasTag = $item->hasCompoundTag())){
			$tag = $item->getNamedTag();
		}else{
			$tag = new CompoundTag("", []);
		}
		$tag->customColor = new IntTag("customColor", $color->getColorCode());
		$item->setCompoundTag($tag);
	}
}
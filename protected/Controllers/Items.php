<?php

namespace App\Controllers;

use App\Components\GetStyle;
use App\Models\Characteristic;
use App\Models\Item;
use T4\Mvc\Controller;

class Items
    extends Controller
{
    public function actionDefault()
    {
        $items = Item::findAll();
        $reverseItems = $items->reverse();
        $this->data->items = $reverseItems;
    }

    public function actionItem($id)
    {
        $this->data->item = Item::findByPK($id);
    }

    /**
     * @TODO categories
     */
    public function actionAdditem()
    {
        $characteristics = Characteristic::findAll();
        $this->data->characteristics = $characteristics;
    }
    public function actionSaveitem($item, $characteristic)
    {
        if(!$item->is_featured) {
            $item->is_featured = '0';
        }
        $newItem = new Item();
        move_uploaded_file($_FILES['item']['tmp_name']['image'], ROOT_PATH_PUBLIC . '/images/items/' . $_FILES['item']['name']['image']);
        $newItem->fill($item);
        $newItem->pictureName = $_FILES['item']['name']['image'];
        $newItem->style = GetStyle::getItemStyle();
        if(empty ($characteristic->frame)) {
            $newItem->__characteristic_id = $_POST['presetCharacteristic'];
        } else {
            $char = new Characteristic();
            $char->fill($characteristic);
            $char->save();
            $newItem->__characteristic_id = $char->getPk();
        }
        $newItem->save();
        $this->redirect('http://foffa.local/items');
    }
    
    public function actionDeleteItem($id)
    {
        $item = Item::findByPK($id);
        $item->delete();
        $this->redirect('/');
    }
}
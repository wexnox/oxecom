<?php

namespace App;

class Cart
{
    public $items = null;
    public $totalQty = 0;
    public $totalPris = 0;

    /**
     * Cart constructor.
     * @param $oldCart
     */
    public function __construct($oldCart)
    {
        if ($oldCart){
            $this->items = $oldCart->items;
            $this->totalQty = $oldCart->totalQty;
            $this->totalPris = $oldCart->totalPris;
        }
    }

    public function add($item, $id)
    {
        $storedItem = ['qty' => 0, 'pris' => $item->pris, 'item' => $item];

        if ($this->items){
            if (array_key_exists($id, $this->items))
            {
                $storedItem = $this->items[$id];
            }
        }
        $storedItem ['qty']++;
        $storedItem ['pris'] = $item->pris * $storedItem['qty'];
        $this->items[$id] = $storedItem;
        $this->totalQty++;
        $this->totalPris += $item->pris;
    }

    public function reduceByOne($id){
        $this->items[$id]['qty']--;
        $this->items[$id]['pris'] -= $this->items[$id]['item']['pris'];
        $this->totalQty--;
        $this->totalPris -= $this->items[$id]['item']['pris'];

        if ($this->items[$id]['qty'] <=0 ){
            unset($this->items[$id]);
        }
    }

    public function removeItem($id){
        $this->totalQty -= $this->items[$id]['qty'];
        $this->totalPris -= $this->items[$id]['pris'];
        unset($this->items[$id]);
    }

}

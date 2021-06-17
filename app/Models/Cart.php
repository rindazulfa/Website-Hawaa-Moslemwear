<?php

namespace App\Models;

class Cart
{
    public $items = [];
    public $totalbeli = 0;
    public $totalharga = 0;

    public function __construct($oldCart)
    {
        if($oldCart){
            $this->items = $oldCart->items;
            $this->totalbeli = $oldCart->totalbeli;
            $this->totalharga = $oldCart->totalharga;
        }else{
            $this->items = [];
        }
    }

    public function add($item, $id){
        $storedItem = ['jumlah' => 0, 'harga' => $item->harga, 'item'=>$item];
        if($this->items){
            if(array_key_exists($id, $this->items)){
                $storedItem = $this->items[$id];
            }
        }
        $storedItem['jumlah']++;
        $storedItem['harga'] = $item->harga * $storedItem['jumlah'];
        $this->items[$id] = $storedItem;
        $this->totalbeli++;
        $this->totalharga += $item->harga;
    }
}

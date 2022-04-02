<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    use HasFactory;
    public $timestamps = false;

    public function getItems(){
        return $this->get();
    }

    public function getItem(int $id){
        return $this->find($id);
    }

    public function setItem(array $itemData){
        $this->name = $itemData['name'];
        $this->price = $itemData['price'];
        $this->weight = $itemData['weight'];
        $this->characteristic = isset( $itemData['characteristic'] )? ( empty( $itemData['characteristic'] )? null: $itemData['characteristic'] ): null;
        return $this->save()? $this->id: false;
    }

    public function updateItem(int $id, array $itemData){
        $item = $this->find($id);
        $item->name = $itemData['name'];
        $item->price = $itemData['price'];
        $item->weight = $itemData['weight'];
        $item->characteristic = isset( $itemData['characteristic'] )? ( empty( $itemData['characteristic'] )? null: $itemData['characteristic'] ): null;
        return $item->save()? $item->id: false;
    }

    public function deleteItem(int $id){
        return $this->destroy($id)? true: false;
    }

    public function sales(){
        return $this->hasMany(Sale::class, 'product_id', 'id');
    }
}

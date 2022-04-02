<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sale extends Model
{
    use HasFactory;

    public function getSales(){
        return $this->get();
    }

    public function getSale(int $id){
        return $this->find($id);
    }

    public function setSale(array $saleData){
        $this->customer_id = $saleData['customer_id'];
        $this->product_id = $saleData['product_id'];
        $this->sale_date = $saleData['sale_date'];
        return $this->save()? $this->id: false;
    }

    public function updateSale(int $id, array $saleData){
        $sale = $this->find($id);
        $sale->customer_id = $saleData['customer_id'];
        $sale->product_id = $saleData['product_id'];
        $sale->sale_date = $saleData['sale_date'];
        return $sale->save()? $sale->id: false;
    }

    public function deleteSale(int $id){
        return $this->destroy($id)? true: false;
    }

    public function customer(){
        return $this->belongsTo(Customer::class, 'customer_id', 'id');
    }

    public function item(){
        return $this->belongsTo(Item::class, 'product_id', 'id');
    }
}

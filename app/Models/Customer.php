<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;
    public $timestamps = false;

    public function getCustomers(){
        return $this->get();
    }

    public function getCustomer(int $id){
        return $this->find($id);
    }

    public function setCustomer(array $customerData){
        $this->name = $customerData['name'];
        $this->gender = $customerData['gender'];
        $this->birthdate = $customerData['birthdate'];
        $this->address = isset( $customerData['address'] )? ( empty( $customerData['address'] )? null: $customerData['address'] ): null;
        return $this->save()? $this->id: false;
    }

    public function updateCustomer(int $id, array $customerData){
        $customer = $this->find($id);
        $customer->name = $customerData['name'];
        $customer->gender = $customerData['gender'];
        $customer->birthdate = $customerData['birthdate'];
        $customer->address = isset( $customerData['address'] )? ( empty( $customerData['address'] )? null: $customerData['address'] ): null;
        return $customer->save()? $customer->id: false;
    }

    public function deleteCustomer(int $id){
        return $this->destroy($id)? true: false;
    }

    public function sales(){
        return $this->hasMany(Sale::class, 'customer_id', 'id');
    }
}

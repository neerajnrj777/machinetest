<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    public function productList()
    {

        return  \DB::select("SELECT * FROM productdetails");


    }
    public function addProduct()
    {

        return  \DB::select("SELECT * FROM productdetails");


    }
    public function updateProduct($user)
    {

        return  \DB::select("UPDATE users SET name='$user[0]',email='$user[2]' WHERE id=$user[1]");


    }
}

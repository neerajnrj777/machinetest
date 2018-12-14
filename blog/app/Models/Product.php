<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    public function productList()
    {

        return  \DB::select("SELECT * FROM productdetails WHERE is_active=1");


    }

    public function productselect($pid)
    {

        return  \DB::select("SELECT * FROM productdetails WHERE pid=$pid");


    }

    public function addProduct($prod)
    {

        $id = \DB::table('productdetails')->insertGetId([
    'sku' => $prod[0],
    'pname' => $prod[1],
    'price' => $prod[2],
    'status' => $prod[3],
    'quantity' => $prod[4]

]);
    return $id;

    }
    public function updateProduct($prod)
    {

        return  \DB::select("UPDATE productdetails SET sku='$prod[0]',pname='$prod[1]',price=$prod[2],status='$prod[3]',quantity=$prod[4] WHERE pid=$prod[5]");


    }

    public function imageUpload($image)
    {

        $img = \DB::table('imagedetails')->insertGetId([
    'pid' => $image[0],
    'imagename' => $image[1]

]);


    }

    public function deleteProduct($id) {

    	return \DB::table('productdetails')
        ->where('pid', $id)  // find your user by their email
        ->limit(1)  // optional - to ensure only one record is updated.
        ->update(array('is_active' => 0));
    }

    public function viewImage($id) {

    	return  \DB::select("SELECT * FROM imagedetails WHERE pid=$id");
    }

    public function deleteImage($id) {

    	return \DB::table('imagedetails')->delete($id);
    }
}

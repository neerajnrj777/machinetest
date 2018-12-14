<?php

namespace App\Http\Controllers;


use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\User;
use App\Models\Product;

class ProductController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $product = new Product();
        $productdetails=$product->productList();
        //print_r($productdetails);die();
        
        return view('product.index',['products' => $productdetails]);
    }
    
    public function addproduct(Request $request)
    {
        $prod=new Product();
        if(!is_null($request->input('productsku'))) {
            $product[0]=$request->input('productsku');
            $product[1]=$request->input('productname');
            $product[2]=$request->input('productprice');
            $product[3]=$request->input('status');
            $product[4]=$request->input('productquantity');
            //print_r($product);//die();

             if(!is_null($request->input('pid'))) {
                $product[5]=$request->input('pid');
                        $pids=$prod->updateProduct($product);
                        $pid=$request->input('pid');
                    } else {
                        $pid=$prod->addProduct($product);
                    }

            if(!is_null($_FILES["files"]["tmp_name"])) {
                //print_r($_FILES["files"]);die();
                $errors = array();
                $uploadedFiles = array();
                $extension = array("jpeg","jpg","png","gif");
                $bytes = 1024;
                $KB = 1024;
                $totalBytes = $bytes * $KB;
                $UploadFolder=public_path()."/uploads/images";
                //echo $publicpath;die();
                $counter = 0;
                
                foreach($_FILES["files"]["tmp_name"] as $key=>$tmp_name){
                    $temp = $_FILES["files"]["tmp_name"][$key];
                    $name = $_FILES["files"]["name"][$key];
                    
                    if(empty($temp))
                    {
                        break;
                    }
                    
                    $counter++;
                    $UploadOk = true;
                    
                    if($_FILES["files"]["size"][$key] > $totalBytes)
                    {
                        $UploadOk = false;
                        array_push($errors, $name." file size is larger than the 1 MB.");
                    }
                    
                    $ext = pathinfo($name, PATHINFO_EXTENSION);
                    if(in_array($ext, $extension) == false){
                        $UploadOk = false;
                        array_push($errors, $name." is invalid file type.");
                    }
                    
                    //if(file_exists($UploadFolder."/".$name) == true){
                   //     $UploadOk = false;
                    //    array_push($errors, $name." file is already exist.");
                   // }
                    
                    if($UploadOk == true){
                        move_uploaded_file($temp,$UploadFolder."/".$name);
                        
                        $mg[0]=$pid;
                        $mg[1]=$name;
                        
                        $prod->imageUpload($mg);                     

                        array_push($uploadedFiles, $name);
                    }
                }
                $err='';
                if($counter>0){
                    if(count($errors)>0)
                    {
                        $err.= "<b>Errors:</b>";
                        $err.= "<br/><ul>";
                        foreach($errors as $error)
                        {
                            $err.= "<li>".$error."</li>";
                        }
                        $err.= "</ul><br/>";
                    }
                    
                    if(count($uploadedFiles)>0){
                                            
                        $err.= "<b>Uploaded Files:</b>";
                        $err.= "<br/><ul>";
                        foreach($uploadedFiles as $fileName)
                        {
                            $err.= "<li>".$fileName."</li>";
                        }
                        $err.= "</ul><br/>";
                        
                        $err.= count($uploadedFiles)." file(s) are successfully uploaded.";
                    }                               
                } else {
                    $err.= "Please, Select file(s) to upload.";
                } //echo $err;die();
                    $productdetails=$prod->productlist();
                return view('product.index',['products' => $productdetails]);

            }
        }
        $productdetails=array();
        if(!is_null($request->input('id'))) {
            $productdetails=$prod->productselect($request->input('id'));
        }
        

        return view('product.form',['products' => $productdetails]);
           
    }
    public function productdelete(Request $request)
    {
        $prod=new Product();
            if(!is_null($request->input('data1'))) {
                $id=$request->input('data1');
                $prod->deleteProduct($id);
                return 'success';
            }
            return "no data";
        
    }

    public function viewimage(Request $request)
    {
        $prod=new Product();
            if(!is_null($request->input('data1'))) {
                $id=$request->input('data1');
                $img=$prod->viewImage($id);
                return json_encode($img);
            }
            return "no data";
        
    }

     public function deleteimage(Request $request)
    {
        $prod=new Product();
            if(!is_null($request->input('data1'))) {
                $id=$request->input('data1');
                $prod->deleteImage($id);
                return 'success';
            }
            return "no data";
        
    }
    
}

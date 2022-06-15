<?php

class Orderdetails extends Controller
{
    public function __construct()
    {
        $this->usersModel = $this->model('usersModels');

    }

    public function index()
    {
        $uservalid = new  userValidation(); 
        $uservalid->startSession();

        $order = $this->usersModel->getProduct($_SESSION['username']);
        if(!empty($order)){
        $product=$this->usersModel->getuserProduct($order->product_id);
        $this->viewwithtwoParameter('Order_Details/view_order',$product,$order);
        }else{
         $order=[];
         $product=[];
         $this->viewwithtwoParameter('Order_Details/view_order',$product,$order);
        }
    }
}
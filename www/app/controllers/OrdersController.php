<?php
class OrdersController extends BaseController
{
    public function anyAdd(){
        $input = Input::all();
        $product_id = $input['laproduct_id'];
        $amount = $input['amount'];
        $variantname = $input['variantname'];
        $product = Product::find($product_id);
        if($product->count() > 0){
            $cart = array(
                'id' => $product->id,
                'latitle' => $product->latitle,
                'amount' => $amount,
                'laprice' => $product->laprice,
                'variantname' => $variantname,
            );
            if(Session::has('cart.'.$product_id)){
                $oldcart = Session::get('cart.'.$product_id);
                $cart['amount'] = $cart['amount'] + $oldcart['amount'];
                Session::forget('cart.'.$product_id);
                Session::put('cart.'.$product_id,$cart);
            }
            else{
                Session::put('cart.'.$product_id,$cart);
            }
            Session::put('hasnew',1);
        }

        return Redirect::back();
    }
    public function getClear(){
        Session::flush();
        return Redirect::back();
    }
}
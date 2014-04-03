<?php
class OrdersController extends BaseController
{
    private $data = array(
        'typeEnd' => 'cart',
        'haveHeader'=> 1,
        'title'=> 'Thanh toán',
        'sidebartype' => 'none',  //sright - sleft - none

    );
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
                'caturl' => $input['caturl'],
                'producturl' => $input['producturl'],
                'variantid' => $product->lavariant_id,
                'laimage' => $product->laimage,
                'lakhoiluong' => $product->lakhoiluong,
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
    public function anyIndex(){
        return View::make(Config::get('shop.theme')."/cart/cart",$this->data);
    }
    public function anyAddvoucher(){
        $input = Input::all();
        if(isset($input['vouchercode']) && trim($input['vouchercode']) != '' ){
            $voucher = Voucher::checkVoucher($input['vouchercode']);
            if($voucher == null){
                Session::put('actionstatus',Config::get('actionstatus.voucher_not_avail'));
            }
            else{
                if( strtotime($voucher['to']) < time())
                    Session::put('actionstatus',Config::get('actionstatus.voucher_expried'));
                    else
                Session::put('voucher',$voucher);
            }
        }
        else{
            Session::put('actionstatus',Config::get('actionstatus.voucher_not_input'));
        }
         return Redirect::back();
    }
    public function postSaveorderinfo(){
        $input = Input::all();
        if(count($input) > 0){

        }
        return Redirect::back();
    }
}
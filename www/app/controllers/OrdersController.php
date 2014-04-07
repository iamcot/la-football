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
                'product_id' => $product->id,
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
            Session::put('actionstatus',Config::get('actionstatus.cart_has_new'));
        }

        return Redirect::back();
    }
    public function getChangeamout($product_id,$type){
        if(Session::has('cart.'.$product_id)){
            $oldcart = Session::get('cart.'.$product_id);
            if($type == 1){
                $oldcart['amount']+= 1;
                Session::put('cart.'.$product_id,$oldcart);
            }
            else {
                if($oldcart['amount'] == 1){
                    Session::forget('cart.'.$product_id);
                    if(count(Session::get('cart'))<=0)
                        Session::forget('cart');
                }
                else{
                    $oldcart['amount']-= 1;
                    Session::put('cart.'.$product_id,$oldcart);
                }
            }

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
    public function anyDelvoucher(){
        Session::forget('voucher');
        return Redirect::back();
    }
    public function getOld($orderid){
        $order = Orders::find($orderid);

        if($order != null){
            if($order->id == Session::get('lastorder',0) || $order->uid == Session::get('uid',-1) || $order->user_id == Session::get('user_id',-1)) {
                $this->data['orderitems'] = Orderitem::where('order_id','=',$order->id)->get();
                $this->data['title'] = 'Đơn hàng '.$order->id;
            }
            else{
                $order = null;
            }

        }
        $this->data['orderinfo'] = $order;
        return View::make(Config::get('shop.theme')."/cart/checkoutinfo",$this->data);
    }
    public function postCheckout(){
        $input = Input::all();
        if(count($input) > 0 && $input['_token'] == Session::get('_token')){
            if(Session::has('voucher')) {
                $voucher = Session::get('voucher.id');
            }
            else $voucher = '';
            $orderinfo = array(
                'lashipping' => $input['shipping'],
                'lapayment' => $input['payment'],
                'lasumkhoiluong' => $input['sumkhoiluong'],
                'lafeeshipping' => $input['feeshipping'],
                'laordername' => $input['ordername'],
                'laordertel' => $input['ordertel'],
                'laorderemail' => $input['orderemail'],
                'laorderaddr' => $input['orderaddr'],
                'laorderprovince' => $input['orderprovince'],
                'laorderdistrict' => $input['orderdistrict'],
                'sumsanpham' => $input['sumsanpham'],
                'giamvoucher' => $input['giamvoucher'],
                'laordernote' => $input['laordernote'],
                'voucher' => $voucher,

            );
            if(Session::has('uid')) $orderinfo['uid'] = Session::get('uid');
            if(Session::has('user_id')) $orderinfo['user_id'] = Session::get('user_id');
            Session::put('order',$orderinfo);
            $order = Orders::create($orderinfo);
            $orderid = $order->id;
            Session::put('lastorder',$orderid);
            if(Session::has('cart')){
                foreach(Session::get('cart') as $cart){
                    $cart['order_id'] = $orderid;
                    Session::put('cart.'.$cart['product_id'],$cart);
                    Orderitem::create(Session::get('cart.'.$cart['product_id']));
                }
            }
            $this->data['orderinfo'] = Orders::find($orderid);
            $this->data['orderitems'] = Orderitem::where('order_id','=',$orderid)->get();
            $this->data['title'] = 'Đơn hàng '.$this->data['orderinfo']->id;
            Session::put('_token', md5(microtime()));
            Session::forget('cart');
            Session::forget('voucher');
            return View::make(Config::get('shop.theme')."/cart/checkoutinfo",$this->data);
        }
        else{
            return Redirect::back();
        }
       // var_dump(Session::all());
        //return Redirect::back();
    }
    public function getCheckshipping($shiptype){
        $payment = Config::get('shop.payment');
        $shiplist = Config::get('shop.shipping');
        $acceptpayment = $shiplist[$shiptype]['pay_allow'];
        $paymentlist = array();
        foreach($acceptpayment as $payi){
            $paymentlist[$payi] = $payment[$payi];
        }
        $acceptprovince = $shiplist[$shiptype]['province_allow'];
        $province = Config::get('shop.province');
        $provincelist = array();
//        $enabledistrict = 0;
        if($acceptprovince != null){
            foreach($acceptprovince as $p){
                $provincelist[$p] = $province[$p];
//                if($p=='hcm') $enabledistrict = 1;
            }
        }
        else{
            foreach($province as $key=>$p){
                $provincelist[$key] = $p;
//                if($key=='hcm') $enabledistrict = 1;
            }
        }
//        $result['enabledistrict'] = $enabledistrict;
        $result['payment'] = $paymentlist;
        $result['province'] = array_values(array_sort($provincelist, function($value) { return $value['id']; }));;
        return Response::json($result);
    }
    public function getCheckfee(){
        $input = Input::all();
        $province = $input['province'];
        $klg = $input['klg'];
        $shipmethod = $input['shipping'];
        $payment = $input['payment'];
        $district = $input['district'];
        $token   = $input['token'];
        $result = array();
        if($token == Session::get('_token')){
            $aProvince = Config::get('shop.province');
            $aShipping = Config::get('shop.shipping');
            $actProvince = $aProvince[$province];
            $feeshipping = 40000; //default
            if($shipmethod == 'ship_ems'){
                $emsPrice = Config::get('shop.emsprice');
                foreach($emsPrice as $price){
                    if($klg >= $price['klg'])
                        continue;
                    else{
                        $group = $actProvince['group'];
                        if($group>0){
                            $feeshipping = $price['g'.$group.'a'];
                            if($payment == 'pay_cod') $feeshipping += 15000;//fee of COD
                            $result['status'] = 1;
                            break;
                        }
                    }
                }
            }
            else if($shipmethod == 'ship_post'){
                if($klg>=2000){
                    $result['status'] = -1;
                }
                else{
                    $postprice = Config::get('shop.postprice');
                    foreach($postprice as $price){
                        if($klg >= $price['klg'])
                            continue;
                        else{
                            $feeshipping = $price['price'];
                            if($payment == 'pay_cod') $feeshipping += 15000;//fee of COD
                            $result['status'] = 1;
                            break;
                        }
                    }
                }
            }
            else if($shipmethod == 'ship_hcm'){
                $aDistrict = Config::get('shop.hcm_district');
                $feeshipping = $aDistrict[$district]['fee'];
                $result['status'] = 1;
            }
            else if($shipmethod == 'ship_xe'){
                $feeshipping = 55000;
                $result['status'] = 1;
            }
            else{
                $feeshipping = 0;
                $result['status'] = 1;
            }
            $result['time'] = $aShipping[$shipmethod]['time'];
            $result['feeshipping'] = $feeshipping;
        }
        else $result['status'] = 'Permission Error: Request is denined ^^';
        return Response::json($result);
    }
}
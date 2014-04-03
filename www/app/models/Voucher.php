<?php
class Voucher extends  Eloquent{
    public static function checkVoucher($vouchercode){
        return Config::get('voucher.'.$vouchercode);
    }
}
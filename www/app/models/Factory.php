<?php
class Factory extends Eloquent
{
    protected $table = 'lamanufactors';
    public static function adminSelectFactor($select=0){
        $html = "<option value='0' ".(($select==0)?'selected':'').">Nhà Sản xuất</option>";
        $factors  = Factory::all();
        foreach ($factors as $factor) {
                $html .= "<option value='" . $factor->id . "'  ".(($select==$factor->id)?'selected':'').">
                     " .  $factor->latitle . "
                </option>";
        }

        return $html;
    }
}
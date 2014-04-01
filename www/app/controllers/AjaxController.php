<?php
class AjaxController extends BaseController{
    public function anyGetvariant($id){
        $variants = Product::find($id);
        $otherpics = Image::where('laproduct_id','=',$id)
            ->where('lapic','!=',$variants->laimage)
            ->take(1)
            ->get();
        if(count($otherpics)>0){
            $otherpic = $otherpics[0];
            $variants['lapic'] = $otherpic->lapic;
        }
          else $variants['lapic'] = $variants->laimage;
        return Response::json($variants);
    }
}
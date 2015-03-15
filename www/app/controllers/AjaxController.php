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
    public function postSavenewsletter($email){
        $findemail = Newsletter::where('email',$email)->first();
        if(!$findemail){
            $newemail = Newsletter::create(array('email'=>$email));
            if($newemail){
                echo $newemail->id;
            }
            else echo 0;
        }
        else echo -1;

    }

    public function anyEditprice($productId, $editPrice)
    {
        echo Product::find($productId)
            ->update(array('laprice'=>$editPrice));
    }
    public function anyEos($productId)
    {
        echo Product::find($productId)
            ->update(array('laamount'=> 0));
    }
    public function anyFos($productId)
    {
        echo Product::find($productId)
            ->update(array('laamount'=> 10));
    }

}
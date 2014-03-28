<?php
class Category extends Eloquent
{
    protected $table = 'lacategories';

    public function treecat()
    {
        return DB::table($this->table . ' as d')
            ->leftJoin($this->table . ' as d1', 'd1.laparent_id', '=', 'd.id')
            ->leftJoin($this->table . ' as d2', 'd2.laparent_id', '=', 'd1.id')
            ->select('d.latitle as title', 'd1.latitle as title1', 'd2.latitle as title2')
            ->where('d.laparent_id', '0');
    }
}
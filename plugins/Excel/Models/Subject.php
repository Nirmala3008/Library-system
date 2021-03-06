<?php
namespace Nitseditor\Plugins\Excel\Models;

use Nitseditor\Framework\Models\AbstractModel;
use Illuminate\Database\Eloquent\SoftDeletes;

class Subject extends AbstractModel {

    use SoftDeletes;

    protected $guarded= [];

public function books()
{
    return $this->belongsToMany(Books::class,'subject_book','subject_id','book_id');
}

}

<?php
namespace Nitseditor\Plugins\Excel\Models;

use Nitseditor\Framework\Models\AbstractModel;
use Illuminate\Database\Eloquent\SoftDeletes;

class Standard extends AbstractModel {

    use SoftDeletes;

    protected $guarded= [];

//    public function Subjects()
//    {
//        return $this->belongsTo(Subject::class);
//    }

    public function library()
    {
        return $this->belongsTo(Library::cass);
    }

}

<?php
namespace Nitseditor\Plugins\Excel\Models;

use Nitseditor\Framework\Models\AbstractModel;
use Illuminate\Database\Eloquent\SoftDeletes;

class Standard extends AbstractModel {

    use SoftDeletes;

    protected $guarded= [];

    public function Subjects()
    {
        return $this->belongsToMany(Subject::class,'subject_library','standard_id','subject_id');
    }

    public function library()
    {
        return $this->belongsTo(Library::class);
    }

}

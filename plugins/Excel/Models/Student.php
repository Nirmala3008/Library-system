<?php
namespace Nitseditor\Plugins\Excel\Models;

use mysql_xdevapi\Statement;
use Nitseditor\Framework\Models\AbstractModel;
use Illuminate\Database\Eloquent\SoftDeletes;

class Student extends AbstractModel {

    use SoftDeletes;

    protected $guarded= [];

    public function state()
    {
        return $this->belongsTo(State::class,'state_id','id');
    }
    public function region()
    {
        return $this->belongsTo(Region::class,'region_id','id');
    }
    public function library()
    {
        return $this->hasMany(Library::class,'student_id','id');
    }
}

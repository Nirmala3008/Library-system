<?php
namespace Nitseditor\Plugins\Excel\Models;

use Nitseditor\Framework\Models\AbstractModel;
use Illuminate\Database\Eloquent\SoftDeletes;

class Library extends AbstractModel {
    protected $fillable = ['library_name'];

    use SoftDeletes;

//    protected $guarded= [];
    public function student()
    {
        return $this->belongsTo(Student::class);
    }

    public function standard()
    {
        return $this->hasMany(Standard::class,'library_id','id');
    }
    public function subject()
    {
        return $this->belongsToMany(Subject::class,'subject_library','library_id','subject_id');
    }

}

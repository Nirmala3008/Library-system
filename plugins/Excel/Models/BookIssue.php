<?php
namespace Nitseditor\Plugins\Excel\Models;

use Nitseditor\Framework\Models\AbstractModel;
use Illuminate\Database\Eloquent\SoftDeletes;

class BookIssue extends AbstractModel {

    use SoftDeletes;

    protected $guarded= [];

    public function student()
    {
        return $this->belongsTo(Student::class);
    }

    public function library()
    {
        return $this->belongsTo(Library::class);
    }

    public function book()
    {
        return $this->belongsTo(Books::class);
    }




}

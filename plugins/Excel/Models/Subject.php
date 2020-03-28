<?php
namespace Nitseditor\Plugins\Excel\Models;

use Nitseditor\Framework\Models\AbstractModel;
use Illuminate\Database\Eloquent\SoftDeletes;

class Subject extends AbstractModel {

    use SoftDeletes;

    protected $guarded= [];

}

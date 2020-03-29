<?php
namespace Nitseditor\Plugins\Excel\Models;

use Nitseditor\Framework\Models\AbstractModel;
use Illuminate\Database\Eloquent\SoftDeletes;

class Books extends AbstractModel {

    use SoftDeletes;

    protected $guarded= [];


}

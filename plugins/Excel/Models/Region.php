<?php
namespace Nitseditor\Plugins\Excel\Models;

use Nitseditor\Framework\Models\AbstractModel;
use Illuminate\Database\Eloquent\SoftDeletes;

class Region extends AbstractModel {

    use SoftDeletes;

    protected $guarded= [];

}

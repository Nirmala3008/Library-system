<?php

namespace Nitseditor\Plugins\Confidence\Exports;

use Illuminate\Http\Request;
use Maatwebsite\Excel\Concerns\FromCollection;
use Nitseditor\Plugins\Confidence\Models\User;

class UsersExport implements FromCollection
{
    private $request;

    /**
     * ExportController constructor.
     * @param Request $request
     */
    public function __construct(Request $request)
    {
        $this->request = $request;
    }
    /**
     * @return \Illuminate\Database\Eloquent\Collection|\Illuminate\Support\Collection|User[]
     */
    public function collection()
    {
        return User::all();
    }
}

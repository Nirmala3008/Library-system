<?php
namespace Nitseditor\Plugins\Excel\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class StudentResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            //Your resource model.
            'first_name' => $this->first_name,
            'last_name' => $this->last_name,
            'address' => $this->address,
            'roll_number' =>$this->roll_number,
            'email' => $this ->email,
            'state' => $this ->state ? $this ->state->name :'',
            'region' => $this ->region ? $this ->region->name : '',

        ];
    }
}

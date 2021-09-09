<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class UserResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
		$data['id']= $this->id;
		$data['name']= $this->name;
		$data['email']= $this->email;
        $data['phone']= $this->phone;
        $data['adr']= $this->adr;
        $data['description']= $this->description;
        $data['secteur']= $this->secteur;
        $data['siteWeb']= $this->siteWeb;

		//$data['image_url']= isset($this->picture)? $this->picture->full_path : null;
        return $data;
    }
}

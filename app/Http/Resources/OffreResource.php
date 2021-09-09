<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class OffreResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return
        [
            'id'=>$this->id,
			 'title'=>$this->title,
			  'content'=>$this->content,
			   'category_id'=>$this->category_id,
            // 'status'=>$this->status,

             'created_at' =>$this->created_at->format('jS F Y h:i:s A')
        ];
    }
}

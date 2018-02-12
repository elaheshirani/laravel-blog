<?php

namespace App\Http\Resources\v1;

use Illuminate\Http\Resources\Json\Resource;

class Blog extends Resource
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
            'user_id'=>$this->user->name,
            'tags'=>new TagCollection($this->tags),
            'title'=>$this->title,
            'description'=>$this->description,
            'date'=>jdate($this->created_at)->format('datetime')
        ];
    }
}

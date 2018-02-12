<?php

namespace App\Http\Resources\v1;

use Illuminate\Http\Resources\Json\ResourceCollection;

class BlogCollection extends ResourceCollection
{
    /**
     * Transform the resource collection into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'data'=>$this->collection->map(function($item){
                return [
                    'author'=>$item->user->name,
                    'title'=>$item->title,
                    'description'=>$item->description,
                    'date'=>jdate($item->created_at)->format('datetime')
                ];
            })
        ];

    }
}

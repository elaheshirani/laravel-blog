<?php

namespace App\Http\Controllers\Api\v1;

use App\Blog;
use \App\Http\Resources\v1\Blog as BlogResource;
use App\Http\Resources\v1\BlogCollection;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class BlogController extends Controller
{
    public function index(){
        $blogs = Blog::paginate(2);
        //return BlogResource::collection($blogs);
       // return response()->json($blogs);
        return new BlogCollection($blogs);
    }

    public function show(Blog $blog){
        return new BlogResource($blog);
    }

    public function store(Request $request){
        $validator = Validator::make($request->all(),[
            'user_id' => 'required|max:255',
            'title' => 'required|max:255',
            'description' => 'required'
        ]);

        if($validator->fails())
        {
            return response([
                'data'=>[$validator->errors()],
                'status'=>'error'
            ],422);
        }

        return response([
            'data'=>[],
            'status'=>'success'
        ],200);
    }


}

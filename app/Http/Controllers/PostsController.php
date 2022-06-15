<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use App\Post;

class PostsController extends BaseController {

    public function storePost($user_id, $project_id){
        if (!Input::all()) {
            return $this->setStatusCode(406)->makeResponse('No information provided to create post');
        }

        if (!Input::get('subject')) {
            return $this->setStatusCode(406)->makeResponse('Please enter a subject for the post');
        }

        if (!Input::get('body')) {
            return $this->setStatusCode(406)->makeResponse('Please enter a body for the post');
        }

        Input::merge(array('user_id' => Auth::id(), 'user_id' => $user_id, 'project_id' => $project_id));

        Post::create(Input::all());
        $id = \DB::getPdo()->lastInsertId();

        return $this->setStatusCode(200)->makeResponse('Post created successfully', Post::find($id));
    }

    // Update the given task
    public function updatePost($id){
        if (!Post::find($id)) {
            return $this->setStatusCode(400)->makeResponse('Could not find the post');
        }

        if ( Input::get('subject') === "") {
            return $this->setStatusCode(406)->makeResponse('The post needs a subject');
        }

        if ( Input::get('body') === "") {
            return $this->setStatusCode(406)->makeResponse('The post needs a body');
        }

        $input = Input::all();
        unset($input['_method']);

        Post::find($id)->update($input);
        return $this->setStatusCode(200)->makeResponse('The post has been updated');
    }

    // Remove the given task from the database
    public function removePost($id){
        if (!Post::find($id)) {
            return $this->setStatusCode(400)->makeResponse('Could not find the post');
        }

        Post::find($id)->delete();
        return $this->setStatusCode(200)->makeResponse('Post deleted successfully');
    }

}
<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;

class PostController extends Controller
{

    public function showEditForm(Post $post)
    {
        // For extra security, lets check if the authenticated user is the owner of the post
        if (auth()->id() !== $post->user_id) {
            return redirect('/');
        }

        return view('edit-post', ['post' => $post]);
    }

    public function editPost(Request $request, Post $post)
    {
        if (auth()->id() !== $post->user_id) {
            return redirect('/');
        }


        // Kol da validation zay el createPost below, skip
        $input = $request->validate([
            'title' => ['required', 'string', 'max:70'],
            'content' => ['required', 'string'],
            'category' => ['required', 'string', 'max:50'],
        ]);

        $input['title'] = strip_tags($input['title']);
        $input['content'] = strip_tags($input['content']);

        if (!(in_array($input['category'], ['Technology', 'Lifestyle', 'Education']))) {
            return redirect('/');
        }

        // Laravel is really making it easy to update this:
        $post->update($input);
        return redirect('/');
    }
    public function createPost(Request $request)
    {
        // Validate the request data
        $input = $request->validate([
            'title' => ['required', 'string', 'max:70'],
            'content' => ['required', 'string'],
            'category' => ['required', 'string', 'max:50'],
        ]);

        $input['title'] = strip_tags($input['title']);
        $input['content'] = strip_tags($input['content']);


        if (!(in_array($input['category'], ['Technology', 'Lifestyle', 'Education']))) {
            return redirect('/');
        }

        // add foreign key user_id to each post in order to identify who's the creator
        $input['user_id'] = auth()->id(); 
        Post::create($input);

        return redirect('/');
    }
    public function deletePost(Post $post)
    {
        if (auth()->id() == $post->user_id) {
            $post->delete();
        }

        return redirect('/');
    }
}

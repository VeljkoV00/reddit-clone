<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Http\Resources\PostShowResource;
use App\Models\Community;
use App\Models\Post;
use Illuminate\Http\Request;
use Inertia\Inertia;

class PostController extends Controller
{
    public function show($community_slug, $slug){

        $community = Community::where('slug', $community_slug)->firstorFail();
        $post = new PostShowResource(Post::where('slug', $slug )->first());
        return Inertia::render('Frontend/Community/Post/Show', compact('community', 'post'));
    }


}

<?php

namespace App\Http\Controllers\Frontend;

use Inertia\Inertia;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\CommunityPostResource;
use App\Http\Resources\CommunityResource;
use App\Models\Community;
use App\Models\Post;

class WelcomeController extends Controller
{
    public function welcome(){

        $posts = CommunityPostResource::collection(Post::all());
        

        $communities = CommunityResource::collection(Community::with('posts')->take(6)->get());
        return Inertia::render('Welcome', compact('posts', 'communities'));
    }
}

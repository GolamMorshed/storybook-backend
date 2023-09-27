<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\StoreStory;
class UserStoryPageController extends Controller
{
    // public function store(Request $request)
    // {
        
    //     $userStoryPage = StoreStory::create([
    //         'user_id' => $request->input('user_id'),
    //         'story_id' => $request->input('story_id'),
    //         'page_number' => $request->input('page_number'),
    //     ]);

    //     return response()->json(['message' => 'User story page stored successfully'], 201);
    // }

    public function store(Request $request)
    {
        
        $existingRecord = StoreStory::where('user_id', $request->input('user_id'))
            ->where('story_id', $request->input('story_id'))
            ->first();

        if ($existingRecord) {
            $existingRecord->update([
                'page_number' => $request->input('page_number'),
            ]);
        } else {
            // Create a new record
            $userStoryPage = StoreStory::create([
                'user_id' => $request->input('user_id'),
                'story_id' => $request->input('story_id'),
                'page_number' => $request->input('page_number'),
            ]);
        }

        return response()->json(['message' => 'User story page stored or updated successfully'], 201);
    }

    
    public function getUserStories($user_id)
    {
        $stories = StoreStory::where('user_id', $user_id)->get();
        return response()->json(['data' => $stories], 200);
    }
}

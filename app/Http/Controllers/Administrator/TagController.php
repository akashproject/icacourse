<?php

namespace App\Http\Controllers\Administrator;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Tag;

class TagController extends Controller
{
    //
    public function index()
    {
        try {

            $tags = Tag::all();
            return view('administrator.tags.index',compact('tags'));

        } catch(\Illuminate\Database\QueryException $e){
            throw $e;
        }
    }

    public function show($id)
    {
        try {
            $tag = Tag::find($id);
            $tags = Tag::all();

            return view('administrator.tags.show',compact('tag','tags'));
        } catch(\Illuminate\Database\QueryException $e){
            var_dump($e->getMessage()); 
        }        
    }

    public function save(Request $request) {
        try {
            $data = $request->all();
            $validatedData = $request->validate([
                'name' => 'required',
                'slug' => 'required',
                'status' => 'required',
            ]);
            if($data['tag_id'] <= 0){
                Tag::create($data);
            } else {
                $tag = Tag::findOrFail($data['tag_id']);
                $tag->update($data);
            }
            return redirect()->back()->with('message', 'Page updated successfully!');
        } catch(\Illuminate\Database\QueryException $e){
            var_dump($e->getMessage()); 
        }
    }

    
    public function delete($id) {
        $tag = Tag::findOrFail($id);
        $tag->delete();
        return redirect()->back()->with('message', 'Tag updated successfully!');
    }
}

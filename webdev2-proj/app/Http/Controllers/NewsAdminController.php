<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\News;

class NewsAdminController extends Controller
{
    public function getIndex() {
        $posts = News::get();

        return view('admin.read.news', compact('posts'));
    }

    public function add() {
        return view("admin.add.news");
    }

    public function edit($language, $id = null) {
        $post = News::findOrFail($id);
        return view("admin.edit.news", compact(['post', 'id']));
    }

    public function save(Request $r) {
        $post = new News();

        $post->title_en = $r->input('title_en');
        $post->intro_en = $r->input('intro_en');
        $post->text_en = $r->input('text_en');
        $post->title_nl = $r->input('title_nl');
        $post->intro_nl = $r->input('intro_nl');
        $post->text_nl = $r->input('text_nl');

        if($r->hasfile('image')) {
            $file = $r->file('image');
            $extension = $file->getClientOriginalExtension();
            $filename = time() . '.' . $extension;
            $file->move('images/news/', $filename);
            $post->image = $filename;
        } elseif($r->id) {
        } else {
            return "not a valid image!";
        }

        if($r->id) {
            $post = $post->toArray();
            $update = News::where('id', $r->id)->first();
            $update->update($post);   
        } else {
            $post->save();
        }

        return redirect()->route('newsAdmin', app()->getLocale());
    }
    
    public function destroy($language, $id) {
        News::find($id)->delete();
        return redirect()->route('newsAdmin', app()->getLocale());
    }
}

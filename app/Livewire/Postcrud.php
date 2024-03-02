<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Post;
use Illuminate\Support\Facades\Auth;

class Postcrud extends Component
{
    public $posts, $user, $postId, $title, $content, $meta_desc, $url_slug;
    public $isModalOpen = 0;
    public function render()
    {
        $this->posts = Post::all();
        $this->user = Auth::user();
        return view('livewire.postcrud');
    }
    public function create()
    {
        $this->resetCreateForm();
        $this->openModalPopover();
    }
    public function openModalPopover()
    {
        $this->isModalOpen = true;
    }
    public function closeModalPopover()
    {
        $this->isModalOpen = false;
    }
    private function resetCreateForm()
    {
        $this->title = '';
        $this->content = '';
        $this->meta_desc = '';
        $this->url_slug = '';
    }

    public function store()
    {
        $this->validate([
            'title' => 'required',
            'content' => 'required',
            'meta_desc' => 'nullable',
            'url_slug' => 'nullable',
        ]);

        Post::updateOrCreate(['id' => $this->postId], [
            'title' => $this->title,
            'content' => $this->content,
            'meta_desc' => $this->meta_desc,
            'url_slug' => $this->url_slug,
            'user_id' => Auth::user()->id,
        ]);
        session()->flash('message', $this->postId ? 'Post updated.' : 'Post created.');
        $this->closeModalPopover();
        $this->resetCreateForm();
    }

    public function edit($id)
    {
        $post = Post::findOrFail($id);
        $this->title = $post->title;
        $this->content = $post->content;
        $this->meta_desc = $post->meta_desc;
        $this->url_slug = $post->url_slug;
        $this->postId = $post->id;

        $this->openModalPopover();
    }

    public function update()
    {
        $this->validate([
            'title' => 'required',
            'content' => 'required',
            'meta_desc' => 'nullable',
            'url_slug' => 'nullable',
        ]);

        Post::updateOrCreate(['id' => $this->postId], [
            'title' => $this->title,
            'content' => $this->content,
            'meta_desc' => $this->meta_desc,
            'url_slug' => $this->url_slug,
            'user_id' => Auth::user()->id,
        ]);
        session()->flash('message', $this->postId ? 'Post updated.' : 'Post created.');
        $this->closeModalPopover();
        $this->resetCreateForm();
    }

    public function delete($id)
    {
        Post::find($id)->delete();
        session()->flash('message', 'Post deleted.');
    }
}

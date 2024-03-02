<x-slot name="header">
    <h2 class="text-center">All Posts</h2>
</x-slot>
<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg px-4 py-4">
            @if (session()->has('message'))
            <div class="bg-teal-100 border-t-4 border-teal-500 rounded-b text-teal-900 px-4 py-3 shadow-md my-3"
                role="alert">
                <div class="flex">
                    <div>
                        <p class="text-sm">{{ session('message') }}</p>
                    </div>
                </div>
            </div>
            @endif
            <button wire:click="create()"
                class="my-4 mx-auto flex items-center justify-center w-1/2 rounded-md border border-transparent px-4 py-2 bg-red-600 text-base font-bold text-white shadow-sm hover:bg-red-700 mb-4">
                Create New Post
            </button>
            @if($isModalOpen)
            @include('livewire.create')
            @endif
            <table class="table-fixed w-full">
                <thead>
                    <tr class="bg-gray-100">
                        <th class="px-4 py-2">Title</th>
                        <th class="px-4 py-2">Created By</th>
                        <th class="px-4 py-2">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($posts as $post)
                    <tr>
                        <!-- Title -->
                        <td class="border px-4 py-2">{{ $post->title }}</td>

                        <!-- Created By -->
                        <td class="border px-4 py-2">{{ $post->createdBy->name }}</td>

                        <!-- Actions -->
                        <td class="border px-4 py-2 text-center">
                            <a href="{{ route('posts.show', $post->id) }}"
                                class="inline-block px-2 py-1 bg-gray-500 text-white cursor-pointer rounded">
                                View
                            </a>

                            <!-- If post is created by user, don't allow to edit or delete -->
                            @if ($user->id == $post->user_id)

                            <button x-on:click="() => $wire.edit('{{ $post->id }}')"
                                class="mt-2 inline-block px-2 py-1 bg-gray-500 text-white cursor-pointer rounded">
                                Edit
                            </button>

                            <button x-on:click="() => $wire.delete('{{ $post->id }}')"
                                class="mt-2 inline-block px-2 py-1 bg-red-500 text-white cursor-pointer rounded">
                                Delete
                            </button>
                            @endif
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
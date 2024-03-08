<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Home') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
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
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-app-layout>
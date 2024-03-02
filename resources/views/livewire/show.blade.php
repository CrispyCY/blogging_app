<x-app-layout>
    <x-slot name="header">
        <h2 class="text-center">{{ $post->title }}</h2>
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
                <table class="table-fixed w-full">
                    <thead>
                        <tr class="bg-gray-100">
                            <th class="px-4 py-2">Content</th>
                            <th class="px-4 py-2">Url Slug</th>
                            <th class="px-4 py-2">Meta Description</th>
                            <th class="px-4 py-2">Created By</th>
                        </tr>
                    </thead>
                    <tbody>
                        <td class="border px-4 py-2">{{ $post->content }}</td>
                        <td class="border px-4 py-2">{{ $post->url_slug }}</td>
                        <td class="border px-4 py-2">{{ $post->meta_desc }}</td>
                        <td class="border px-4 py-2">{{ $post->createdBy->name }}</td>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-app-layout>
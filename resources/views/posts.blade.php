<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Posts List') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">

    @if(session()->has('success'))
        <label class="alert alert-success w-100">{{session('success')}}</label>
    @elseif(session()->has('error'))
        <label class="alert alert-danger w-100">{{session('error')}}</label>
    @endif

    <table class="w-full whitespace-no-wrapw-full whitespace-no-wrap">
        <thead>
        <tr class="text-center font-bold">
            <th class="border px-6 py-4">Created At</th>
            <th class="border px-6 py-4">Name</th>
            <th class="border px-6 py-4">Action</th>
        </tr>
        </thead>
        <tbody>

        @foreach($posts as $post)
            <tr>
                <td class="border px-6 py-4">{{ $post->created_at }}</td>
                <td class="border px-6 py-4">{{ $post->name }}</td>
                <td class="border px-6 py-4">
                    <form name="postcomment" id="postcomment" action="{{ route('postcomments') }}">
                    <input type="text" name="pcomment" id="pcomment">
                    <input type="hidden" name="postid" value="{{$post->id}}">
                    <input type="hidden" name="redirects_to" value="{{\Request::getRequestUri()}}">
                    <input type="submit" class="btn btn-success btn-sm" value="Comment">
                    </form>
                    @if(isset($post->comments))
                    @foreach($post->comments as $comment)
                    <div>
                        {{$comment->body}}
                    </div>
                    @endforeach
                    @endif
                </td>
            </tr>
        @endforeach

        </tbody>
    </table>

    <div class="d-flex justify-content-between mb-12">
        {{ $posts->render() }}
    </div>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>

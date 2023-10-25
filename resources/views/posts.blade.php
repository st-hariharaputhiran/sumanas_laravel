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
    <div>
        <h3><b>Note: Comment is One to Many, Tags are Many to Many, Images are One to One Relations</b></h3><br><br>
        <h1><b>Posts</b></h1><br><br>
    </div>
    <table class="w-full whitespace-no-wrapw-full whitespace-no-wrap">
        <thead>
        <tr class="text-center font-bold">
            <th class="border px-6 py-4">Created At</th>
            <th class="border px-6 py-4">Name</th>
            <th class="border px-6 py-4">Action Comment</th>
            <th class="border px-6 py-4">Action Tags</th>
            <th class="border px-6 py-4">Action Images</th>
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
                    <input type="hidden" name="postcommentid" value="{{$post->id}}">
                    <input type="hidden" name="redirects_to_comment" value="{{\Request::fullUrl()}}">
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
                <td class="border px-6 py-4">
                    <form name="posttag" id="posttag" action="{{ route('posttags') }}">
                    <input type="text" name="ptag" id="ptag">
                    <input type="hidden" name="posttagid" value="{{$post->id}}">
                    <input type="hidden" name="redirects_to_tag" value="{{\Request::fullUrl()}}">
                    <input type="submit" class="btn btn-success btn-sm" value="Tag">
                    </form>
                    @if(isset($post->tags))
                    @foreach($post->tags as $tag)
                    <div>
                        {{$tag->name}}
                    </div>
                    @endforeach
                    @endif
                </td>
                <td class="border px-6 py-4">
                    <form name="postimage" id="postimage" action="{{ route('postimages') }}">
                    <input type="text" name="imgurl" placeholder="Image Url" id="imgurl">
                    <input type="hidden" name="postimgid" value="{{$post->id}}">
                    <input type="hidden" name="redirects_to_tag" value="{{\Request::fullUrl()}}">
                    <input type="submit" class="btn btn-success btn-sm" value="Image">
                    </form>
                    @if(isset($post->image))
                    
                    <div>
                        {{ $post->image->url; }}
                    </div>
                    
                    @endif
                </td>
            </tr>
        @endforeach

        </tbody>
    </table>
    <div class="d-flex justify-content-between mb-12">
        {{$posts->appends(['videos_page' => $videos->currentPage()])->links();}}
    </div>
    <br><br>
    <div>
        <h1><b>Videos</b></h1><br><br>
    </div>
    <table class="w-full whitespace-no-wrapw-full whitespace-no-wrap">
        <thead>
        <tr class="text-center font-bold">
            <th class="border px-6 py-4">Created At</th>
            <th class="border px-6 py-4">Name</th>
            <th class="border px-6 py-4">Action Comment</th>
            <th class="border px-6 py-4">Action Tags</th>
        </tr>
        </thead>
        <tbody>

        @foreach($videos as $video)
            <tr>
                <td class="border px-6 py-4">{{ $video->created_at }}</td>
                <td class="border px-6 py-4">{{ $video->name }}</td>
                <td class="border px-6 py-4">
                    <form name="videocomment" id="videocomment" action="{{ route('videocomments') }}">
                    <input type="text" name="vcomment" id="vcomment">
                    <input type="hidden" name="videocommentid" value="{{$video->id}}">
                    <input type="hidden" name="redirects_to_comment" value="{{\Request::fullUrl()}}">
                    <input type="submit" class="btn btn-success btn-sm" value="Comment">
                    </form>
                    @if(isset($video->comments))
                    @foreach($video->comments as $commentvideo)
                    <div>
                        {{$commentvideo->body}}
                    </div>
                    @endforeach
                    @endif
                </td>
                <td class="border px-6 py-4">
                    <form name="videotag" id="videotag" action="{{ route('videotags') }}">
                    <input type="text" name="vtag" id="vtag">
                    <input type="hidden" name="videotagid" value="{{$video->id}}">
                    <input type="hidden" name="redirects_to_tag" value="{{\Request::fullUrl()}}">
                    <input type="submit" class="btn btn-success btn-sm" value="Tag">
                    </form>
                    @if(isset($video->tags))
                    @foreach($video->tags as $tag)
                    <div>
                        {{$tag->name}}
                    </div>
                    @endforeach
                    @endif
                </td>
            </tr>
        @endforeach

        </tbody>
    </table>

    <div class="d-flex justify-content-between mb-12">
        {{ $videos->appends(['posts_page' => $posts->currentPage()])->links(); }}
    </div>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>

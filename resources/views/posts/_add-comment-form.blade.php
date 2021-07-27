@auth
<x-panel>
    <form action="/posts/{{$post->slug}}/comments" method="POST">
        @csrf
        <header class="flex items-center">
            <img src="https://i.pravatar.cc//40?u={{auth()->id()}}" alt="user-avatar" class="rounded-full">
            <h2 class="ml-4">Want to join in on the discussion?</h2>
        </header>
        <div class="mt-6">
            <textarea name="body" class="w-full text-sm focus:outline-none focus:ring" rows="5"
                placeholder="Enter your comment here." required></textarea>

            @error('body')
            <span class="text-xs text-red-500">{{$message}}</span>
            @enderror
        </div>

        <div class="flex justify-end border-t border-gray-200 pt-6 mt-6">
            <button type="submit"
                class="bg-blue-500 text-white uppercase font-semibold text-xs py-2 px-10 rounded-2xl hover:bg-blue-600">
                Post
            </button>
        </div>
    </form>
</x-panel>
@else
<p class="font-semibold">
    <a href="/register" class="hover:underline"> Register </a>
    or
    <a href="/login" class="hover:underline">log in</a>
    to leave a comment.
</p>
@endauth

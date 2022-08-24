@props(['comment'])
<article class="flex bg-gray-100 p-6 border-gray-500 rounded-xl space-x-4">
    <div>
        <img src="https://i.pravatar.cc/100?u={{ $comment->id }}" alt="avatar" class="rounded-xl">
    </div>
    <div>
        <header class="mb-4">
            <h3 class="font-bold">{{ $comment->author->username }}</h3>
            <p class="text-xs"Posted> <time>{{ $comment->created_at }}</time></p>
        </header>
        <p>{{ $comment->body }}</p>
    </div>
</article>

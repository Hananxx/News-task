<x-app-layout>
<section class="mb-24">
    <div class="flex justify-center items-center py-11">
        <h1 class="font-black text-2xl">Latest News</h1>
    </div>
    <div class="grid grid-cols-2 w-4/5 gap-2 gap-y-6 m-auto">
        @foreach($articles as $article)
            <div class="shadow-xl rounded-sm overflow-hidden">
                <img class="w-full" src={{$article->cover_img}}/>
                <div class="flex justify-between items-center">
                    <a class="hover:text-blue-700" href="/articles/{{$article->id}}">
                        <h1 class="text-3xl font-serif capitalize mb-2">{{$article->title}}</h1>
                    </a>
                    <h4 class="text-sm">{{ \Illuminate\Support\Str::limit($article->created_at, 10, $end='') }}</h4>
                </div>
                <h4 class="uppercase font-medium text-xs">{{$article->category->name}} | {{$article->user->name}}</h4>
            </div>
        @endforeach
    </div>
</section>
<section>
    <div class="flex py-8" style="overflow: auto; white-space: nowrap;">
        <h1 class="font-black text-2xl mx-6 text-center">Featured <br/> Categories</h1>
    @foreach($categories as $category)
            <div class="shadow-xl px-4 rounded-md mx-8 flex justify-center items-center">
                <a class="hover:text-blue-600 transition duration-200 ease-linear" href="#">
                    <h1 class="text-xl font-serif capitalize">{{$category->name}}</h1>
                </a>
            </div>
        @endforeach
    </div>
</section>
</x-app-layout>

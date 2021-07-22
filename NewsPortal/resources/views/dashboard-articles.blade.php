<x-app-layout>
    <div class="flex">
        <section>
            @include('components.Dashboard-nav')
        </section>
        <section class="p-8 rounded-xl shadow-xl m-auto h-screen">
            <h1 class="text-3xl font-bold mb-4">Choose an Article</h1>
            <hr class="mb-4"/>
            <div class="grid grid-cols-2 lg:grid-cols-4 gap-9">
                @foreach($articles as $article)
                    <div class="shadow-xl rounded-md p-2 ">
                        <div class="flex flex-col justify-between items-center mb-4">
                            <a class="hover:text-blue-700" href="/articles/{{$article->id}}/edit">
                                <h1 class="text-xl font-serif capitalize mb-2 mr-2">{{$article->title}}</h1>
                            </a>
                            <h4 class="text-xs">{{ \Illuminate\Support\Str::limit($article->created_at, 10, $end='') }}</h4>
                        </div>
                        <h4 class="uppercase font-medium text-xs">{{$article->category->name}} | {{$article->author_name}}</h4>
                    </div>
                @endforeach
            </div>
        </section>
    </div>
</x-app-layout>


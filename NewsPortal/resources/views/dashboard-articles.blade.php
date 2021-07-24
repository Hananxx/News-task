<x-app-layout>
    <div class="flex">
        <section>
            @include('components.Dashboard-nav')
        </section>
        <section class="m-auto ml-48 w-3/4 mt-16 shadow-2xl p-4 rounded-2xl mb-4">
            <h1 class="text-3xl font-bold mb-4">Choose an Article</h1>
            <hr class="mb-4"/>
            <div class="grid lg:grid-cols-2 gap-3">
                @foreach($articles as $article)
                <div class="p-4 border-b flex justify-between ">
                    <div>
                        <h1 class="font-medium text-xl">{{$article->title}}</h1>
                        <h5 class="text-sm font-light">{{$article->category->name}} | {{$article->author_name}}</h5>
                    </div>
                    <a href="/articles/{{$article->id}}/edit">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 bg-gray-100 rounded-full p-1 hover:shadow-lg hover:text-blue-600 transition duration-300 ease-in-out" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z" />
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                        </svg>
                    </a> </div>
                @endforeach
            </div>
        </section>
    </div>
</x-app-layout>


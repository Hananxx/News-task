<x-app-layout>
    @if($articles->count() > 4)
    <section class="text-5xl py-20 text-center font-bold">
        <h1>Latest News</h1>
    </section>
    <section class="all-news m-auto w-11/12 grid lg:grid-cols-3 md:grid-cols-2 gap-3 ">
        @for ($i = 0; $i < 4; $i++)
            @if($i == 0 OR $i == 2)
            <article class="bg-white rounded-lg p-2 shadow-xl overflow-hidden row-span-2">
                @else
                    <article class="shadow-xl bg-white rounded-lg p-2 rounded-lg overflow-hidden ">
                    @endif
                        @if($i==0 OR $i==2)
                <div class="rounded-xl h-80 w-full bg-center bg-cover bg-no-repeat" style="background-image: url({{$articles[$i]->cover_img}})">
                </div>
                        @else
                            <div class="rounded-xl h-32 w-full bg-center bg-cover bg-no-repeat" style="background-image: url({{$articles[$i]->cover_img}})">
                            </div>
                        @endif
                <div class="p-1 px-3">
                    <span class=" p-0.5 px-2 bg-indigo-100 rounded-full text-indigo-600 uppercase text-xs font-medium">{{$articles[$i]->category->name}}</span>
                    <h1 class="text-xl font-medium">{{$articles[$i]->title}}</h1>

                </div>
            </article>
        @endfor
    </section>
    @endif
    <section class="py-16 text-center font-bold m-auto">
        <h1 class="text-5xl">All News</h1>
    </section>
    <section class="py-4 text-center font-bold">
        <h1 class="text-2xl">Search</h1>
        <form method="GET" action="#">
            <input class="my-8 inline appearance-none block w-56 bg-grey-lighter text-grey-darker border border-grey-lighter rounded-full h-8 px-4 m-auto"
                type="text" name="search" placeholder=" "
                   value="{{request('search')}}"/>
            <button class=" rounded-full p-1 px-2 bg-black text-white text-sm " type="submit">
                Search</button>
        </form>
    </section>
    </section>
<section class=" m-auto w-11/12 grid lg:grid-cols-3 md:grid-cols-2 gap-3">
    @foreach($articles as $article)
            <article class=" shadow-xl rounded-lg bg-white p-2 overflow-hidden">
                <div class="mb-1 h-56 w-full rounded-xl bg-center bg-cover bg-no-repeat" style="background-image: url({{$article->cover_img}})">
                </div>
                <span class="ml-2 p-0.5 px-2 bg-yellow-100 rounded-full text-yellow-600 uppercase text-xs font-medium">{{$article->category->name}}</span>
                <div class="p-1 px-3 flex justify-between">
                    <h1 class="text-xl font-medium mb-2 w-11/12 pr-1">{{$article->title}}</h1>
                    <div class="self-start px-2 p-1 text-xs font-bold hover:bg-gray-100 transition duration-300 ease-in-out border border-gray-400 rounded-full text-gray-500 flex items-center">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-2 " fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253" />
                        </svg>
                        <a href="/articles/{{$article->id}}">Read</a>
                    </div>
                </div>
            </article>
    @endforeach
</section>
    <section class="mt-12">
        <div class="text-left bg-black p-8">
            <div class="w-2/3 m-auto text-center">
                <h3 class="text-left mb-4 text-3xl text-white font-bold">Categories</h3>
                @foreach($categories as $category)
                    <span class="hover:bg-gray-300 font-medium transition duration-300 ease-linear m-1 ml-5 my-2 bg-white p-0.5 px-4 rounded-full inline-block">
                       <a href="/categories/{{$category->id}}">{{$category->name}}</a>
                    </span>
                @endforeach
            </div>
        </div>
    </section>
</x-app-layout>

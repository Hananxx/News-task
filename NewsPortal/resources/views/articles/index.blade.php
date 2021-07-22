<x-app-layout>
    @if($articles->count() > 4)
    <section class="text-5xl py-20 text-center font-bold">
        <h1>Latest News</h1>
    </section>
    <section class="m-auto w-11/12 grid lg:grid-cols-3 md:grid-cols-2 gap-3 bg-white">
        @for ($i = 0; $i < 4; $i++)
            @if($i == 0 OR $i == 2)
            <article class="shadow-xl rounded-sm overflow-hidden row-span-2">
                @else
                    <article class="shadow-xl rounded-sm overflow-hidden ">
                    @endif
                        @if($i==0 OR $i==2)
                <div class="h-80 w-full bg-center bg-cover bg-no-repeat" style="background-image: url({{$articles[$i]->cover_img}})">
                </div>
                        @else
                            <div class="h-32 w-full bg-center bg-cover bg-no-repeat" style="background-image: url({{$articles[$i]->cover_img}})">
                            </div>
                        @endif
                <div class="p-1 px-3">
                    <h1 class="text-2xl mb-4">{{$articles[$i]->title}}</h1>
                    <div class="flex justify-between items-center">
                        <h4>{{$articles[$i]->author_name}} | {{$articles[$i]->category->name}}</h4>
                        <a class="text-xs font-bold hover:text-blue-600 transition duration-200 ease-linear" href="/articles/{{$articles[$i]->id}}">READ MORE</a>
                    </div>
                </div>
            </article>
        @endfor
    </section>
    @endif
    <section class="py-24 text-center font-bold m-auto">
        <h1 class="mb-4 text-5xl ">All News</h1>
    </section>
    <section class=" py-4 text-center font-bold">
        <h1 class="text-2xl">Search</h1>
        <form method="GET" action="#">
            <input class="my-8 inline appearance-none block w-56 bg-grey-lighter text-grey-darker border border-grey-lighter rounded-lg h-8 px-4 m-auto"
                type="text" name="search" placeholder="search "
                   value="{{request('search')}}"/>
            <button class="h-8 rounded-full px-2 bg-black text-white text-md" type="submit">
                Search</button>
        </form>
    </section>
    </section>
<section class="m-auto w-11/12 grid lg:grid-cols-3 md:grid-cols-2 gap-3">
    @foreach($articles as $article)
            <article class="shadow-xl rounded-sm overflow-hidden">
                <div class="h-56 w-full bg-center bg-cover bg-no-repeat" style="background-image: url({{$article->cover_img}})">
                </div>
                <div class="p-1 px-3">
                    <h1 class="text-2xl mb-2">{{$article->title}}</h1>
                    <div class="flex justify-between items-center">
                        <h4>{{$article->author_name}} | {{$article->category->name}}</h4>
                        <a class="text-xs font-bold hover:text-blue-600 transition duration-200 ease-linear" href="/articles/{{$article->id}}">READ MORE</a>
                    </div>
                </div>
            </article>
    @endforeach
</section>

    <section class="mt-12">
        <div class="text-left bg-black p-8">
            <div class="w-1/2 m-auto">
                <h3 class="mb-4 text-3xl text-white font-bold">Categories</h3>
                @foreach($categories as $category)
                    <span class="hover:bg-gray-300 transition duration-300 ease-linear m-1 ml-5 my-2 bg-white p-1 px-4 rounded-full inline-block">{{$category->name}}</span>
                @endforeach
            </div>
        </div>
    </section>
</x-app-layout>

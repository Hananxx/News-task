<link rel="stylesheet" href="/Users/hanans/Desktop/phpTask/News/NewsPortal/resources/css/app.css">
<x-app-layout>
    <section class="pt-14 grid grid-cols-5  m-auto">
        <div class="h-screen bg-gray-100 mt-11">
            CATEGORIES LIST
        </div>
        <div class="col-span-3 p-2 ">
           <h1 class="text-2xl font-bold">{{$article->category->name}}</h1>
            <div style="background-image: url({{$article->cover_img}})" class="h-40 bg-no-repeat bg-center bg-cover rounded-lg"></div>
            <h1 class="text-3xl font-bold">{{$article->title}}</h1>
            <h4>written by: {{$article->author_name}}</h4>
            <p>{!! $article->content !!}</p>
        </div>
        <div class="">
            <h1 class="text-2xl"><span class="font-bold">Related</span> News</h1>
            <div class="h-screen">
                CARDS~
            </div>
        </div>
    </section>
</x-app-layout>

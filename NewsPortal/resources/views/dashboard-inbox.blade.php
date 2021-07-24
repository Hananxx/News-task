<x-app-layout>
    <div class="flex">
        <section>
            @include('components.Dashboard-nav')
        </section>
        <section class="bg-white m-auto ml-48 w-3/4 mt-16 shadow-2xl p-4 rounded-2xl mb-4">
            <h1 class="text-3xl font-bold mb-4">Inbox</h1>
            <hr class="mb-4"/>
            <div class="grid md:grid-cols-2 gap-3">
                @foreach($messages as $message)
                    <div class="">
                        <div class="bg-gradient-to-b from-gray-200 to-gray-100 rounded-lg w-full p-2 px-3 relative z-10">
                            <h1 class="font-medium text-xl">{{$message->sender_name}}</h1>
                            <h5 class="text-sm font-light ml-2 text-gray-800">" {{$message->message_content}} "</h5>
                        </div>
                        <div class="bg-gray-100 p-2 w-1 -mt-2 z-0 ml-3 transform rotate-45"></div>
                    </div>
                @endforeach
            </div>
        </section>
    </div>
</x-app-layout>


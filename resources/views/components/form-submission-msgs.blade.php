@if(count($errors) > 0)
    @foreach($errors->all() as $err)
        <div class="bg-red-200 p-1 my-2 rounded-md border border-red-300 m-auto w-11/12 text-center">
            {{$err}}
        </div>
    @endforeach
@endif
@if(session('success'))
        <div class="p-1 my-2 rounded-md m-auto text-center">
            <lottie-player class="m-auto" src="https://assets3.lottiefiles.com/packages/lf20_tAtUrg.json"  background="transparent"  speed="4"  style="width: 50px; height: 50px;" autoplay></lottie-player>
            {{session('success')}}
        </div>
@endif
@if(session('error'))
    <div  class="p-1 rounded-md border border-red-300 m-auto">
        <lottie-player class="m-auto" src="https://assets6.lottiefiles.com/packages/lf20_h3Bz5a.json"  background="transparent"  speed="4"  style="width: 50px; height: 50px;" autoplay></lottie-player>
        {{session('error')}}
    </div>
@endif

@if(count($errors) > 0)
    @foreach($errors->all() as $err)
        <div>
            {{$err}}
        </div>
    @endforeach
@endif
@if(session('success'))
        <div>
            <lottie-player src="https://assets3.lottiefiles.com/packages/lf20_tAtUrg.json"  background="transparent"  speed="4"  style="width: 50px; height: 50px;" autoplay></lottie-player>
            {{session('success')}}
        </div>
@endif
@if(session('error'))
    <div>
        <lottie-player src="https://assets6.lottiefiles.com/packages/lf20_h3Bz5a.json"  background="transparent"  speed="4"  style="width: 50px; height: 50px;" autoplay></lottie-player>
        {{session('error')}}
    </div>
@endif

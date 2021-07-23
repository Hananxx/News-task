<title>NewsHub - Dashboard</title>
<x-app-layout>
    <section class="flex">
        <div>
            @include('components.Dashboard-nav')
        </div>
        <div class="p-8 m-auto h-screen w-full">
            @include('components.form-submission-msgs')
            <h1 class="text-3xl font-bold mb-4">Statistics</h1>
            <div class="grid md:grid-cols-3 grid-cols-1 gap-2 text-center">
                <div class="bg-black p-2 text-white rounded-md flex flex-col justify-center items-center">
                    <h1 class="text-xl">Number of articles</h1>
                    <span class="text-6xl font-bold mt-4">{{$articlesCount}}</span>
                </div>
                <div class="shadow-md rounded-md col-span-2 p-2">
                    <h1 class="mb-4 text-xl">Articles in each category</h1>
                    <canvas id="canvas" height="280" width="600"></canvas>
                </div>

            </div>
        </div>
    </section>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.js"></script>
    <script>
        var category = {!! $categories !!};
        var names = {{$categoryID}}.map((item, i)=> category[i].name);
        var articles = {{$articles}};
        var barChartData = {
            labels: names,
            datasets: [{
                backgroundColor: "#3B82F6",
                data: articles
            }]
        };
        window.onload = function() {
            var ctx = document.getElementById("canvas").getContext("2d");
            window.myBar = new Chart(ctx, {
                type: 'pie',
                data: barChartData,
                options: {
                    legend: {
                        position: 'right',
                        labels:{
                            boxWidth: 1,
                            padding: 20
                        }
                    }
                }
            });
        };
    </script>
</x-app-layout>

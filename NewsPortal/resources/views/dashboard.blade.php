<x-app-layout>
    <div class="flex">
        <section>
            @include('components.Dashboard-nav')
        </section>
        <section class="bg-white m-auto w-3/4 mt-16 ml-48 shadow-2xl p-4 rounded-2xl mb-4">
            @include('components.form-submission-msgs')
            <h1 class="text-3xl font-bold mb-4">Statistics</h1>
            <div class="grid md:grid-cols-3 grid-cols-1 gap-4 text-center">
                <div class="rounded-2xl shadow-lg bg-black p-2 text-white flex flex-col  items-center bg-cover bg-center" style="background-image: url(https://i.ibb.co/fDSVXzf/Screen-Shot-1442-12-14-at-5-02-04-PM.png)">
                    <h1 class="text-lg font-medium">Published Articles</h1>
                    <div class="flex justify-center items-center h-full">
                        <span class="text-8xl font-bold shadow-sm">{{$articlesCount}}</span>
                    </div>

                </div>
                <div class="rounded-2xl shadow-lg col-span-2 p-2">
                    <h1 class="mb-4 text-lg font-medium">Articles per Category</h1>
                    <canvas id="canvas" height="210" width="600"></canvas>
                </div>
                <div class="rounded-2xl shadow-lg col-span-3 p-2">
                    <div class="flex justify-between items-center p-2">
                        <h1 class="text-lg font-medium">Number of Articles</h1>
                        <h5 class="text-xs font-normal text-gray-500">Past 7 days</h5>
                    </div>
                    <canvas id="barChart" height="150" width="500"></canvas>
                </div>
            </div>
        </section>
    </div>
    <script>
        var category = {!! $categories !!};
        var names = {{$categoryID}}.map((item, i)=> category[i].name);
        var articles = {{$articles}};
        var pieChartData = {
            labels: names,
            datasets: [{
                backgroundColor: [
                    "#3B82F6", "#000", "#002D7F",
                    "#F1B82D", "#272727", "#3B82F6",
                    "#000", "#002D7F", "#F1B82D",
                    "#3F3F3F"
                ],
                data: articles
            }]
        };

        var NumberOfarticles = {{ $NumberOfarticles }};
        var days = {{ $days }};

        var barChartData = {
            labels: days,
            datasets: [{
                label: 'Number of articles',
                backgroundColor: "black",
                fill: false,
                data: NumberOfarticles
            }]
        };

        window.onload = function() {
            var barCanvas = document.getElementById("barChart").getContext("2d");
            window.myBar = new Chart(barCanvas, {
                type: 'line',
                data: barChartData,
            });
            var ctx = document.getElementById("canvas").getContext("2d");
            window.myPie = new Chart(ctx, {
                type: 'pie',
                data: pieChartData,
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

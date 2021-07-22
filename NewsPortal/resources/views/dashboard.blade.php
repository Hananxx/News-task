<title>NewsHub - Dashboard</title>
<x-app-layout>
    <section class="flex">
        <div>
            @include('components.Dashboard-nav')
        </div>
        <div class="p-8 rounded-xl shadow-xl m-auto h-screen">
              @include('components.form-submission-msgs')
            <div>
                <h1 class="text-3xl font-bold mb-4">Statistics</h1>

            </div>
        </div>
    </section>
</x-app-layout>

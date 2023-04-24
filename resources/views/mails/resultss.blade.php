<x-mail::message>
    <div class="container-xxl py-5 wow fadeInUp" data-wow-delay="0.1s">
        <div class="container text-center">
            <div class="row justify-content-center">
                <div class="col-lg-6">
                    <h1 class="display-1">{{ $exam->name }} Result</h1>
                    <h1 class="mb-4">Your score: {{ $score }} out of {{ $exam->questions->count() }}</h1>
                    <h2 class="mb-4">Percentage: {{ $percentage }}% </h2>

                </div>
            </div>
        </div>
    </div>

<x-mail::button :url="''">
Back To website
</x-mail::button>

Thanks,<br>
{{ config('app.name') }}
</x-mail::message>

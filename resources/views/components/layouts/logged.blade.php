<x-layouts.master title="{{ $title ?? '' }}" description="{{ $description ?? '' }}" section="Admin">

    <section class="gray pt-4">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-3 col-md-3">
                    <x-partials.user-dashboard-navbar />
                </div>
    
                <div class="col-lg-9 col-md-9 col-sm-12 pt-5">
                    {{ $slot }}
                </div>
            </div>
        </div>
    </section>

</x-layouts.master>
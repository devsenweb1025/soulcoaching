<x-landing-layout>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-10">
                <div class="card shadow-sm">
                    <div class="card-body">
                        <h1 class="text-center mb-5">Termin vereinbaren</h1>

                        <!-- Calendly inline widget -->
                        <div class="calendly-inline-widget" data-url="{{ config('services.calendly.scheduling_url') }}"
                            style="min-width:320px;height:680px;"></div>
                        <script type="text/javascript" src="https://assets.calendly.com/assets/external/widget.js" async></script>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-landing-layout>

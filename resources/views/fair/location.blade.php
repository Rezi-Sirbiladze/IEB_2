@extends('fair.layouts.app')
@section('title', 'Ubicació')

@section('pageTitle', 'Ubicació')
@section('pageContent')
@endsection
@section('content')

    <h1 class="text-center">Ubicació</h1>
    <div class="row justify-content-center">
        <div class="row">
            <div class="col-md">
                <div style="width: 100%; border-radius: 10px; overflow: hidden;">
                    <iframe width="100%" height="300" frameborder="0" scrolling="no" marginheight="0" marginwidth="0"
                        src="https://maps.google.com/maps?width=100%25&amp;height=600&amp;hl=es&amp;q=Carrer%20del%20Foc,%20132,%20Sants-Montju%C3%AFc,%2008004%20Barcelona+(Complex%20esportiu%20a%20B%C3%A0scula)&amp;t=&amp;z=15&amp;ie=UTF8&amp;iwloc=B&amp;output=embed">
                        <a href="https://www.gps.ie/car-satnav-gps/"></a>
                    </iframe>
                </div>
            </div>
        </div>
    </div>

@endsection

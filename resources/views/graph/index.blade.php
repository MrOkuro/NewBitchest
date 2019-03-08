@extends('layouts.default',['title'=>'Dashbord Admin'])

@section('content')


<div class="container">
    <div class="row">
    @include('clients.partials.sidenav')

    <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Affichage courbe de la cotation de la cryptomonnaie sur les 30 derniers jours</div> 
                    <br><br>
                    <div class="app">
                        {!! $chart->container() !!}                        
                    </div>

                    <script src="https://unpkg.com/vue"></script>
       
                    <script src="https://cdnjs.cloudflare.com/ajax/libs/highcharts/6.0.6/highcharts.js" charset="utf-8"></script>


                </div>
    </div>

    </div>
</div>

{!! $chart->script() !!}
@include('layouts.partials._footer')
@endsection
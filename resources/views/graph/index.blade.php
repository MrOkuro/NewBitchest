@extends('layouts.default',['title'=>'Dashbord Admin'])

@section('content')


<div class="container">
    <div class="row">
    @include('clients.partials.sidenav')

    <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Affichage du graphique de la cotation de la cryptomonnaie</div>

                    <div class="app">
                        {!! $chart->container() !!}
                        

                        
                    </div>

                            <script src="https://unpkg.com/vue"></script>
       
                            <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.1/Chart.min.js" charset="utf-8"></script>


            </div>
    </div>

    </div>
</div>

{!! $chart->script() !!}
@endsection
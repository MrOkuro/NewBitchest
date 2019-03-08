@extends('layouts.default',['title'=>'Dashbord Client'])

@section('content')


<div class="container">
    <div class="row">
    @include('clients.partials.sidenav')



                    <div class="col-md-8 col-md-offset-2">
                            <div class="panel panel-default">
                                    <div class="panel-heading"></div>                                   
                                    Accueil! 
                                    </div>
                                </div>
                            </div>
                    </div>
    </div>
</div>
@include('layouts.partials._footer')
@endsection
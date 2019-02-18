@extends('layouts.default',['title'=>'Dashbord Client'])

@section('content')


<div class="container">
    <div class="row">
    @include('clients.partials.sidenav')



                    <div class="col-md-8 col-md-offset-2">
                            <div class="panel panel-default">
                                    <div class="panel-heading">Dashboard</div>

                                    Page d'Accueil du site

                                        You are logged in!

                                    </div>
                                </div>
                            </div>
                    </div>
    </div>
</div>
@endsection
@extends('layouts.default',['title'=>'Dashbord Admin'])

@section('content')


<div class="container">
    <div class="row">
    @include('clients.partials.sidenav')

        <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Liste des cryptomonnaie</div>

                    <table class="table table-bordered table-hover table-sm">
                        <thead class="thead-dark">
                                <tr>
                                    <th scope="col" class="col-auto small">@lang('Logo')</th>
                                    <th scope="col" class="col-auto small">@lang('Nom')</th>
                                    <th scope="col" class="col-auto small">@lang('Quantité')</th> 
                                    <th scope="col" class="col-auto small">@lang('Montant')</th>
                                    <th scope="col" class="col-auto small">@lang('Historique des achats')</th>

                                </tr>
                            <tbody>
                                @foreach ($achats_liste as $liste)  
                                                    
                                 <tr>
                                        <td> <img src="{{URL::asset('/images')}}/{{ $liste['crypto']->image }}"> </td>
                                        <td>{{ $liste['crypto']->nom }}</td>                                    
                                        <td> {{ $liste['quantite_crypto'] }} </td>
                                        <td> {{ $liste['achat'] }} </td>
                                        <td> <a class="btn btn-sm btn-danger" href="{{ route('user.transaction.show', [$liste['crypto']->id] ) }}" 
                                        role="button">@lang('Historique') </a>                                
                                    </td>
                                </tr>
                                @endforeach
                                {{ $total }}
                            </tbody>                
                        </thead>
                    </table> 
                    
                        </div>
                    </div>
                </div>
        </div>
    </div>
</div>
@endsection
@extends('layouts.default',['title'=>'Dashbord Admin'])

@section('content')


<div class="container">
    <div class="row">
    @include('clients.partials.sidenav')

        <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Historique des achats</div>

                    <table class="table table-bordered table-hover table-sm">
                        <thead class="thead-dark">
                                <tr>
                                    <th scope="col" class="col-auto small">@lang('Logo')</th>
                                    <th scope="col" class="col-auto small">@lang('Nom')</th>
                                    <th scope="col" class="col-auto small">@lang('Montant')</th>
                                    <th scope="col" class="col-auto small">@lang('Quantité')</th>
                                    
                                    <th scope="col" class="col-auto small">@lang('Date achat')</th>

                                </tr>
                            <tbody>                               
                            @foreach ($transactions as $transaction)
                                <tr>
                                    <td> <img src="{{URL::asset('/images')}}/{{ $transaction->crypto->image }}"> </td>
                                    <td>{{ $transaction->crypto->nom }}</td>
                                    <td>{{ $transaction->montant }}</td>
                                    <td>{{ $transaction->quantite_crypto }}</td>                                    
                                    <td> {{ \Carbon\Carbon::parse($transaction->created_at)->format('d/m/Y') }} </td>
                                </tr>
                            @endforeach   
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
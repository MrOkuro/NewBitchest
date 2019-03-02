@extends('layouts.default',['title'=>'Dashbord Admin'])

@section('content')


<div class="container">
    <div class="row">
    @include('clients.partials.sidenav')

        <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading"> cotations récentes des cryptommonaies</div>

                    <table class="table table-bordered table-hover table-sm">
                        <thead class="thead-dark">
                                <tr>
                                    <th scope="col" class="col-auto small">@lang('Logo')</th>
                                    <th scope="col" class="col-auto small">@lang('Nom')</th>
                                    <th scope="col" class="col-auto small">@lang('Sigle')</th> 
                                    <th scope="col" class="col-auto small">@lang('Historique')</th> 
                                    <th scope="col" class="col-auto small">@lang('Afficher graphique')</th>                                          
                                </tr>
                            <tbody>
                                @foreach ($cotations as $cotation)  

                                <tr>
                                    <td> <img src="{{URL::asset('/images')}}/{{ $cotation->image }}"> </td>
                                    <td>{{ $cotation->nom }}</td>
                                    <td>{{ $cotation->taux }}</td>
                                    <td> <a class="btn btn-sm btn-primary" href="{{ route('user.cotation.show', [$cotation->id] ) }}" 
                                    role="button">@lang('Historique des cotations') </a> </td>
                                    <td> <a class="btn btn-sm btn-primary" href="{{ route('graphique.cotation',[$cotation->id] ) }}" 
                                        role="button">@lang('Graphique') </a> 
                                     </td>
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
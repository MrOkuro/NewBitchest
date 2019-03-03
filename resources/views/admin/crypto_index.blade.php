@extends('layouts.default',['title'=>'Dashbord Admin'])

@section('content')


<div class="container">
    <div class="row">
    @include('admin.partials.adminsidenav')

        <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Liste des cryptomonnaie</div>

                    <table class="table table-bordered table-hover table-sm">
                        <thead class="thead-dark">
                                <tr>
                                    <th scope="col" class="col-auto small">@lang('Nom')</th>
                                    <th scope="col" class="col-auto small">@lang('Sigle')</th> 
                                    <th scope="col" class="col-auto small">@lang('Cours actuel')</th>       
                                </tr>
                            <tbody>
                                @foreach ($cotations as $cotation)  

                                <tr>
                                    <td>{{ $cotation->nom }} <img src="{{URL::asset('/images')}}/{{ $cotation->image }}"></td>
                                    <td>{{ $cotation->sigle }}</td>
                                    <td> {{ $cotation->taux }}</td>
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
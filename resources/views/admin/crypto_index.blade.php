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
                                @foreach ($cryptos as $crypto)  

                                <tr>
                                    <td>{{ $crypto->nom }} <img src="{{URL::asset('/images')}}/{{ $crypto->image }}"></td>
                                    <td>{{ $crypto->sigle }}</td>
                                    <td> %%%%%</td>
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
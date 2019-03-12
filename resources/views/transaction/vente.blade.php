@extends('layouts.default',['title'=>'Dashbord Admin'])

@section('content')


<div class="container">
    <div class="row">
    @include('clients.partials.sidenav')

    <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Choisir la cryptomonnaie à vendre</div>

                <form class="form-horizontal" method="POST" action="">
                            {{ csrf_field() }}
                        <div class="form-row form-group">

                                <div class="col-md-3">
                                        <label for="crypto_id" class="control-label font-weight-bold">@lang('Crypto')</label>
                                        <select id="crypto_id" class="form-control" name="crypto_id" onchange="AfficheFormVente(this);">
                                        <option value=""> Liste crypto </option>
                                        @foreach ($cryptos as $crypto)
                                        <option value="{{ $crypto->id}}" {{ (old('crypto_id') == $crypto->id)? 'selected' : '' }} > {{ $crypto->nom}} </option>
                                        @endforeach 
                                        </select>                           
                                </div>

                                <div class="col-md-3" id='Vente' style='display:none'>
                
                                </div>    




                        </div>

                        <div class="form-group">
                                <div class="col-md-8 col-md-offset-4">
                                <button type="button" class="btn btn-primary">
                                @lang('Confirmer la vente')
                                </button>
                                <a class="btn btn-primary" href="{{ url()->previous()}}" role="button">@lang('Annuler')</a>
                                </div>
                        </div>
                </form>


            </div>
    </div>

    </div>
</div>
@include('layouts.partials._footer')
@endsection
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
                                        <select id="crypto_id" class="form-control" name="crypto_id" >
                                        <option value=""> Liste crypto </option>

                                        @foreach ($cryptos as $crypto)
                                        <option value="{{ $crypto->id}}"> {{ $crypto->nom}} </option>
                                        @endforeach 
                                        </select>                           
                                </div>

                                <div class="form-group col-md-3">
                                        <label for="quantite_crypto" class="control-label font-weight-bold">@lang('Nombre bitcoin')</label>
                                        <input id="quantite_crypto" type="number" class="form-control " name="quantite_crypto" value="" placeholder="" autofocus>
                                </div>



                                <div class="col-md-3">
                                        <label for="montant" class="control-label font-weight-bold">@lang('Montant')</label>
                                        <input id="montant" type="text" class="form-control " name="montant" value="" placeholder="" autofocus>
                                </div>


                        </div>

                        <div class="form-group">
                                <div class="col-md-8 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
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
@endsection
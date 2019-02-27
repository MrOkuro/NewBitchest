<div class="form-group col-md-3">
    <label for="quantite_crypto" class="control-label font-weight-bold">@lang('Nombre bitcoin')</label>
    <input id="quantite_crypto" type="number" class="form-control " name="quantite_crypto" value="{{ (!empty($transaction->quantite_crypto)) ? $transaction->quantite_crypto : old('montant') }}" placeholder="" autofocus>
</div>

<div class="col-md-3">
    <label for="montant" class="control-label font-weight-bold">@lang('Montant')</label>
    <input id="montant" type="text" class="form-control " name="montant" value="{{ (!empty($transaction->montant)) ? $transaction->montant : old('montant') }}"
    
    placeholder="" autofocus>
</div>
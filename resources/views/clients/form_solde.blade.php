<form class="form-horizontal monFormulaire" method="POST" action="">
    {{ csrf_field() }}
      

            <div class="form-row form-group">

                        <div class="form-group col-md-2">
                                <label for="solde" class="control-label font-weight-bold">@lang('Solde')</label>
                                <input id="solde" type="text" class="form-control " name="solde" value="" placeholder="solde devis" autofocus>
                                @if ($errors->has('solde'))
                                    <div class="help-block text-danger font-italic"></div>
                                @endif
                        </div>


                       
            </div>

            <div class="form-group">
                <div class="col-md-8 col-md-offset-4">
                    <button type="submit" class="btn btn-primary">
                        @lang('Valider')
                    </button>               
                </div>
            </div>
            
    
    
        </form>
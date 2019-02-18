<form class="form-horizontal monFormulaire" method="POST" action="">
        {{ csrf_field() }}
    <input type="hidden" name="demande_id" value="{{ $demande_id }}">
<h5 class="text-left">@lang('Nouvel achat')</h5>        
 
                <div class="form-row form-group">
                    <div class="form-group col-md-1">
                            <label for="volume_offert" class="control-label font-weight-bold">@lang('Nombre bitcoin')</label>
                            <input id="volume_offert" type="text" class="form-control " name="volume_offert" value="" placeholder="Volume" autofocus>
                    </div>
                        
    
                
                    <div class="col-md-1">
                            <label for="volume_sms" class="control-label font-weight-bold">@lang('Somme')</label>
                            <input id="volume_sms" type="text" class="form-control " name="volume_sms" value="" placeholder="" autofocus>
                    </div>

                    <div class="col-md-1">
                            <label for="volume_sms" class="control-label font-weight-bold">@lang('Taux Actuel')</label>
                            <input id="volume_sms" type="text" class="form-control " name="volume_sms" value="" placeholder="" autofocus>
                    </div>

                </div>


<div class="form-group">
            <div class="col-md-8 col-md-offset-4">
                <button type="submit" class="btn btn-primary">
                    @lang('Créer nouvel achat')
                </button>               
            </div>
        </div>
        


    </form>
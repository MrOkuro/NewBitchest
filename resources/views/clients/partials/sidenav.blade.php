<div class="col-md-4 SideNav">
    <ul class="list-group">
        

        <li class="list-group-item"><a href="{{ route('user.edit', Auth::user()->id) }}"><i class="fa fa-user" aria-hidden="true"></i>Données personnelles</a></li>
        
    </ul>
    <ul class="list-group">
        <li class="list-group-item"><a href="{{ route('user.crypto.index') }}"><i class="fas fa-shopping-cart" aria-hidden="true"></i>Portefeuille</a></li>
        <li class="list-group-item"><a href="{{ route('user.crypto.achat') }}"><i class="fa fa-credit-card" aria-hidden="true"></i>Acheter</a></li>
        <li class="list-group-item"><a href="{{ route('user.crypto.vente') }}"><i class="fas fa-money-bill-alt" aria-hidden="true"></i>Vendre</a></li>
        <li class="list-group-item"><a href="{{ route('user.crypto.cotation.index') }}"><i class="fa fa-chart-line" aria-hidden="true"></i>Cours des crypto monnaies</a></li>
    </ul>
    <ul class="list-group">
        
        @if(Auth::id() > 0 )
            <li class="list-group-item">Mon solde en Euros : <strong> {{ Auth::user()->solde }} €</strong>
            </li>
        @endif

    </ul>
</div>
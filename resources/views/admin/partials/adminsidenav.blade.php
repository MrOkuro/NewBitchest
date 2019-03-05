<div class="col-md-4 SideNav">
    <ul class="list-group">
    	
        <li class="list-group-item"><a href="{{   route('admin.index') }}"><i class="fa fa-user" aria-hidden="true"></i>;Afficher liste des utilisateurs</a></li>
        <li class="list-group-item"><a href="{{   route('admin.users.create') }}"><i class="fas fa-plus" aria-hidden="true"></i>;Ajouter nouveaux clients</a></li>
        <li class="list-group-item"><a href="{{   route('admin.users.edit', Auth::user()->id) }}"><i class="fa fa-user" aria-hidden="true"></i>;Modifier son profil</a></li>
        
    </ul>
    <ul class="list-group">
        <li class="list-group-item"><a href="{{ route('admin.crypto.index') }}"><i class="fa fa-list" aria-hidden="true"></i>; Afficher cours des crypto monnaies</a></li>
    </ul>
</div>
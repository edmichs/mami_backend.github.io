<li class="{{ Request::is('clients*') ? 'active' : '' }}">
    <a href="{{ route('clients.index') }}"><i class="fa fa-edit"></i><span>Clients</span></a>
</li>

<li class="{{ Request::is('commandes*') ? 'active' : '' }}">
    <a href="{{ route('commandes.index') }}"><i class="fa fa-edit"></i><span>Commandes</span></a>
</li>

<li class="{{ Request::is('products*') ? 'active' : '' }}">
    <a href="{{ route('products.index') }}"><i class="fa fa-edit"></i><span>Products</span></a>
</li>

<li class="{{ Request::is('recettes*') ? 'active' : '' }}">
    <a href="{{ route('recettes.index') }}"><i class="fa fa-edit"></i><span>Recettes</span></a>
</li>


<div class="well col-md-2 pt-5 bg-light vh-100 border-right">
    <div class="sidebar content-box">
            <ul class="nav nav-pills flex-column ">

                @if(auth()->user()->is_admin == 1)
                <li class="flex-sm-fill  nav-item py-1">
                  <h5>Admin meni <i class="fas fa-user-shield"></i></h5>
                </li>

                <li class="flex-sm-fill  nav-item py-1">
                    <a class="text-dark nav-link {{ route::is('admin.users') ? 'active' : '' }}" href="{{ route('admin.users')}}"><i class="fas fa-users"></i> <span>Korisnici</span></a>
                </li>
                <li class="flex-sm-fill  nav-item py-1">
                    <a class="text-dark nav-link {{ route::is('admin.products') ? 'active' : '' }}" href="{{ route('admin.products')}}"><i class="fab fa-product-hunt"></i> <span>Proizvodi</span></a>
                </li>
                <li class="flex-sm-fill  nav-item py-1">
                    <a class="text-dark nav-link {{ route::is('admin.categories') ? 'active' : '' }}" href="{{ route('admin.categories')}}"><i class="fas fa-folder-open"></i></i> <span>Kategorije</span></a>
                </li>
                <li class="flex-sm-fill  nav-item py-1">
                    <a class="text-dark nav-link {{ route::is('admin.orders') ? 'active' : '' }}" href="{{ route('admin.orders')}}"><i class="fas fa-box-open"></i> <span>Porudžbine</span></a>
                </li>
                <li class="flex-sm-fill  nav-item py-1">
                    <a class="text-dark nav-link {{ route::is('admin.showMessages') ? 'active' : '' }}" href="{{ route('admin.showMessages')}}"><i class="fas fa-comments"></i> <span>Poruke</span></a>
                </li>
                <li class="flex-sm-fill  nav-item py-1">
                    <a class="text-dark nav-link {{ route::is('admin.showSubscribe') ? 'active' : '' }}" href="{{ route('admin.showSubscribe')}}"><i class="fas fa-envelope"></i> <span>Pretplate</span></a>
                </li>


                @endif

                <li class="flex-sm-fill  nav-item py-1">
                  <h5>Korisnički meni <i class="fa fa-user"></i></h5>
                </li>
                <li class="flex-sm-fill  nav-item py-1">
                    <a class="text-dark nav-link {{ route::is('order.show') ? 'active' : '' }}" href="{{ route('order.show') }}"><i class="fas fa-box-open"></i> <span>Porudžbina</span></a>
                </li>
                <li class="flex-sm-fill  nav-item py-1">
                    <a class="text-dark nav-link {{ route::is('profile.edit') ? 'active' : '' }}" href="{{ route('profile.edit') }}"><i class="fas fa-user-cog"></i> <span>Profil</span></a>
                </li>
                <li class="flex-sm-fill  nav-item py-1">
                    <a class="text-dark nav-link {{ route::is('order.bill') ? 'active' : '' }}" href="{{ route('order.bill') }}"><i class="fas fa-hourglass-half"></i> <span>Status porudžbina</span></a>
                </li>



            </ul>
      </div>
</div>

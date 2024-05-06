<!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
      <img src="../logo.jpg" alt="solergy solution" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">Solergy Solutions</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      @auth
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="../../dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block">{{ Auth::User()->name}}</a>
        </div>
      </div>
      @endauth
      <!-- SidebarSearch Form -->
      <div class="form-inline">
        <div class="input-group" data-widget="sidebar-search">
          <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
          <div class="input-group-append">
            <button class="btn btn-sidebar">
              <i class="fas fa-search fa-fw"></i>
            </button>
          </div>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="true">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item ">
            <a href="#" class="nav-link {{ Request::is('dashboard*') ? 'active' : '' }}" >
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
              <a class="nav-link {{ Request::is('dashboard*') ? 'active' : '' }}" href="{{ route('dashboard') }}">
                <div class="nav-link-icon"><i data-feather="activity"></i></div>
                Dashboard
              </a>
              </li>
            </ul>
          </li>
          <!--produit-->
          @can('VOIR_PRODUIT')
          <li class="nav-item">
            <a href="#" class="nav-link {{request::is('produit*')? 'active' : ''}}">
              <i class="nav-icon fas fa-copy"></i>
              <p>
                produits
                <i class="fas fa-angle-left right"></i>
                <span class="badge badge-info right">6</span>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{route('produit.index')}}" class="nav-link {{request::is('produit/index*')? 'active' : ''}}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Liste des produits</p>
                </a>
              </li>

              @can('AJOUTER_PRODUIT')
              <li class="nav-item">
                <a href="{{route('produit.ajouter')}}" class="nav-link {{request::is('produit/create*')? 'active' : ''}}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Ajouter</p>
                </a>
              </li>
              @endcan

              <li class="nav-item">
                <a href="{{route('produit.categori')}}" class="nav-link {{request::is('produit/categori*')? 'active' : ''}}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>liste des categories</p>
                </a>
              </li>

              @can('AJOUTER_CATEGORIE')
              <li class="nav-item">
                <a href="{{route('produit.ajouter_categori')}}" class="nav-link {{request::is('produit/ajouter_categori*')? 'active' : ''}}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Ajouter une categorie</p>
                </a>
              </li>
              @endcan
            </ul>
          </li>
          @endcan

            <!--panier-->
            <li class="nav-item">
              <a href="{{route('panier.index')}}" class="nav-link {{request::is('panier/index*')? 'active' : ''}}">
              <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-cart" viewBox="0 0 16 16">
                <path d="M0 1.5A.5.5 0 0 1 .5 1H2a.5.5 0 0 1 .485.379L2.89 3H14.5a.5.5 0 0 1 .491.592l-1.5 8A.5.5 0 0 1 13 12H4a.5.5 0 0 1-.491-.408L2.01 3.607 1.61 2H.5a.5.5 0 0 1-.5-.5M3.102 4l1.313 7h8.17l1.313-7zM5 12a2 2 0 1 0 0 4 2 2 0 0 0 0-4m7 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4m-7 1a1 1 0 1 1 0 2 1 1 0 0 1 0-2m7 0a1 1 0 1 1 0 2 1 1 0 0 1 0-2"/>
              </svg>
                <p>Boutique</p>
              </a>
            </li>

            @can('VOIR_VENTE')
            <li class="nav-item ">
              <a href="#" class="nav-link {{ Request::is('ventes*') ? 'active' : '' }}" >
                <i class="nav-icon fas fa-tachometer-alt"></i>
                <p>
                  ventes
                  <i class="right fas fa-angle-left"></i>
                </p>
              </a>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a class="nav-link {{ Request::is('ventes/index*') ? 'active' : '' }}" href="{{ route('ventes.index') }}">
                    <div class="nav-link-icon"><i data-feather="activity"></i></div>
                    ventes
                  </a>
                </li>
              </ul>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a class="nav-link {{ Request::is('ventes/termine*') ? 'active' : '' }}" href="{{ route('ventes.termine') }}">
                    <div class="nav-link-icon"><i data-feather="activity"></i></div>
                    Ventes Terminé
                  </a>
                </li>
              </ul>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a class="nav-link {{ Request::is('ventes/non-termine*') ? 'active' : '' }}" href="{{ route('ventes.nonTermine') }}">
                    <div class="nav-link-icon"><i data-feather="activity"></i></div>
                    Ventes non Terminé
                  </a>
                </li>
              </ul>
            </li>
            @endcan

            @can('VOIR_ACHAT')
            <li class="nav-item ">
              <a href="#" class="nav-link {{ Request::is('achats*') ? 'active' : '' }}" >
                <i class="nav-icon fas fa-tachometer-alt"></i>
                <p>
                  Achats
                  <i class="right fas fa-angle-left"></i>
                </p>
              </a>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a class="nav-link {{ Request::is('achats/index*') ? 'active' : '' }}" href="{{ route('achats.index') }}">
                    <div class="nav-link-icon"><i data-feather="activity"></i></div>
                    Achats
                  </a>
                </li>
              </ul>

              @can('AJOUTER_ACHAT')
              <ul class="nav nav-treeview">
                <li class="nav-item">
                <a class="nav-link {{ Request::is('achats/cart*') ? 'active' : '' }}" href="{{ route('achats.cart') }}">
                    <div class="nav-link-icon"><i data-feather="activity"></i></div>
                    Creer un achat
                  </a>
                </li>
              </ul>
              @endcan
            </li>
            @endcan

            
            <!--Transactions-->
            <li class="nav-item">
              <a href="#" class="nav-link collapse show {{ Request::is('transactions*') ? 'active' : '' }}" data-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false" aria-controls="collapseExample" >
                <i class="nav-icon fas fa-tachometer-alt"></i>
                <p>
                  Transactions
                  <i class="right fas fa-angle-left"></i>
                </p>
              </a>
              <ul class="nav nav-treeview">
                @can('VOIR_TRANSACTION')
                <li class="nav-item">
                  <a class="nav-link {{ Request::is('transactions/index*') ? 'active' : '' }}" href="{{ route('transaction.index') }}">
                    <div class="nav-link-icon"><i data-feather="activity"></i></div>
                    Transaction
                  </a>
                </li>
                @endcan
                <li class="nav-item">
                  <a class="nav-link {{ Request::is('transactions/mesTransactions*') ? 'active' : '' }}" href="{{ route('transaction.mesTransactions') }}">
                    <div class="nav-link-icon"><i data-feather="activity"></i></div>
                    Mes activites
                  </a>
                </li>
              </ul>
            </li>
            <!--charges-->
            @can('VOIR_CHARGE')
            <li class="nav-item">
              <a href="#" class="nav-link {{ Request::is('charges*') ? 'active' : '' }}" >
                <i class="nav-icon fas fa-tachometer-alt"></i>
                <p>
                  charges
                  <i class="right fas fa-angle-left"></i>
                </p>
              </a>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a class="nav-link {{ Request::is('charges/index*') ? 'active' : '' }}" href="{{ route('charges.index') }}">
                    <div class="nav-link-icon"><i data-feather="activity"></i></div>
                    Afficher les charges
                  </a>
                </li>
              </ul>
              @can('AJOUTER_CHARGE')
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a class="nav-link {{ Request::is('charges/create*') ? 'active' : '' }}" href="{{ route('charges.create') }}">
                    <div class="nav-link-icon"><i data-feather="activity"></i></div>
                    Creer une charge
                  </a>
                </li>
              </ul>
              @endcan
            </li>
            @endcan

            <!--securite-->
            @can('VOIR_PERMISSION')
            <li class="nav-item">
                <a href="#" class="nav-link {{ Request::is('securite/permission*') ? 'active' : '' }}" >
                  <i class="nav-icon fas fa-tachometer-alt"></i>
                  <p>
                    Permissions
                    <i class="right fas fa-angle-left"></i>
                  </p>
                </a>
                <ul class="nav nav-treeview">
                  <li class="nav-item">
                    <a class="nav-link {{ Request::is('securite/permission/index*') ? 'active' : '' }}" href="{{ route('permission.index') }}">
                      <div class="nav-link-icon"><i data-feather="activity"></i></div>
                      Permissions
                    </a>
                  </li>
                </ul>
                <ul class="nav nav-treeview">
                  <li class="nav-item">
                    <a class="nav-link {{ Request::is('securite/permission/create*') ? 'active' : '' }}" href="{{ route('permission.create') }}">
                      <div class="nav-link-icon"><i data-feather="activity"></i></div>
                      Creer une Permission
                    </a>
                  </li>
                </ul>
              </li>  
              @endcan   

              <!--Roles--> 
              @can('VOIR_ROLE')
              <li class="nav-item ">
                <a href="#" class="nav-link {{ Request::is('securite/role*') ? 'active' : '' }}" >
                  <i class="nav-icon fas fa-tachometer-alt"></i>
                  <p>
                    Roles
                    <i class="right fas fa-angle-left"></i>
                  </p>
                </a>
                <ul class="nav nav-treeview">
                  <li class="nav-item">
                    <a class="nav-link {{ Request::is('securite/role/index*') ? 'active' : '' }}" href="{{ route('role.index') }}">
                      <div class="nav-link-icon"><i data-feather="activity"></i></div>
                      Roles
                    </a>
                  </li>
                </ul>
                <ul class="nav nav-treeview">
                  <li class="nav-item">
                    <a class="nav-link {{ Request::is('securite/role/create*') ? 'active' : '' }}" href="{{ route('role.create') }}">
                      <div class="nav-link-icon"><i data-feather="activity"></i></div>
                      Creer un role
                    </a>
                  </li>
                </ul>
              </li>
              @endcan
            <!--users-->
              @can('VOIR_UTILISATEURS')
              <li class="nav-item">
                <a href="#" class="nav-link {{ Request::is('users*') ? 'active' : '' }}" >
                  <i class="nav-icon fas fa-tachometer-alt"></i>
                  <p>
                    Utilisateurs
                    <i class="right fas fa-angle-left"></i>
                  </p>
                </a>
                <ul class="nav nav-treeview">
                  <li class="nav-item">
                    <a class="nav-link {{ Request::is('users/index*') ? 'active' : '' }}" href="{{ route('users.index') }}">
                      <div class="nav-link-icon"><i data-feather="activity"></i></div>
                      Liste des utilisateurs
                    </a>
                  </li>
                </ul>
                
                <ul class="nav nav-treeview">
                  <li class="nav-item">
                    <a class="nav-link {{ Request::is('users/create*') ? 'active' : '' }}" href="{{ route('users.create') }}">
                      <div class="nav-link-icon"><i data-feather="activity"></i></div>
                      Creer un utilisateur
                    </a>
                  </li>
                </ul>
                
              </li> 
              @endcan
              

        </ul>

        IP

        )
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="true">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          
          <!--produit-->
          <li class="nav-item">
            <a href="#" class="nav-link {{request::is('produit*')? 'active' : ''}}">
              <i class="nav-icon fas fa-copy"></i>
              <p>
                produits
                <i class="fas fa-angle-left right"></i>
                <span class="badge badge-info right">6</span>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{route('produit.index')}}" class="nav-link {{request::is('produit/index*')? 'active' : ''}}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Liste des produits</p>
                </a>
              </li>

              <li class="nav-item">
                <a href="{{route('produit.ajouter')}}" class="nav-link {{request::is('produit/create*')? 'active' : ''}}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Ajouter</p>
                </a>
              </li>

              <li class="nav-item">
                <a href="{{route('produit.categori')}}" class="nav-link {{request::is('produit/categori*')? 'active' : ''}}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>liste des categories</p>
                </a>
              </li>

              <li class="nav-item">
                <a href="{{route('produit.ajouter_categori')}}" class="nav-link {{request::is('produit/ajouter_categori*')? 'active' : ''}}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Ajouter une categorie</p>
                </a>
              </li>
            </ul>
          </li>



            <li class="nav-item ">
              <a href="#" class="nav-link {{ Request::is('ventes*') ? 'active' : '' }}" >
                <i class="nav-icon fas fa-tachometer-alt"></i>
                <p>
                  ventes
                  <i class="right fas fa-angle-left"></i>
                </p>
              </a>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a class="nav-link {{ Request::is('ventes/impot*') ? 'active' : '' }}" href="{{ route('ventes.impot') }}">
                    <div class="nav-link-icon"><i data-feather="activity"></i></div>
                    ventes
                  </a>
                </li>
              </ul>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a class="nav-link {{ Request::is('ventes/termine*') ? 'active' : '' }}" href="{{ route('ventes.termine') }}">
                    <div class="nav-link-icon"><i data-feather="activity"></i></div>
                    Ventes Terminé
                  </a>
                </li>
              </ul>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a class="nav-link {{ Request::is('ventes/non-termine*') ? 'active' : '' }}" href="{{ route('ventes.nonTermine') }}">
                    <div class="nav-link-icon"><i data-feather="activity"></i></div>
                    Ventes non Terminé
                  </a>
                </li>
              </ul>
            </li>

            <li class="nav-item ">
              <a href="#" class="nav-link {{ Request::is('achats*') ? 'active' : '' }}" >
                <i class="nav-icon fas fa-tachometer-alt"></i>
                <p>
                  Achats
                  <i class="right fas fa-angle-left"></i>
                </p>
              </a>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a class="nav-link {{ Request::is('achats/impot*') ? 'active' : '' }}" href="{{ route('achats.impot') }}">
                    <div class="nav-link-icon"><i data-feather="activity"></i></div>
                    Achats
                  </a>
                </li>
              </ul>

              <ul class="nav nav-treeview">
                <li class="nav-item">
                <a class="nav-link {{ Request::is('achats/cart*') ? 'active' : '' }}" href="{{ route('achats.cart') }}">
                    <div class="nav-link-icon"><i data-feather="activity"></i></div>
                    Creer un achat
                  </a>
                </li>
              </ul>
            </li>

            

            <!--charges-->
            <li class="nav-item">
              <a href="#" class="nav-link {{ Request::is('charges*') ? 'active' : '' }}" >
                <i class="nav-icon fas fa-tachometer-alt"></i>
                <p>
                  charges
                  <i class="right fas fa-angle-left"></i>
                </p>
              </a>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a class="nav-link {{ Request::is('charges/index*') ? 'active' : '' }}" href="{{ route('charges.index') }}">
                    <div class="nav-link-icon"><i data-feather="activity"></i></div>
                    Afficher les charges
                  </a>
                </li>
              </ul>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a class="nav-link {{ Request::is('charges/create*') ? 'active' : '' }}" href="{{ route('charges.create') }}">
                    <div class="nav-link-icon"><i data-feather="activity"></i></div>
                    Creer une charge
                  </a>
                </li>
              </ul>
            </li>

           
            
              

        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>

  

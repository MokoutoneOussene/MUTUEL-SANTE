<header id="header" class="header sticky-top" >
    <div class="branding d-flex align-items-center" >

        <div style="margin-right:1px;" class="container position-relative d-flex align-items-center justify-content-between">
            <a href="{{ url('/') }}" class="logo d-flex align-items-center me-auto">
                <!-- Uncomment the line below if you also wish to use an image logo -->
                <img src="{{asset('assets/img/logo.jpg')}}" alt="Logo">
                <h5 class="sitename">Mutuelle des pharmaciens</h5>
            </a>

            <nav id="navmenu" class="navmenu">
                <ul>
                    <li><a href="#hero" class="active">Home<br></a></li>
                    
                </ul>
                <i class="mobile-nav-toggle d-xl-none bi bi-list"></i>
            </nav>
            <button 
                type="button"
                onclick="window.location.href='{{ route('list_users') }}'" 
                class="btn btn-success btn-sm" 
                style="background: #009A00; margin-right: 1%;">
                Demandes
            </button>

            <button 
                type="button"
                onclick="window.location.href='{{ route('cotisations') }}'" 
                class="btn btn-success btn-sm" 
                style="background: #009A00; margin-right: 1%;">
                Cotisations
            </button>
            <button 
                type="button"
                onclick="window.location.href='{{ route('authentification') }}'" 
                class="btn btn-success btn-sm" 
                style="background: #009A00; margin-right: 1%;">
                Connexion
            </button>
            <button 
                type="button"
                onclick="window.location.href='{{ route('authentification') }}'" 
                class="btn btn-success btn-sm" 
                style="background: #14532d; margin-right: 1%;">
                Déconnexion
            </button> 
            <button 
                type="button"
                onclick="window.location.href='{{ route('inscription') }}'" 
                class="btn btn-success btn-sm" 
                style="background: #14532d; margin-right: 1%;">
                Créer mon compte
            </button> 
            <button 
                type="button"
                onclick="window.location.href='{{ route('compte') }}'" 
                class="btn btn-success btn-sm" 
                style="background: #009A00; margin-right: 1%;">
                Compte
            </button>
        </div>

    </div>

</header>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <link href="{{asset('images/favicon.jpg')}}" rel="shortcut icon">
        <title>SmartUL | @yield('title-page')</title>
        <link href="{{asset('css/styles.css')}}" rel="stylesheet" />
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <link href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css" rel="stylesheet" crossorigin="anonymous" />
        <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/js/all.min.js" crossorigin="anonymous"></script>
        <style>
            .material-icons.smart { color: rgb(202, 0, 0); }
        </style>

    </head>
    <body class="sb-nav-fixed">
        
        <nav class="sb-topnav navbar navbar-expand navbar-dark bg-danger">
            <a class="navbar-brand" @yield('home')>@yield('type-compte')</a><button class="btn btn-link btn-sm order-1 order-lg-0" id="sidebarToggle" href="#"><i class="fas fa-bars"></i></button
            ><!-- Navbar Search-->
            <form class="d-none d-md-inline-block form-inline ml-auto mr-0 mr-md-3 my-2 my-md-0">
                <!--div class="input-group">
                    <input class="form-control" type="text" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2" />
                    <div class="input-group-append">
                        <button class="btn btn-primary" type="button"><i class="fas fa-search"></i></button>
                    </div>
                </div-->
            </form>
            <!-- Navbar-->
            <ul class="navbar-nav ml-auto ml-md-0">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" id="userDropdown" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fas fa-user fa-fw"></i></a>
                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
                        <a class="dropdown-item" @yield('profil')>Profil</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" @yield('deconnect')>Logout</a>
                    </div>
                </li>
            </ul>
        </nav>
        <div id="layoutSidenav">
            <div id="layoutSidenav_nav">
                <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                    <div class="sb-sidenav-menu">
                        <div class="nav">
                            <div class="sb-sidenav-menu-heading h1" style="letter-spacing: 0.2em;">
                                <a href="{{route('welcome_page')}}" class="nav-link">
                                <i class="fa fa-home"></i>
                                <span style="color:whitesmoke" class="ml-1">Smart</span><span style="color:red">UL</span>
                                </a>
                            </div>
                            @if((Auth::user() instanceof \App\Enseignant))
                                <a class="nav-link" href="{{route('document.prof.index')}}"
                                ><div class="sb-nav-link-icon"><i class="material-icons">collections</i></div>
                                Vos publications</a>

                            @else
                                <a class="nav-link" href="{{route('document.admin.index')}}"
                                ><div class="sb-nav-link-icon"><i class="material-icons">collections</i></div>
                                Vos publications</a>

                            @endif
                            
                            <div class="sb-sidenav-menu-heading">Informations</div>
                                @if(Auth::user() instanceof App\Enseignant)
                                    <a class="nav-link" href="{{route('domaine.index')}}">
                                        <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                                        Domaines</a>
                                    <a class="nav-link" href="{{route('type.index')}}"
                                        ><div class="sb-nav-link-icon"><i class="fas fa-book-open"></i></div>
                                        Types</a>
                                @else
                                    <a class="nav-link" href="{{route('domaine.Aindex')}}">
                                        <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                                        Domaines</a>
                                    <a class="nav-link" href="{{route('type.Aindex')}}"
                                        ><div class="sb-nav-link-icon"><i class="fas fa-book-open"></i></div>
                                        Types</a>
                                @endif
                            
                            <div class="sb-sidenav-menu-heading">Publications</div>
                                <!--Nouveau document || nouvelle publications-->
                                @if((Auth::user() instanceof \App\Enseignant))
                                    <a class="nav-link" href="{{ route('document.prof.create') }}"><div class="sb-nav-link-icon"><i class="fas fa-file"></i></div>Nouvelle publication</a>
                                @else
                                    <a class="nav-link" href="{{ route('document.admin.create') }}"><div class="sb-nav-link-icon"><i class="fas fa-file"></i></div>Nouvelle publication</a>
                                @endif
                                <!---->
                        </div>
                    </div>
                    <!--div class="sb-sidenav-footer">
                        <div class="small">Logged in as:</div>
                        Start Bootstrap
                    </div-->
                </nav>
            </div>
            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid">
                        <h1 class="mt-4">@yield('content-title')</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item active">@yield('location')</li>
                        </ol>
                        @if(!Auth::user()->isValid)
                            <p class="mt-4 alert alert-warning">
                            Vos publications non libre d'accès suppose donc un accès à certaines conditions que vous aurez établies.
                            Pour les intéressés de ces publications, il leur sera fourni votre adresse email, pour qu'il puissent vous contactez et échagez
                            avec vous des modalités d'accès à vos publications non libre.
                            </p>
                        @endif
                        
                        @if(!(Auth::user() instanceof \App\Enseignant))
                            
                        <div class="row">
                            <div class="col-xl-3 col-md-6">
                                <div class="card text-white mb-4" style="background-color: brown;">
                                    <div class="card-body text-primary text-center"><h1>{{\App\Http\Controllers\Admin\AdminController::NumberOfTypesStore()}}</h1>Types de publications</div>
                                    <div class="card-footer d-flex align-items-center justify-content-between">
                                        <a class="small text-primary stretched-link" href="#">View Details</a>
                                        <div class="small text-primary"><i class="fas fa-angle-right"></i></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-md-6">
                                <div class="card bg-secondary text-white mb-4">
                                    <div class="card-body text-center text-warning "><h1>{{\App\Http\Controllers\Admin\AdminController::NumberOfDomainesStore()}}</h1>Domaines de publications</div>
                                    <div class="card-footer d-flex align-items-center justify-content-between">
                                        <a class="small text-white stretched-link" href="#">View Details</a>
                                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-md-6">
                                <div class="card text-white mb-4" style="background-color: cyan;">
                                    <div class="card-body text-center text-danger"><h1>{{\App\Http\Controllers\Admin\AdminController::NumberOfDocumentsStore()}}</h1>Publications</div>
                                    <div class="card-footer d-flex align-items-center justify-content-between">
                                        <a class="small stretched-link" href="#" style="color: brown;">View Details</a>
                                        <div class="small text-danger"><i class="fas fa-angle-right"></i></div>
                                    </div>
                                </div>
                            </div>
                            <!--div class="col-xl-3 col-md-6">
                                <div class="card bg-danger text-white mb-4">
                                    <div class="card-body text-center"><h1>5</h1>Enseignants retrouvés</div>
                                    <div class="card-footer d-flex align-items-center justify-content-between">
                                        <a class="small text-white stretched-link" href="#">View Details</a>
                                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                    </div>
                                </div>
                            </div-->
                        </div>
                        <div class="row">
                            <!--div class="col-xl-6">
                                <div class="card mb-4">
                                    <div class="card-header"><i class="fas fa-chart-area mr-1"></i>Area Chart Example</div>
                                    <div class="card-body"><canvas id="myAreaChart" width="100%" height="40"></canvas></div>
                                </div>
                            </div>
                            <div class="col-xl-6">
                                <div class="card mb-4">
                                    <div class="card-header"><i class="fas fa-chart-bar mr-1"></i>Bar Chart Example</div>
                                    <div class="card-body"><canvas id="myBarChart" width="100%" height="40"></canvas></div>
                                </div>
                            </div-->
                        </div>
                        @endif
                        <div>
                            @yield('account')
                        </div>
                        <div class="card mb-4">
                            @yield('publish_table')
                        </div>
                        <div>
                            @yield('infos')
                        </div>
                    </div>
                </main>
                <footer class="py-4 bg-light mt-auto">
                    <div class="container-fluid">
                        <div class="d-flex align-items-center justify-content-between small">
                            <div class="text-muted">Copyright &copy; L&CO 2020</div>
                            <div>
                                <a href="#">Privacy Policy</a>
                                &middot;
                                <a href="#">Terms &amp; Conditions</a>
                            </div>
                        </div>
                    </div>
                </footer>
            </div>
        </div>
        @include('sweetalert::alert')
            <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    		<script src="{{asset('build/js/countrySelect.js')}}"></script>

        <script type="text/javascript">
          $('#select_ind').change(function() {
            $('#indicatif').val('+' + ($('#select_ind').val()));
          });
    	</script>
        <script src="https://code.jquery.com/jquery-3.4.1.min.js" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="{{asset('js/scripts.js')}}"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
        <script src="{{asset('assets/demo/chart-area-demo.js')}}"></script>
        <script src="{{asset('assets/demo/chart-bar-demo.js')}}"></script>
        <script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js" crossorigin="anonymous"></script>
        <script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js" crossorigin="anonymous"></script>
        <script src="{{asset('assets/demo/datatables-demo.js')}}"></script>
    </body>
</html>

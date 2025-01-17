<!DOCTYPE html>
<html lang="en">

<head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Dashboard - SB Admin</title>
        <link href="admincss/css/styles.css" rel="stylesheet" />
        <link href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css" rel="stylesheet" crossorigin="anonymous" />
        <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/js/all.min.js" crossorigin="anonymous"></script>
</head>
<!-- pembuatan form atau tabel 01 -->

<body class="sb-nav-fixed">
        <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
            <a class="navbar-brand" href="index.html">Start Bootstrap</a>
            <button class="btn btn-link btn-sm order-1 order-lg-0" id="sidebarToggle" href="#"><i class="fas fa-bars"></i></button>
            <!-- Navbar Search-->
            <form class="d-none d-md-inline-block form-inline ml-auto mr-0 mr-md-3 my-2 my-md-0">
                <div class="input-group">
                    <input class="form-control" type="text" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2" />
                    <div class="input-group-append">
                        <button class="btn btn-primary" type="button"><i class="fas fa-search"></i></button>
                    </div>
                </div>
            </form>
            <!-- Navbar-->
            <ul class="navbar-nav ml-auto ml-md-0">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" id="userDropdown" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fas fa-user fa-fw"></i></a>
                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
                        <a class="dropdown-item" href="#">Settings</a>
                        <a class="dropdown-item" href="#">Activity Log</a>
                        <div class="dropdown-divider"></div>
                        {{-- <a class="dropdown-item" href="">Logout</a> --}}
                       

                      <a clas="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                    </div>
                </li>
            </ul>
        </nav>
        <div id="layoutSidenav">
            <div id="layoutSidenav_nav">
                <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                    <div class="sb-sidenav-menu">
                        <div class="nav">
                            <div class="sb-sidenav-menu-heading">Core</div>
                            <a class="nav-link" href="{{ url('view_category') }}">
                                <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                                Dashboard
                            </a>
                            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseLayouts" aria-expanded="false" aria-controls="collapseLayouts">
                                <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                                Master Data
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                            </a>
                            <div class="collapse" id="collapseLayouts" aria-labelledby="headingOne" data-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav">
                                    <a class="nav-link" href="{{ url('view_category') }}">Kategori</a>
                                    <a class="nav-link" href="{{ url('view_product') }}">Add Product</a>
                                    <a class="nav-link" href="{{ url('show_product') }}">Show Product</a>
                                </nav>
                            </div>
                        </div>
                    </div>
                    <div class="sb-sidenav-footer">
                        <div class="small">Logged in as:</div>
                        Start Bootstrap
                    </div>
                </nav>
            </div>
            
            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid">
                        <h1 class="mt-4">Product</h1>
                        <ol class="breadcrumb mb-4">
                        </ol>
            </div>

                <div class="container">
        <div class="row">
            <div class="col-md-6 mx-auto mt-4">
                <div class="card">
                    <div class="card-header">
                        <h1 style="text-center">Tambah Data Product</h1>
                    </div>
                    <div class="card-body">
                        <form action="{{ url('/add_product') }}" method="post" enctype="multipart/form-data">
                        @csrf 
                            <div class="mb-2">
                                <label for="nrp" class="form-label">Produk Title:</label>
                                <input type="text" class="form-control" name="title" id="title" required>
                            </div>

                            <div class="mb-2">
                                <label for="nama" class="form-label">Product Description:</label>
                                <input type="text" class="form-control" name="description" id="description" required>
                            </div>

                            <div class="mb-2">
                                <label for="email" class="form-label">Product Price:</label>
                                <input type="text" class="form-control" name="price" id="price" required>
                            </div>

                            <div class="mb-2">
                                <label for="jurusan" class="form-label">Discount Price: </label>
                                <input type="text" class="form-control" name="discount_price" id="discount_price" required>
                            </div>

                            <div class="mb-2">
                                <label for="gambar" class="form-label">Product Quantity: </label>
                                <input class="form-control" name="quantity" id="quantity" required>
                            </div>
                            <div class="mb-2">
                                <label for="gambar" class="form-label">Product Category: </label>
                                <select class="form-control" name="category" id="category" >
                                <option value="" selected="">add a category here</option>
                                @foreach ($category as $category)
                                <option >{{ $category->category_name }}</option>
                                 @endforeach
                                </select>
                            </div>
                            <div class="mb-2">
                                <label for="gambar" class="form-label">Product Image Here: </label>
                                <input type="file" class="form-control" name="image" required>
                            </div>

                            <div class="mb-2">
                                <button type="submit" value="Add Product" class="btn btn-primary" name="submit">Tambah Product</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
        </div>
    </div>
                    <footer class="py-4 bg-light mt-auto">
                    <div class="container-fluid">
                        <div class="d-flex align-items-center justify-content-between small">
                            <div class="text-muted">Copyright &copy; Your Website 2020</div>
                            <div>
                                <a href="#">Privacy Policy</a>
                                &middot;
                                <a href="#">Terms &amp; Conditions</a>
                            </div>
                        </div>
                    </div>
                    </main>
                </footer>
            </div>
        </div>
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="admincss/js/scripts.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
        <script src="admincss/assets/demo/chart-area-demo.js"></script>
        <script src="admincss/assets/demo/chart-bar-demo.js"></script>
        <script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js" crossorigin="anonymous"></script>
        <script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js" crossorigin="anonymous"></script>
        <script src="admincss/assets/demo/datatables-demo.js"></script>
</body>

</html>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <title>@yield('pageTitle') - Fruitables</title>
        <meta content="width=device-width, initial-scale=1.0" name="viewport">
        <meta content="" name="keywords">
        <meta content="" name="description">

        @include('includes.page_styles')
    </head>

    <body>
        @include('includes.page_nav')

        <div class="container-fluid fruite py-5">
            <div class="container py-5">
                <div class="row g-4">
                    <div class="col-lg-12 mt-5">
                        <div class="row g-4 mt-5">
                            <div class="col-lg-3">
                                <div class="row g-4">
                                    <div class="col-lg-12">
                                        <div class="mb-3">
                                            <h4>Menu</h4>
                                            <ul class="list-unstyled fruite-categorie">
                                                <li>
                                                    <div class="d-flex justify-content-between fruite-name">
                                                        <a href="{{ route('backends.categories.index') }}"><i class="fas fa-apple-alt me-2"></i>Categories</a>
                                                        <span></span>
                                                    </div>
                                                </li>
                                                <li>
                                                    <div class="d-flex justify-content-between fruite-name">
                                                        <a href="{{ route('backends.products.index') }}"><i class="fas fa-apple-alt me-2"></i>Products</a>
                                                        <span></span>
                                                    </div>
                                                </li>
                                                <li>
                                                    <div class="d-flex justify-content-between fruite-name">
                                                        <a href="{{ route('backends.users.index') }}"><i class="fas fa-apple-alt me-2"></i>Users</a>
                                                        <span></span>
                                                    </div>
                                                </li>
                                                <li>
                                                    <div class="d-flex justify-content-between fruite-name">
                                                        <a href="#" onclick="logoutUser()" ><i class="fas fa-apple-alt me-2"></i>Logout</a>
                                                        <span></span>
                                                        <form id="frmLogout" action="{{ route('logout') }}" method="POST">
                                                            @csrf
                                                        </form>
                                                        <script>
                                                            function logoutUser() {
                                                                if (confirm('Are you sure?')) {
                                                                    document.getElementById('frmLogout').submit();
                                                                }
                                                            }
                                                        </script>
                                                    </div>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-9">
                                <div class="row g-4 justify-content-center">
                                   @yield('content')
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
       @include('includes.page_scripts')
    </body>
</html>
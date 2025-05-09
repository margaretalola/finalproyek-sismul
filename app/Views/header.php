<?php
// CI4 doesn't use the defined('BASEPATH') check
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <!-- Bootstrap CSS -->
        <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/css/bootstrap.min.css" rel="stylesheet">
        <!-- Bootstrap Icons -->
        <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.10.0/font/bootstrap-icons.min.css" rel="stylesheet">
        <title>Sistem Multimedia</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <style>
            .navbar {
                padding: 0.5rem 1rem;
            }
            .navbar-brand {
                font-weight: 500;
            }
            .offcanvas-header {
                background-color: #0d47a1;
                color: white;
            }
            .divider {
                height: 1px;
                margin: 0.5rem 0;
                background-color: #e0e0e0;
            }
            main.container {
                padding-top: 2rem;
            }
        </style>
    </head>
    <body>
        <!-- Navbar -->
        <nav class="navbar navbar-expand-lg navbar-dark bg-primary fixed-top">
            <div class="container-fluid">
                <a class="navbar-brand" href="<?= base_url(); ?>">Sistem Multimedia</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                
                <div class="offcanvas-body d-flex justify-content-end">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link" href="<?= url_to('Welcome::create'); ?>">Create</a>
                        </li>
                        <li class="divider"></li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Login</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>

        <!-- Main Content -->
        <main class="container mt-5 pt-3">
            <!-- Content will be inserted here -->
        </main>

        <!-- Bootstrap JS Bundle with Popper -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
    </body>
</html>

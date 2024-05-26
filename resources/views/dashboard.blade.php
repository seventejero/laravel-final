<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
        <style>
            .card {
                transition: transform 0.2s;
            }
            .card:hover {
                transform: scale(1.05);
            }
            .card-title {
                font-size: 1.5rem;
                margin-bottom: 0.5rem;
            }
            .card h2 {
                font-size: 2.5rem;
            }
            .icon {
                font-size: 3rem;
                margin-bottom: 0.5rem;
            }
        </style>
    </head>
    <body>
        <div class="container mt-5">
            <div class="row text-center">
                <div class="col-md-4 mb-4">
                    <div class="card border-primary h-100">
                        <div class="card-header bg-primary text-white">
                            <i class="icon fas fa-chart-bar"></i>
                            <div>Total Posts</div>
                        </div>
                        <div class="card-body text-primary">
                            <h3 class="card-title">Count:</h3>
                            <p class="card-text"><h2>{{ $totalPosts }}</h2></p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 mb-4">
                    <div class="card border-warning h-100">
                        <div class="card-header bg-warning text-white">
                            <i class="icon fas fa-pencil-alt"></i>
                            <div>Total Unpublished Posts</div>
                        </div>
                        <div class="card-body text-warning">
                            <h3 class="card-title">Count:</h3>
                            <p class="card-text"><h2>{{ $unpublishedPosts }}</h2></p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 mb-4">
                    <div class="card border-success h-100">
                        <div class="card-header bg-success text-white">
                            <i class="icon fas fa-check"></i>
                            <div>Total Published Posts</div>
                        </div>
                        <div class="card-body text-success">
                            <h3 class="card-title">Count:</h3>
                            <p class="card-text"><h2>{{ $publishedPosts }}</h2></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
        <script src="https://kit.fontawesome.com/a076d05399.js"></script>
    </body>


</x-app-layout>

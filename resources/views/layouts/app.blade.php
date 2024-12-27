<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Application Name')</title>
    <!-- Include CSS files -->
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <!-- Include additional CSS files if needed -->
    @stack('styles')
</head>
<body>
    <div class="container">
        <!-- Header Section -->
        <header>
            <nav class="navbar navbar-expand-lg navbar-light bg-light">
               
        </header>

        <!-- Main Content Section -->
        <main class="py-4">
            @yield('content')
        </main>

        <!-- Footer Section -->
        <footer class="footer mt-auto py-3 bg-light">
            <div class="container">
                <span class="text-muted">&copy; {{ date('Y') }} Your Application. All rights reserved.</span>
            </div>
        </footer>
    </div>

    <!-- Include JavaScript files -->
    <script src="{{ asset('js/app.js') }}"></script>
    <!-- Include additional JavaScript files if needed -->
    @stack('scripts')
</body>
</html>

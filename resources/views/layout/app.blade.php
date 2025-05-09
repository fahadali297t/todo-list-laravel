<!DOCTYPE html>
<html lang="en" class="dark">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>ToDo App</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-4Q6Gf2aSP4eDXB8Miphtr37CMZZQ5oXLH2yaXMJ2w8e2ZtHTl7GptT4jmndRuHDT" crossorigin="anonymous">


    <link rel="stylesheet" href="{{ asset('style.css') }}">
    <script>
        tailwind.config = {
            darkMode: 'class'
        }
    </script>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" />

    <style>
        #sidebar.expanded .hover-menu {
            display: none;
        }

        #sidebar:not(.expanded) .group:hover .hover-menu {
            display: flex;
        }

        .transition-transform {
            transition: transform 0.2s ease-in-out;
        }
    </style>
</head>

<body class="flex flex-col min-h-screen bg-gray-900 text-gray-100 transition-colors duration-300">

    <div class="flex flex-grow">
        <!-- Sidebar -->
        <aside id="sidebar"
            class="w-64 expanded transition-all duration-300 bg-gray-800 shadow-lg flex flex-col min-h-screen">
            <div class="flex items-center justify-between p-4 border-b border-gray-700">
                <h1 class="text-lg font-bold sidebar-text">ToDo</h1>
                <button id="toggleSidebar" class="text-gray-300 hover:text-white">☰</button>
            </div>

            <nav class="flex-1">
                <ul class="space-y-1 mt-4">
                    <li class="group relative">
                        <a href="{{ route('tasks') }}"
                            class="flex items-center p-3 hover:bg-gray-700 transition rounded">
                            <span class="material-icons">dashboard</span>
                            <span class="ml-3 sidebar-text">All Task</span>

                        </a>
                    </li>
                    <li class="group relative">
                        <a href="{{ route('task.active') }}"
                            class="flex items-center p-3 hover:bg-gray-700 transition rounded">
                            <span class="material-icons">list</span>
                            <span class="ml-3 sidebar-text">Active Tasks</span>

                        </a>
                    </li>
                    <li class="group relative">
                        <a href="{{ route('task.cancell') }}"
                            class="flex items-center p-3 hover:bg-gray-700 transition rounded">
                            <span class="material-icons">list</span>
                            <span class="ml-3 sidebar-text">Cancelled Tasks</span>

                        </a>
                    </li>
                    <li class="group relative">
                        <a href="{{ route('task.backlog') }}"
                            class="flex items-center p-3 hover:bg-gray-700 transition rounded">
                            <span class="material-icons">list</span>
                            <span class="ml-3 sidebar-text">Backlog Tasks</span>

                        </a>
                    </li>

                    <li class="group relative">
                        <a href="{{ route('task.completed') }}"
                            class="flex items-center p-3 hover:bg-gray-700 transition rounded">
                            <span class="material-icons">list</span>
                            <span class="ml-3 sidebar-text">Completed Tasks</span>

                        </a>
                    </li>



                </ul>
            </nav>


        </aside>

        <!-- Main Content -->
        <div class="flex flex-col flex-grow">
            <header class="flex items-center justify-between p-4 bg-gray-800 shadow border-b border-gray-700">
                <h2 class="text-2xl font-semibold">Tasks</h2>
                <div class="flex items-center space-x-3 relative">


                    <!-- Profile Button -->
                    <button id="profileBtn"
                        class="p-2 rounded-full hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-gray-600">
                        <span class="material-icons">account_circle</span>
                    </button>

                    <!-- Profile Menu -->
                    <div id="profileMenu"
                        class="hidden absolute right-0 mt-12 w-40 bg-gray-800 border border-gray-700 rounded shadow-lg py-2 text-sm z-20">
                        <a href="#" class="block px-4 py-2 hover:bg-gray-700">Profile</a>
                        <a href="#" class="block px-4 py-2 hover:bg-gray-700">Settings</a>
                        <a href="#" class="block px-4 py-2 hover:bg-gray-700">Logout</a>
                    </div>
                </div>
            </header>

            <main class="p-6 flex-grow">
                @yield('content')
            </main>

            <footer class="p-4 bg-gray-800 text-center text-sm text-gray-400 border-t border-gray-700">
                © 2025 Dashboard.
            </footer>
        </div>
    </div>

    <!-- Script -->
    <script>
        const sidebar = document.getElementById('sidebar');
        const toggleButton = document.getElementById('toggleSidebar');
        const sidebarTexts = document.querySelectorAll('.sidebar-text');
        const themeToggle = document.getElementById('themeToggle');
        const themeIcon = document.getElementById('themeIcon');


        // Sidebar toggle
        toggleButton.addEventListener('click', () => {
            sidebar.classList.toggle('w-64');
            sidebar.classList.toggle('w-16');
            sidebar.classList.toggle('expanded');
            sidebarTexts.forEach(el => el.classList.toggle('hidden'));
        });



        // Theme toggle
        themeToggle.addEventListener('click', () => {
            document.documentElement.classList.toggle('dark');
            themeIcon.textContent =
                document.documentElement.classList.contains('dark') ? 'light_mode' : 'dark_mode';
        });
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-j1CDi7MgGQ12Z7Qab0qlWQ/Qqz24Gc6BM0thvEMVjHnfYGF0rmFCozFSxQBxwHKO" crossorigin="anonymous">
    </script>
    <script src="https://kit.fontawesome.com/0e26b3244d.js" crossorigin="anonymous"></script>
    @yield('script')

</body>

</html>

<!DOCTYPE html>
<html lang="en" class="dark">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Responsive Admin Dashboard</title>
    <script src="https://cdn.tailwindcss.com"></script>
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
                <h1 class="text-lg font-bold sidebar-text">Dashboard</h1>
                <button id="toggleSidebar" class="text-gray-300 hover:text-white">☰</button>
            </div>

            <nav class="flex-1">
                <ul class="space-y-1 mt-4">
                    <li class="group relative">
                        <a href="#" class="flex items-center p-3 hover:bg-gray-700 transition rounded">
                            <span class="material-icons">dashboard</span>
                            <span class="ml-3 sidebar-text">Home</span>
                            <span
                                class="absolute left-16 top-0 hidden group-hover:flex bg-gray-800 rounded px-3 py-2 text-sm shadow-lg hover-menu whitespace-nowrap">Home</span>
                        </a>
                    </li>

                    <!-- Dropdown menu -->
                    <li class="relative group">
                        <button class="flex items-center p-3 w-full hover:bg-gray-700 transition rounded dropdown-btn">
                            <span class="material-icons">folder</span>
                            <span class="ml-3 sidebar-text">Projects</span>
                            <span class="ml-auto material-icons sidebar-text">expand_more</span>
                        </button>

                        <!-- Click dropdown when expanded -->
                        <ul class="dropdown-menu hidden pl-11 space-y-1 mt-1">
                            <li><a href="#" class="block px-3 py-2 hover:bg-gray-700 rounded">Project A</a></li>
                            <li><a href="#" class="block px-3 py-2 hover:bg-gray-700 rounded">Project B</a></li>
                        </ul>

                        <!-- Hover dropdown when collapsed -->
                        <div
                            class="absolute left-16 top-0 hidden flex-col bg-gray-800 rounded shadow-lg text-sm py-2 w-32 z-20 hover-menu">
                            <a href="#" class="px-3 py-2 hover:bg-gray-700">Project A</a>
                            <a href="#" class="px-3 py-2 hover:bg-gray-700">Project B</a>
                        </div>
                    </li>

                    <li class="group relative">
                        <a href="#" class="flex items-center p-3 hover:bg-gray-700 transition rounded">
                            <span class="material-icons">settings</span>
                            <span class="ml-3 sidebar-text">Settings</span>
                            <span
                                class="absolute left-16 top-0 hidden group-hover:flex bg-gray-800 rounded px-3 py-2 text-sm shadow-lg hover-menu whitespace-nowrap">Settings</span>
                        </a>
                    </li>
                </ul>
            </nav>


        </aside>

        <!-- Main Content -->
        <div class="flex flex-col flex-grow">
            <header class="flex items-center justify-between p-4 bg-gray-800 shadow border-b border-gray-700">
                <h2 class="text-2xl font-semibold">Dashboard</h2>
                <div class="flex items-center space-x-3 relative">
                    <!-- Theme toggle -->
                    <button id="themeToggle" class="p-2 hover:bg-gray-700 rounded">
                        <span id="themeIcon" class="material-icons">light_mode</span>
                    </button>

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
                <div class="bg-gray-800 p-6 rounded shadow">
                    <h3 class="text-xl font-bold mb-4">Responsive Admin Dashboard</h3>
                    <p>Sidebar toggles, dropdown menus behave correctly based on sidebar state, and profile menu works
                        smoothly.</p>
                </div>
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
        const dropdownButtons = document.querySelectorAll('.dropdown-btn');
        const themeToggle = document.getElementById('themeToggle');
        const themeIcon = document.getElementById('themeIcon');
        const profileBtn = document.getElementById('profileBtn');
        const profileMenu = document.getElementById('profileMenu');

        // Sidebar toggle
        toggleButton.addEventListener('click', () => {
            sidebar.classList.toggle('w-64');
            sidebar.classList.toggle('w-16');
            sidebar.classList.toggle('expanded');
            sidebarTexts.forEach(el => el.classList.toggle('hidden'));
        });

        // Dropdown buttons for expanded sidebar
        dropdownButtons.forEach(btn => {
            btn.addEventListener('click', (e) => {
                e.stopPropagation();
                const menu = btn.nextElementSibling;
                menu.classList.toggle('hidden');
                const icon = btn.querySelector('.material-icons:last-child');
                if (icon) {
                    icon.textContent = menu.classList.contains('hidden') ? 'expand_more' : 'expand_less';
                }
            });
        });

        // Theme toggle
        themeToggle.addEventListener('click', () => {
            document.documentElement.classList.toggle('dark');
            themeIcon.textContent =
                document.documentElement.classList.contains('dark') ? 'light_mode' : 'dark_mode';
        });

        // Profile menu toggle
        profileBtn.addEventListener('click', (e) => {
            e.stopPropagation();
            profileMenu.classList.toggle('hidden');
        });

        // Close profile menu when clicking outside
        document.addEventListener('click', () => {
            profileMenu.classList.add('hidden');
        });
    </script>

</body>

</html>

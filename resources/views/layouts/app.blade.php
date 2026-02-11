<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="{{ config('portfolio.company.name', 'WALTECH') }} - {{ config('portfolio.company.tagline', 'Soluções tecnológicas') }}">
    <title>@yield('title')</title>
    
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
</head>
<body class="bg-portfolio-dark text-slate-100 font-sans antialiased">
    <!-- Navigation - estilo portfolio -->
    <nav class="fixed top-0 w-full bg-portfolio-dark/95 backdrop-blur-md border-b border-slate-700/50 z-50 transition-all duration-300" id="navbar">
        <div class="container-custom">
            <div class="flex items-center justify-between h-16 md:h-20">
                <a href="{{ route('home') }}" class="flex items-center space-x-2">
                    <span class="text-2xl md:text-3xl font-bold text-primary-400">{{ config('portfolio.company.name', 'WALTECH') }}</span>
                </a>
                <div class="hidden md:flex items-center space-x-8">
                    <a href="#home" class="text-slate-300 hover:text-primary-400 transition-colors font-medium">Início</a>
                    <a href="#sobre" class="text-slate-300 hover:text-primary-400 transition-colors font-medium">Sobre</a>
                    <a href="#servicos" class="text-slate-300 hover:text-primary-400 transition-colors font-medium">Serviços</a>
                    <a href="#parceiros" class="text-slate-300 hover:text-primary-400 transition-colors font-medium">Parceiros</a>
                    <a href="#contato" class="btn-primary">Contato</a>
                </div>
                <button class="md:hidden p-2 text-slate-300 hover:text-white" id="mobile-menu-btn" aria-label="Menu">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
                    </svg>
                </button>
            </div>
        </div>
        <div class="hidden md:hidden bg-portfolio-dark-card border-t border-slate-700" id="mobile-menu">
            <div class="container-custom py-4 space-y-3">
                <a href="#home" class="block py-2 text-slate-300 hover:text-primary-400 transition-colors">Início</a>
                <a href="#sobre" class="block py-2 text-slate-300 hover:text-primary-400 transition-colors">Sobre</a>
                <a href="#servicos" class="block py-2 text-slate-300 hover:text-primary-400 transition-colors">Serviços</a>
                <a href="#parceiros" class="block py-2 text-slate-300 hover:text-primary-400 transition-colors">Parceiros</a>
                <a href="#contato" class="block btn-primary text-center">Contato</a>
            </div>
        </div>
    </nav>

    <!-- Main Content -->
    <main>
        @yield('content')
    </main>

    <!-- Footer -->
    <footer class="bg-portfolio-dark-card border-t border-slate-700/50">
        <div class="container-custom section-padding">
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <div>
                    <h3 class="text-2xl font-bold text-primary-400 mb-4">{{ config('portfolio.company.name', 'WALTECH') }}</h3>
                    <p class="text-slate-400">{{ config('portfolio.company.tagline', 'Soluções tecnológicas') }}</p>
                </div>
                <div>
                    <h4 class="text-lg font-semibold text-white mb-4">Links Rápidos</h4>
                    <ul class="space-y-2">
                        <li><a href="#sobre" class="text-slate-400 hover:text-primary-400 transition-colors">Sobre</a></li>
                        <li><a href="#servicos" class="text-slate-400 hover:text-primary-400 transition-colors">Serviços</a></li>
                        <li><a href="#parceiros" class="text-slate-400 hover:text-primary-400 transition-colors">Parceiros</a></li>
                        <li><a href="#contato" class="text-slate-400 hover:text-primary-400 transition-colors">Contato</a></li>
                    </ul>
                </div>
                <div>
                    <h4 class="text-lg font-semibold text-white mb-4">Contato</h4>
                    <ul class="space-y-2 text-slate-400">
                        <li>Email: {{ config('portfolio.contact.email', 'contato@waltech.com.br') }}</li>
                        <li>Telefone: {{ config('portfolio.contact.phone', '(00) 0000-0000') }}</li>
                    </ul>
                </div>
            </div>
            <div class="border-t border-slate-700 mt-8 pt-8 text-center text-slate-500">
                <p>&copy; {{ date('Y') }} {{ config('portfolio.company.name', 'WALTECH') }}. Todos os direitos reservados.</p>
            </div>
        </div>
    </footer>

    <script>
        // Mobile menu toggle
        document.getElementById('mobile-menu-btn')?.addEventListener('click', function() {
            const menu = document.getElementById('mobile-menu');
            menu.classList.toggle('hidden');
        });

        // Navbar scroll effect
        window.addEventListener('scroll', function() {
            const navbar = document.getElementById('navbar');
            navbar.classList.toggle('shadow-lg', window.scrollY > 50);
        });
    </script>
</body>
</html>

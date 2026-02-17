<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description"
        content="{{ config('portfolio.company.name', 'WALTECH') }} - {{ config('portfolio.company.tagline', 'Soluções tecnológicas') }}">
    <title>@yield('title')</title>

    @if(file_exists(public_path('hot')))
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    @else
        <link rel="stylesheet" href="{{ asset('build/assets/app-CQpLkbza.css') }}">
        <script src="{{ asset('build/assets/app-7wL9b_hj.js') }}"></script>
        <style>.fade-in-on-scroll{opacity:1!important;transform:none!important;}</style>
    @endif

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap"
        rel="stylesheet">
</head>

<body class="bg-portfolio-dark text-slate-100 font-sans antialiased">
    <!-- Navigation - estilo portfolio -->
    <nav class="fixed top-0 w-full bg-portfolio-dark/95 backdrop-blur-md border-b border-slate-700/50 z-50 transition-all duration-300"
        id="navbar">
        <div class="container-custom">
            <div class="flex items-center justify-between h-16 md:h-20">
                <a href="{{ route('home') }}" class="flex items-center space-x-2">
                    <img src="{{ asset('images/logopequena.png') }}" alt="WALTECH" class="h-12 md:h-16 lg:h-20 w-auto">
                </a>
                <div class="hidden md:flex items-center space-x-8">
                    <a href="#home"
                        class="text-slate-300 hover:text-primary-400 transition-colors font-medium">Início</a>
                    <a href="#sobre"
                        class="text-slate-300 hover:text-primary-400 transition-colors font-medium">Sobre</a>
                    <a href="#servicos"
                        class="text-slate-300 hover:text-primary-400 transition-colors font-medium">Serviços</a>
                    <a href="#parceiros"
                        class="text-slate-300 hover:text-primary-400 transition-colors font-medium">Parceiros</a>
                    <a href="#contato" class="btn-primary">Contato</a>
                </div>
                <button class="md:hidden p-2 text-slate-300 hover:text-white" id="mobile-menu-btn" aria-label="Menu">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M4 6h16M4 12h16M4 18h16"></path>
                    </svg>
                </button>
            </div>
        </div>
        <div class="hidden md:hidden bg-portfolio-dark-card border-t border-slate-700" id="mobile-menu">
            <div class="container-custom py-4 space-y-3">
                <a href="#home" class="block py-2 text-slate-300 hover:text-primary-400 transition-colors">Início</a>
                <a href="#sobre" class="block py-2 text-slate-300 hover:text-primary-400 transition-colors">Sobre</a>
                <a href="#servicos"
                    class="block py-2 text-slate-300 hover:text-primary-400 transition-colors">Serviços</a>
                <a href="#parceiros"
                    class="block py-2 text-slate-300 hover:text-primary-400 transition-colors">Parceiros</a>
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
                    <img src="{{ asset('images/logopequena.png') }}" alt="WALTECH" class="h-16 md:h-20 mb-4">
                    <p class="text-slate-400">{{ config('portfolio.company.tagline', 'Soluções tecnológicas') }}</p>
                </div>
                <div>
                    <h4 class="text-lg font-semibold text-white mb-4">Links Rápidos</h4>
                    <ul class="space-y-2">
                        <li><a href="#sobre" class="text-slate-400 hover:text-primary-400 transition-colors">Sobre</a>
                        </li>
                        <li><a href="#servicos"
                                class="text-slate-400 hover:text-primary-400 transition-colors">Serviços</a></li>
                        <li><a href="#parceiros"
                                class="text-slate-400 hover:text-primary-400 transition-colors">Parceiros</a></li>
                        <li><a href="#contato"
                                class="text-slate-400 hover:text-primary-400 transition-colors">Contato</a></li>
                    </ul>
                </div>
                <div>
                    <h4 class="text-lg font-semibold text-white mb-4">Contato</h4>
                    <ul class="space-y-3">
                        <li class="flex items-center gap-2 text-slate-400">
                            <svg class="w-5 h-5 text-primary-400" fill="none" stroke="currentColor"
                                viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z">
                                </path>
                            </svg>
                            <a href="mailto:{{ config('portfolio.contact.email') }}"
                                class="hover:text-primary-400 transition-colors">
                                {{ config('portfolio.contact.email', 'contato@waltech.com.br') }}
                            </a>
                        </li>
                        <li class="flex items-center gap-2 text-slate-400">
                            <svg class="w-5 h-5 text-primary-400" fill="none" stroke="currentColor"
                                viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z">
                                </path>
                            </svg>
                            <a href="tel:+5544998355403" class="hover:text-primary-400 transition-colors">
                                {{ config('portfolio.contact.phone', '(00) 0000-0000') }}
                            </a>
                        </li>
                        <li class="flex items-center gap-2 text-slate-400">
                            <svg class="w-5 h-5 text-emerald-400" fill="currentColor" viewBox="0 0 24 24">
                                <path
                                    d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413Z" />
                            </svg>
                            <a href="https://wa.me/5544998355403?text=Olá!%20Vim%20através%20do%20site%20e%20gostaria%20de%20mais%20informações."
                                target="_blank" rel="noopener noreferrer"
                                class="hover:text-emerald-400 transition-colors">
                                WhatsApp
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="border-t border-slate-700 mt-8 pt-8 text-center text-slate-500">
                <p>&copy; {{ date('Y') }} {{ config('portfolio.company.name', 'WALTECH') }}. Todos os direitos
                    reservados.</p>
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

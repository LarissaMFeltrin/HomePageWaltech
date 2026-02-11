@php
    $portfolio = config('portfolio', []);
    $company = $portfolio['company'] ?? [];
    $sections = $portfolio['sections'] ?? [];
    $sobre = $sections['sobre'] ?? [];
    $servicos_config = $portfolio['services'] ?? $portfolio['servicos'] ?? [];
    $servicos_section = $sections['servicos'] ?? [];
    $parceiros_section = $sections['parceiros'] ?? [];
    $contato = $sections['contato'] ?? [];
    $partners = $portfolio['partners'] ?? [];
@endphp
@extends('layouts.app')

@section('title', ($company['name'] ?? 'WALTECH') . ' ' . ($company['tagline'] ?? 'Serviços Técnicos') . ' – Refrigeração')

@section('content')
    <!-- Hero -->
    <section id="home" class="pt-20 md:pt-32 pb-20 md:pb-28 bg-portfolio-dark relative overflow-hidden">
        <div class="absolute inset-0 bg-gradient-to-br from-primary-900/20 via-transparent to-portfolio-accent/10"></div>
        <div class="absolute top-1/4 right-0 w-96 h-96 bg-primary-500/10 rounded-full blur-3xl"></div>
        <div class="absolute bottom-0 left-0 w-80 h-80 bg-portfolio-accent/10 rounded-full blur-3xl"></div>
        <div class="container-custom relative">
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-center">
                <div class="fade-in-on-scroll">
                    <p class="text-primary-400 font-semibold mb-2">{{ $company['tagline'] ?? 'Serviços Técnicos' }}</p>
                    <h1 class="text-4xl md:text-5xl lg:text-6xl font-bold text-white mb-6 leading-tight">
                        Soluções em
                        <span class="text-primary-400">refrigeração</span>
                        comercial, industrial e residencial
                    </h1>
                    <p class="text-xl text-slate-400 mb-8 leading-relaxed">
                        Instalação, manutenção e assistência técnica com qualidade, agilidade e segurança para o pleno funcionamento dos seus equipamentos.
                    </p>
                    <div class="flex flex-col sm:flex-row gap-4">
                        <a href="#contato" class="btn-primary text-center">Solicitar orçamento</a>
                        <a href="#servicos" class="btn-secondary text-center">Nossos serviços</a>
                    </div>
                </div>
                <div class="fade-in-on-scroll hidden lg:block">
                    <div class="bg-portfolio-dark-card border border-slate-700 rounded-2xl p-8 shadow-2xl">
                        <div class="space-y-4">
                            <div class="flex items-center space-x-3">
                                <div class="w-3 h-3 rounded-full bg-emerald-500"></div>
                                <span class="text-slate-300">Instalação e manutenção</span>
                            </div>
                            <div class="flex items-center space-x-3">
                                <div class="w-3 h-3 rounded-full bg-primary-500"></div>
                                <span class="text-slate-300">Contratos preventivos</span>
                            </div>
                            <div class="flex items-center space-x-3">
                                <div class="w-3 h-3 rounded-full bg-portfolio-accent"></div>
                                <span class="text-slate-300">Atendimento ágil</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Sobre: empresa + Missão, Visão, Valores -->
    <section id="sobre" class="section-padding bg-portfolio-dark-card">
        <div class="container-custom">
            <div class="text-center mb-12 fade-in-on-scroll">
                <h2 class="text-3xl md:text-4xl font-bold text-white mb-4">{{ $sections['sobre']['title'] ?? 'Sobre a Empresa' }}</h2>
                <div class="w-24 h-1 bg-primary-500 mx-auto mb-6"></div>
                <p class="text-lg text-slate-400 max-w-3xl mx-auto mb-10">
                    {{ $company['description'] ?? '' }}
                </p>
            </div>

            <div class="grid grid-cols-1 lg:grid-cols-3 gap-8 mb-12">
                <div class="bg-portfolio-dark p-6 rounded-xl border border-slate-700/50 hover:border-primary-500/30 transition-colors fade-in-on-scroll">
                    <h3 class="text-xl font-semibold text-primary-400 mb-3">Missão</h3>
                    <p class="text-slate-400">{{ config('portfolio.mission') }}</p>
                </div>
                <div class="bg-portfolio-dark p-6 rounded-xl border border-slate-700/50 hover:border-primary-500/30 transition-colors fade-in-on-scroll">
                    <h3 class="text-xl font-semibold text-primary-400 mb-3">Visão</h3>
                    <p class="text-slate-400">{{ config('portfolio.vision') }}</p>
                </div>
                <div class="bg-portfolio-dark p-6 rounded-xl border border-slate-700/50 hover:border-primary-500/30 transition-colors fade-in-on-scroll">
                    <h3 class="text-xl font-semibold text-primary-400 mb-3">Valores</h3>
                    <ul class="text-slate-400 space-y-2">
                        @foreach(config('portfolio.values', []) as $value)
                            <li class="flex items-start gap-2">
                                <span class="text-primary-400 mt-1">•</span>
                                <span>{{ $value }}</span>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </section>

    <!-- Serviços: Refrigeração Comercial, Industrial, Residencial -->
    <section id="servicos" class="section-padding bg-portfolio-dark">
        <div class="container-custom">
            <div class="text-center mb-16 fade-in-on-scroll">
                <h2 class="text-3xl md:text-4xl font-bold text-white mb-4">{{ $sections['servicos']['title'] ?? 'Serviços Prestados' }}</h2>
                <div class="w-24 h-1 bg-primary-500 mx-auto mb-6"></div>
                <p class="text-lg text-slate-400 max-w-3xl mx-auto">
                    {{ $sections['servicos']['subtitle'] ?? 'Soluções completas em refrigeração.' }}
                </p>
            </div>

            @php $services = config('portfolio.services', []); @endphp
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <div class="bg-portfolio-dark-card p-6 rounded-xl border border-slate-700/50 hover:border-primary-500/30 transition-colors fade-in-on-scroll">
                    <div class="w-12 h-12 bg-primary-500/20 rounded-lg flex items-center justify-center mb-4">
                        <svg class="w-6 h-6 text-primary-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path>
                        </svg>
                    </div>
                    <h3 class="text-xl font-semibold text-white mb-2">{{ $services['comercial']['title'] ?? 'Refrigeração Comercial' }}</h3>
                    <p class="text-slate-400">{{ $services['comercial']['description'] ?? 'Instalação de câmaras frias, manutenção em freezers e expositores, balcões refrigerados e máquinas de gelo.' }}</p>
                </div>
                <div class="bg-portfolio-dark-card p-6 rounded-xl border border-slate-700/50 hover:border-primary-500/30 transition-colors fade-in-on-scroll">
                    <div class="w-12 h-12 bg-primary-500/20 rounded-lg flex items-center justify-center mb-4">
                        <svg class="w-6 h-6 text-primary-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z"></path>
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                        </svg>
                    </div>
                    <h3 class="text-xl font-semibold text-white mb-2">{{ $services['industrial']['title'] ?? 'Refrigeração Industrial' }}</h3>
                    <p class="text-slate-400">{{ $services['industrial']['description'] ?? 'Centrais de refrigeração, chillers, túneis de congelamento e contratos de manutenção preventiva.' }}</p>
                </div>
                <div class="bg-portfolio-dark-card p-6 rounded-xl border border-slate-700/50 hover:border-primary-500/30 transition-colors fade-in-on-scroll">
                    <div class="w-12 h-12 bg-primary-500/20 rounded-lg flex items-center justify-center mb-4">
                        <svg class="w-6 h-6 text-primary-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"></path>
                        </svg>
                    </div>
                    <h3 class="text-xl font-semibold text-white mb-2">{{ $services['residencial']['title'] ?? 'Refrigeração Residencial' }}</h3>
                    <p class="text-slate-400">{{ $services['residencial']['description'] ?? 'Instalação e manutenção de ar-condicionado, recarga de gás e conserto de geladeiras e freezers.' }}</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Parceiros -->
    <section id="parceiros" class="section-padding bg-portfolio-dark-card">
        <div class="container-custom">
            <div class="text-center mb-16 fade-in-on-scroll">
                <h2 class="text-3xl md:text-4xl font-bold text-white mb-4">{{ $sections['parceiros']['title'] ?? 'Principais Parceiros e Contratos' }}</h2>
                <div class="w-24 h-1 bg-primary-500 mx-auto mb-6"></div>
                <p class="text-lg text-slate-400 max-w-3xl mx-auto">
                    {{ $sections['parceiros']['subtitle'] ?? 'Empresas que confiam na WALTECH.' }}
                </p>
            </div>

            <div class="flex flex-wrap justify-center gap-4 md:gap-6 fade-in-on-scroll">
                @foreach(config('portfolio.partners', []) as $partner)
                    <span class="px-5 py-3 bg-portfolio-dark border border-slate-700/50 rounded-lg text-slate-300 font-medium hover:border-primary-500/30 hover:text-primary-400 transition-colors">
                        {{ $partner }}
                    </span>
                @endforeach
            </div>
        </div>
    </section>

    <!-- Contato -->
    <section id="contato" class="section-padding bg-portfolio-dark">
        <div class="container-custom">
            <div class="max-w-3xl mx-auto">
                <div class="text-center mb-12 fade-in-on-scroll">
                    <h2 class="text-3xl md:text-4xl font-bold text-white mb-4">{{ $sections['contato']['title'] ?? 'Entre em Contato' }}</h2>
                    <div class="w-24 h-1 bg-primary-500 mx-auto mb-6"></div>
                    <p class="text-xl text-slate-400">
                        {{ $sections['contato']['subtitle'] ?? 'Solicite um orçamento ou fale com nossa equipe.' }}
                    </p>
                </div>

                <form action="#" method="POST" class="bg-portfolio-dark-card rounded-2xl p-8 border border-slate-700 shadow-2xl fade-in-on-scroll">
                    @csrf
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
                        <div>
                            <label for="nome" class="block text-slate-300 font-medium mb-2">Nome</label>
                            <input type="text" id="nome" name="nome" required
                                class="w-full px-4 py-3 bg-portfolio-dark border border-slate-600 rounded-lg text-white placeholder-slate-500 focus:ring-2 focus:ring-primary-500 focus:border-transparent outline-none transition">
                        </div>
                        <div>
                            <label for="email" class="block text-slate-300 font-medium mb-2">Email</label>
                            <input type="email" id="email" name="email" required
                                class="w-full px-4 py-3 bg-portfolio-dark border border-slate-600 rounded-lg text-white placeholder-slate-500 focus:ring-2 focus:ring-primary-500 focus:border-transparent outline-none transition">
                        </div>
                    </div>
                    <div class="mb-6">
                        <label for="assunto" class="block text-slate-300 font-medium mb-2">Assunto</label>
                        <input type="text" id="assunto" name="assunto" required placeholder="Ex: Orçamento para manutenção"
                            class="w-full px-4 py-3 bg-portfolio-dark border border-slate-600 rounded-lg text-white placeholder-slate-500 focus:ring-2 focus:ring-primary-500 focus:border-transparent outline-none transition">
                    </div>
                    <div class="mb-6">
                        <label for="mensagem" class="block text-slate-300 font-medium mb-2">Mensagem</label>
                        <textarea id="mensagem" name="mensagem" rows="5" required placeholder="Descreva sua necessidade..."
                            class="w-full px-4 py-3 bg-portfolio-dark border border-slate-600 rounded-lg text-white placeholder-slate-500 focus:ring-2 focus:ring-primary-500 focus:border-transparent outline-none transition resize-none"></textarea>
                    </div>
                    <button type="submit" class="w-full btn-primary">
                        Enviar Mensagem
                    </button>
                </form>
            </div>
        </div>
    </section>
@endsection

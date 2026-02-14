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
    <section id="home" class="pt-20 md:pt-32 pb-16 md:pb-28 bg-portfolio-dark relative overflow-hidden">
        <!-- Background Image -->
        <div class="absolute inset-0 bg-cover bg-center bg-no-repeat opacity-20" style="background-image: url('{{ asset('images/banners/hero-bg.png') }}');"></div>

        <div class="absolute inset-0 bg-gradient-to-br from-primary-900/30 via-portfolio-dark/90 to-portfolio-accent/20"></div>
        <div class="absolute top-1/4 right-0 w-96 h-96 bg-primary-500/10 rounded-full blur-3xl"></div>
        <div class="absolute bottom-0 left-0 w-80 h-80 bg-portfolio-accent/10 rounded-full blur-3xl"></div>

        <div class="container-custom relative z-10">
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-center">
                <div class="fade-in-on-scroll">
                    <div class="inline-flex items-center gap-2 bg-primary-500/10 border border-primary-500/30 rounded-full px-4 py-2 mb-4">
                        <span class="w-2 h-2 bg-primary-400 rounded-full animate-pulse"></span>
                        <span class="text-primary-400 font-semibold text-sm">{{ $company['tagline'] ?? 'Serviços Técnicos' }}</span>
                    </div>
                    <h1 class="text-3xl sm:text-4xl md:text-5xl lg:text-6xl font-bold text-white mb-6 leading-tight">
                        Soluções em
                        <span class="text-primary-400">refrigeração</span>
                        comercial, industrial e residencial
                    </h1>
                    <p class="text-base sm:text-lg md:text-xl text-slate-400 mb-8 leading-relaxed">
                        Instalação, manutenção e assistência técnica com qualidade, agilidade e segurança para o pleno funcionamento dos seus equipamentos.
                    </p>
                    <div class="flex flex-col sm:flex-row gap-4">
                        <a href="https://wa.me/5544998355403?text=Olá!%20Gostaria%20de%20solicitar%20um%20orçamento." target="_blank" rel="noopener noreferrer" class="btn-primary text-center">Solicitar orçamento</a>
                        <a href="#servicos" class="btn-secondary text-center">Nossos serviços</a>
                    </div>

                    <!-- Stats -->
                    <div class="grid grid-cols-3 gap-3 sm:gap-6 mt-8 sm:mt-12 pt-6 sm:pt-8 border-t border-slate-700/50">
                        <div class="text-center">
                            <div class="text-2xl sm:text-3xl font-bold text-primary-400">+13</div>
                            <div class="text-xs sm:text-sm text-slate-400 mt-1">Parceiros</div>
                        </div>
                        <div class="text-center">
                            <div class="text-2xl sm:text-3xl font-bold text-primary-400">24/7</div>
                            <div class="text-xs sm:text-sm text-slate-400 mt-1">Suporte</div>
                        </div>
                        <div class="text-center">
                            <div class="text-2xl sm:text-3xl font-bold text-primary-400">100%</div>
                            <div class="text-xs sm:text-sm text-slate-400 mt-1">Qualidade</div>
                        </div>
                    </div>
                </div>

                <!-- Banner Image (adicionar imagem aqui) -->
                <div class="fade-in-on-scroll hidden lg:block">
                    <div class="relative">
                        <div class="absolute inset-0 bg-gradient-to-br from-primary-500/20 to-portfolio-accent/20 rounded-2xl blur-2xl"></div>
                        <img src="{{ asset('images/banners/hero-main.png') }}" alt="Refrigeração WALTECH" class="relative z-10 w-full h-auto rounded-2xl shadow-2xl" onerror="this.style.display='none'; this.nextElementSibling.style.display='block';">
                        <!-- Fallback quando não há imagem -->
                        <div class="relative z-10 bg-gradient-to-br from-primary-500/10 to-portfolio-accent/10 border border-slate-700 rounded-2xl p-8 shadow-2xl" style="display: none;">
                            <div class="space-y-4">
                                <div class="flex items-center space-x-3">
                                    <div class="w-3 h-3 rounded-full bg-emerald-500 animate-pulse"></div>
                                    <span class="text-slate-300">Instalação e manutenção</span>
                                </div>
                                <div class="flex items-center space-x-3">
                                    <div class="w-3 h-3 rounded-full bg-primary-500 animate-pulse"></div>
                                    <span class="text-slate-300">Contratos preventivos</span>
                                </div>
                                <div class="flex items-center space-x-3">
                                    <div class="w-3 h-3 rounded-full bg-portfolio-accent animate-pulse"></div>
                                    <span class="text-slate-300">Atendimento ágil</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Diferenciais -->
    <section class="section-padding bg-portfolio-dark-card">
        <div class="container-custom">
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
                <!-- Diferencial 1 -->
                <div class="group relative overflow-hidden bg-gradient-to-br from-primary-500/10 to-primary-600/5 border border-primary-500/20 rounded-xl p-6 hover:border-primary-500/50 transition-all duration-300 hover:scale-105">
                    <div class="absolute top-0 right-0 w-32 h-32 bg-primary-500/10 rounded-full blur-2xl group-hover:bg-primary-500/20 transition-all"></div>
                    <div class="relative z-10">
                        <div class="w-14 h-14 bg-primary-500/20 rounded-lg flex items-center justify-center mb-4 group-hover:scale-110 transition-transform">
                            <svg class="w-7 h-7 text-primary-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                        </div>
                        <h3 class="text-lg font-bold text-white mb-2">Atendimento Rápido</h3>
                        <p class="text-sm text-slate-400">Resposta em até 2 horas para emergências</p>
                    </div>
                </div>

                <!-- Diferencial 2 -->
                <div class="group relative overflow-hidden bg-gradient-to-br from-emerald-500/10 to-emerald-600/5 border border-emerald-500/20 rounded-xl p-6 hover:border-emerald-500/50 transition-all duration-300 hover:scale-105">
                    <div class="absolute top-0 right-0 w-32 h-32 bg-emerald-500/10 rounded-full blur-2xl group-hover:bg-emerald-500/20 transition-all"></div>
                    <div class="relative z-10">
                        <div class="w-14 h-14 bg-emerald-500/20 rounded-lg flex items-center justify-center mb-4 group-hover:scale-110 transition-transform">
                            <svg class="w-7 h-7 text-emerald-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"></path>
                            </svg>
                        </div>
                        <h3 class="text-lg font-bold text-white mb-2">Garantia Total</h3>
                        <p class="text-sm text-slate-400">Todos os serviços com garantia de qualidade</p>
                    </div>
                </div>

                <!-- Diferencial 3 -->
                <div class="group relative overflow-hidden bg-gradient-to-br from-blue-500/10 to-blue-600/5 border border-blue-500/20 rounded-xl p-6 hover:border-blue-500/50 transition-all duration-300 hover:scale-105">
                    <div class="absolute top-0 right-0 w-32 h-32 bg-blue-500/10 rounded-full blur-2xl group-hover:bg-blue-500/20 transition-all"></div>
                    <div class="relative z-10">
                        <div class="w-14 h-14 bg-blue-500/20 rounded-lg flex items-center justify-center mb-4 group-hover:scale-110 transition-transform">
                            <svg class="w-7 h-7 text-blue-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path>
                            </svg>
                        </div>
                        <h3 class="text-lg font-bold text-white mb-2">Equipe Qualificada</h3>
                        <p class="text-sm text-slate-400">Técnicos certificados e experientes</p>
                    </div>
                </div>

                <!-- Diferencial 4 -->
                <div class="group relative overflow-hidden bg-gradient-to-br from-purple-500/10 to-purple-600/5 border border-purple-500/20 rounded-xl p-6 hover:border-purple-500/50 transition-all duration-300 hover:scale-105">
                    <div class="absolute top-0 right-0 w-32 h-32 bg-purple-500/10 rounded-full blur-2xl group-hover:bg-purple-500/20 transition-all"></div>
                    <div class="relative z-10">
                        <div class="w-14 h-14 bg-purple-500/20 rounded-lg flex items-center justify-center mb-4 group-hover:scale-110 transition-transform">
                            <svg class="w-7 h-7 text-purple-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                        </div>
                        <h3 class="text-lg font-bold text-white mb-2">Preço Justo</h3>
                        <p class="text-sm text-slate-400">Orçamentos transparentes sem surpresas</p>
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

    <!-- CTA Banner -->
    <section class="section-padding bg-portfolio-dark relative overflow-hidden">
        <!-- Background Image -->
        <div class="absolute inset-0 bg-cover bg-center bg-no-repeat opacity-15" style="background-image: url('{{ asset('images/banners/cta-bg.png') }}');"></div>

        <div class="absolute inset-0 bg-gradient-to-r from-primary-600/20 via-portfolio-dark to-emerald-600/20"></div>
        <div class="absolute top-0 left-1/4 w-96 h-96 bg-primary-500/10 rounded-full blur-3xl"></div>
        <div class="absolute bottom-0 right-1/4 w-96 h-96 bg-emerald-500/10 rounded-full blur-3xl"></div>

        <div class="container-custom relative z-10">
            <div class="max-w-4xl mx-auto">
                <div class="bg-gradient-to-br from-primary-500/10 via-portfolio-dark-card to-emerald-500/10 border border-primary-500/30 rounded-2xl p-8 md:p-12 text-center">
                    <div class="inline-flex items-center gap-2 bg-emerald-500/10 border border-emerald-500/30 rounded-full px-4 py-2 mb-6">
                        <span class="w-2 h-2 bg-emerald-400 rounded-full animate-pulse"></span>
                        <span class="text-emerald-400 font-semibold text-sm">Atendimento Disponível</span>
                    </div>

                    <h2 class="text-3xl md:text-4xl lg:text-5xl font-bold text-white mb-6">
                        Precisa de manutenção ou instalação de refrigeração?
                    </h2>

                    <p class="text-lg md:text-xl text-slate-400 mb-8 max-w-2xl mx-auto">
                        Entre em contato agora e receba um orçamento gratuito. Nossa equipe está pronta para atender sua empresa com agilidade e qualidade.
                    </p>

                    <div class="flex flex-col sm:flex-row gap-4 justify-center items-center">
                        <a href="https://wa.me/5544998355403?text=Olá!%20Vim%20através%20do%20site%20e%20gostaria%20de%20mais%20informações." target="_blank" rel="noopener noreferrer"
                           class="inline-flex items-center gap-3 bg-emerald-500 hover:bg-emerald-600 text-white font-bold text-lg py-4 px-8 rounded-xl transition-all shadow-lg hover:shadow-emerald-500/25 hover:scale-105">
                            <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413Z"/>
                            </svg>
                            WhatsApp: (44) 99835-5403
                        </a>
                        <a href="mailto:wallace_proj@outlook.com.br"
                           class="inline-flex items-center gap-3 border-2 border-primary-500 text-primary-400 hover:bg-primary-500/10 font-bold text-lg py-4 px-8 rounded-xl transition-all hover:scale-105">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
                            </svg>
                            Enviar E-mail
                        </a>
                    </div>

                    <!-- Mini Stats -->
                    <div class="grid grid-cols-2 md:grid-cols-4 gap-6 mt-12 pt-8 border-t border-slate-700/50">
                        <div>
                            <div class="text-2xl md:text-3xl font-bold text-primary-400">+100</div>
                            <div class="text-xs md:text-sm text-slate-400 mt-1">Clientes Atendidos</div>
                        </div>
                        <div>
                            <div class="text-2xl md:text-3xl font-bold text-emerald-400">+13</div>
                            <div class="text-xs md:text-sm text-slate-400 mt-1">Parceiros Ativos</div>
                        </div>
                        <div>
                            <div class="text-2xl md:text-3xl font-bold text-blue-400">24/7</div>
                            <div class="text-xs md:text-sm text-slate-400 mt-1">Suporte Emergencial</div>
                        </div>
                        <div>
                            <div class="text-2xl md:text-3xl font-bold text-purple-400">100%</div>
                            <div class="text-xs md:text-sm text-slate-400 mt-1">Satisfação</div>
                        </div>
                    </div>
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

            <!-- Carrossel de Logos -->
            <div class="relative overflow-hidden py-8">
                <div class="logos-slider flex gap-6 md:gap-12 items-center">
                    @php
                        $logoFiles = array_merge(
                            glob(public_path('images/partners/*.png')),
                            glob(public_path('images/partners/*.jpg')),
                            glob(public_path('images/partners/*.jpeg'))
                        );
                        // Duplicar logos para efeito infinito
                        $allLogos = array_merge($logoFiles, $logoFiles);
                    @endphp
                    @foreach($allLogos as $logoPath)
                        @php
                            $logoName = basename($logoPath);
                        @endphp
                        <div class="logo-item flex-shrink-0">
                            <div class="group bg-white/5 backdrop-blur-sm border border-slate-700/30 rounded-xl md:rounded-2xl p-4 md:p-8 hover:border-primary-500/50 hover:bg-white/10 transition-all duration-300 hover:scale-105 hover:shadow-xl hover:shadow-primary-500/10 flex items-center justify-center w-[180px] h-[120px] md:w-[280px] md:h-[180px]">
                                <img
                                    src="{{ asset('images/partners/' . $logoName) }}"
                                    alt="{{ pathinfo($logoName, PATHINFO_FILENAME) }}"
                                    class="max-w-full max-h-full w-auto h-auto object-contain filter group-hover:brightness-110 transition-all duration-300"
                                    loading="lazy"
                                >
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>

            <style>
                @keyframes slide {
                    0% {
                        transform: translateX(0);
                    }
                    100% {
                        transform: translateX(-50%);
                    }
                }

                .logos-slider {
                    animation: slide 40s linear infinite;
                    width: max-content;
                }

                .logos-slider:hover,
                .logos-slider.paused {
                    animation-play-state: paused;
                }
            </style>

            <script>
                // Pausar carrossel ao tocar em mobile
                document.addEventListener('DOMContentLoaded', function() {
                    const slider = document.querySelector('.logos-slider');
                    if (slider) {
                        slider.addEventListener('touchstart', function() {
                            this.classList.add('paused');
                        });
                        slider.addEventListener('touchend', function() {
                            this.classList.remove('paused');
                        });
                    }
                });
            </script>

            <div class="mt-8 text-center fade-in-on-scroll">
                <p class="text-slate-400 text-sm">
                    <svg class="w-4 h-4 inline-block mr-2 text-primary-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 9v6m4-6v6m7-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                    </svg>
                    <span class="hidden md:inline">Passe o mouse sobre o carrossel para pausar</span>
                    <span class="md:hidden">Toque no carrossel para pausar</span>
                </p>
            </div>
        </div>
    </section>

    <!-- Contato -->
    <section id="contato" class="section-padding bg-portfolio-dark">
        <div class="container-custom">
            <div class="max-w-4xl mx-auto">
                <div class="text-center mb-12 fade-in-on-scroll">
                    <h2 class="text-3xl md:text-4xl font-bold text-white mb-4">{{ $sections['contato']['title'] ?? 'Entre em Contato' }}</h2>
                    <div class="w-24 h-1 bg-primary-500 mx-auto mb-6"></div>
                    <p class="text-lg md:text-xl text-slate-400">
                        {{ $sections['contato']['subtitle'] ?? 'Solicite um orçamento ou fale com nossa equipe.' }}
                    </p>
                </div>

                <!-- WhatsApp Card - Destaque -->
                <div class="max-w-2xl mx-auto">
                    <div class="bg-gradient-to-br from-emerald-500/10 to-emerald-600/5 rounded-xl md:rounded-2xl p-6 md:p-10 border border-emerald-500/30 shadow-2xl fade-in-on-scroll hover:border-emerald-500/50 transition-all">
                        <div class="flex items-center justify-center w-16 h-16 md:w-20 md:h-20 bg-emerald-500/20 rounded-full mb-4 md:mb-6 mx-auto">
                            <svg class="w-8 h-8 md:w-10 md:h-10 text-emerald-400" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413Z"/>
                            </svg>
                        </div>
                        <h3 class="text-2xl md:text-3xl font-bold text-white text-center mb-3 md:mb-4">Fale Conosco pelo WhatsApp</h3>
                        <p class="text-base md:text-lg text-slate-400 text-center mb-6 md:mb-8">Entre em contato para orçamentos, dúvidas ou agendamentos</p>
                        <a href="https://wa.me/5544998355403?text=Olá!%20Vim%20através%20do%20site%20e%20gostaria%20de%20mais%20informações." target="_blank" rel="noopener noreferrer"
                           class="block w-full bg-emerald-500 hover:bg-emerald-600 text-white font-bold text-base md:text-lg py-4 md:py-5 px-6 md:px-8 rounded-xl text-center transition-all shadow-lg hover:shadow-emerald-500/25 hover:scale-105">
                            <span class="flex items-center justify-center gap-2 md:gap-3">
                                <svg class="w-5 h-5 md:w-6 md:h-6" fill="currentColor" viewBox="0 0 24 24">
                                    <path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413Z"/>
                                </svg>
                                (44) 99835-5403
                            </span>
                        </a>
                    </div>
                </div>

                <!-- Informação adicional -->
                <div class="mt-8 text-center fade-in-on-scroll">
                    <p class="text-slate-400">
                        <svg class="w-5 h-5 inline-block mr-2 text-primary-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                        Atendimento de segunda a sexta, das 8h às 18h
                    </p>
                </div>
            </div>
        </div>
    </section>
@endsection

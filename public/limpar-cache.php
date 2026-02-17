<?php
/**
 * Script para limpar cache do Laravel via navegador
 * IMPORTANTE: Deletar este arquivo após usar!
 */

require __DIR__.'/../vendor/autoload.php';
$app = require_once __DIR__.'/../bootstrap/app.php';
$kernel = $app->make(Illuminate\Contracts\Console\Kernel::class);
$kernel->bootstrap();

echo "<h2>Limpando cache do Laravel...</h2>";

// Limpar cache de views
Illuminate\Support\Facades\Artisan::call('view:clear');
echo "<p>✅ Views limpas: " . Illuminate\Support\Facades\Artisan::output() . "</p>";

// Limpar cache de config
Illuminate\Support\Facades\Artisan::call('config:clear');
echo "<p>✅ Config limpa: " . Illuminate\Support\Facades\Artisan::output() . "</p>";

// Limpar cache de rotas
Illuminate\Support\Facades\Artisan::call('route:clear');
echo "<p>✅ Rotas limpas: " . Illuminate\Support\Facades\Artisan::output() . "</p>";

// Limpar cache geral
Illuminate\Support\Facades\Artisan::call('cache:clear');
echo "<p>✅ Cache geral limpo: " . Illuminate\Support\Facades\Artisan::output() . "</p>";

echo "<h2>✅ Tudo limpo! Agora acesse o site normalmente.</h2>";
echo "<p style='color:red;'><strong>⚠️ IMPORTANTE: Delete este arquivo (limpar-cache.php) depois!</strong></p>";

<?php
require __DIR__.'/../vendor/autoload.php';
$app = require_once __DIR__.'/../bootstrap/app.php';
$kernel = $app->make(Illuminate\Contracts\Console\Kernel::class);
$kernel->bootstrap();

echo "<h2>Debug WALTECH</h2>";
echo "<p><strong>APP_URL:</strong> " . config('app.url') . "</p>";
echo "<p><strong>APP_ENV:</strong> " . config('app.env') . "</p>";
echo "<p><strong>asset() test:</strong> " . asset('build/assets/app-BBPwj0Yi.css') . "</p>";
echo "<p><strong>public_path:</strong> " . public_path() . "</p>";
echo "<p><strong>hot file exists:</strong> " . (file_exists(public_path('hot')) ? 'SIM' : 'NAO') . "</p>";
echo "<p><strong>manifest exists:</strong> " . (file_exists(public_path('build/manifest.json')) ? 'SIM' : 'NAO') . "</p>";
echo "<p><strong>CSS exists:</strong> " . (file_exists(public_path('build/assets/app-BBPwj0Yi.css')) ? 'SIM' : 'NAO') . "</p>";
echo "<p><strong>JS exists:</strong> " . (file_exists(public_path('build/assets/app-7wL9b_hj.js')) ? 'SIM' : 'NAO') . "</p>";

echo "<h3>Teste de CSS direto:</h3>";
echo '<link rel="stylesheet" href="/build/assets/app-BBPwj0Yi.css">';
echo '<div class="bg-primary-500 text-white p-4 rounded">Se voce ve este texto em AZUL com fundo, o CSS esta funcionando!</div>';

echo "<p style='color:red;'><br><strong>DELETE este arquivo depois!</strong></p>";

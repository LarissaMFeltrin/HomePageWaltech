<?php
require __DIR__.'/../vendor/autoload.php';
$app = require_once __DIR__.'/../bootstrap/app.php';
$kernel = $app->make(Illuminate\Contracts\Console\Kernel::class);
$kernel->bootstrap();

echo "<h2>Corrigindo WALTECH...</h2>";

// 1. Deletar TODOS os arquivos de views compiladas
$viewsPath = storage_path('framework/views');
$files = glob($viewsPath . '/*.php');
$count = 0;
foreach ($files as $file) {
    unlink($file);
    $count++;
}
echo "<p>✅ $count views compiladas deletadas</p>";

// 2. Limpar todos os caches
Illuminate\Support\Facades\Artisan::call('config:clear');
echo "<p>✅ Config limpa</p>";
Illuminate\Support\Facades\Artisan::call('route:clear');
echo "<p>✅ Rotas limpas</p>";
Illuminate\Support\Facades\Artisan::call('cache:clear');
echo "<p>✅ Cache limpo</p>";

// 3. Verificar se o blade foi editado corretamente
$blade = file_get_contents(resource_path('views/layouts/app.blade.php'));
if (strpos($blade, 'app-BBPwj0Yi.css') !== false) {
    echo "<p>✅ app.blade.php tem os links diretos do CSS</p>";
} else if (strpos($blade, '@vite') !== false && strpos($blade, 'file_exists') === false) {
    echo "<p>❌ app.blade.php ainda usa @vite SEM o fallback! Precisa editar o arquivo.</p>";
    echo "<p>O arquivo contém:</p>";
    // Mostrar as primeiras 20 linhas
    $lines = explode("\n", $blade);
    echo "<pre>";
    for ($i = 0; $i < min(20, count($lines)); $i++) {
        echo htmlspecialchars(($i+1) . ": " . $lines[$i]) . "\n";
    }
    echo "</pre>";
} else {
    echo "<p>⚠️ Verificar app.blade.php manualmente</p>";
    $lines = explode("\n", $blade);
    echo "<pre>";
    for ($i = 0; $i < min(20, count($lines)); $i++) {
        echo htmlspecialchars(($i+1) . ": " . $lines[$i]) . "\n";
    }
    echo "</pre>";
}

echo "<h2>Pronto! Agora acesse o site: <a href='/'>waltechrefrigera.com.br</a></h2>";
echo "<p style='color:red;'><strong>DELETE este arquivo depois!</strong></p>";

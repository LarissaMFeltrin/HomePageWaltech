<?php
// Capturar o HTML gerado pelo Laravel
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, 'https://waltechrefrigera.com.br/');
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
$html = curl_exec($ch);
$httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
curl_close($ch);

echo "<h2>HTTP Status: $httpCode</h2>";
echo "<h3>Primeiras 30 linhas do HTML:</h3>";
echo "<pre>";
$lines = explode("\n", $html);
for ($i = 0; $i < min(30, count($lines)); $i++) {
    echo htmlspecialchars(($i+1) . ": " . $lines[$i]) . "\n";
}
echo "</pre>";

echo "<h3>Buscando tags link e script:</h3>";
preg_match_all('/<link[^>]+>/', $html, $links);
preg_match_all('/<script[^>]*src[^>]*>/', $html, $scripts);

echo "<p><strong>Links CSS encontrados:</strong></p><ul>";
foreach ($links[0] as $link) {
    echo "<li>" . htmlspecialchars($link) . "</li>";
}
echo "</ul>";

echo "<p><strong>Scripts JS encontrados:</strong></p><ul>";
foreach ($scripts[0] as $script) {
    echo "<li>" . htmlspecialchars($script) . "</li>";
}
echo "</ul>";

echo "<p style='color:red;'><strong>DELETE este arquivo depois!</strong></p>";

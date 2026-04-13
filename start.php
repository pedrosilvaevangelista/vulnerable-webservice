<?php
echo "\n";
echo "  ╔══════════════════════════════════════╗\n";
echo "  ║   🛡️  Vulnerable Web Service         ║\n";
echo "  ║   Pentest Lab - Insecure by Design   ║\n";
echo "  ╚══════════════════════════════════════╝\n";
echo "\n";

require __DIR__ . '/db.php';

echo "  ✅ Banco de dados inicializado\n";
echo "  👉 Acesse: http://localhost:8080\n";
echo "  🛑 Para parar: Ctrl+C\n\n";

passthru(PHP_BINARY . ' -S localhost:8080 -t ' . escapeshellarg(__DIR__));

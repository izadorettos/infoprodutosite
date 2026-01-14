#!/bin/bash

# Script para finalizar a organização das pastas
# Execute este script na raiz do projeto: bash cleanup.sh

echo "🧹 Iniciando limpeza e organização dos arquivos..."

# Mover imagens para assets/
echo "📁 Movendo imagens para assets/..."
mv laptop-mockup.png assets/ 2>/dev/null && echo "✅ laptop-mockup.png movido" || echo "⚠️  laptop-mockup.png já foi movido ou não existe"
mv tablet-mockup.png assets/ 2>/dev/null && echo "✅ tablet-mockup.png movido" || echo "⚠️  tablet-mockup.png já foi movido ou não existe"

# Deletar arquivos CSS e JS antigos da raiz
echo "🗑️  Removendo arquivos CSS e JS antigos da raiz..."
rm -f style.css && echo "✅ style.css removido" || echo "⚠️  style.css não encontrado"
rm -f script.js && echo "✅ script.js removido" || echo "⚠️  script.js não encontrado"

# Deletar arquivos PHP utilitários antigos da raiz
echo "🗑️  Removendo arquivos PHP utilitários antigos da raiz..."
rm -f db.php && echo "✅ db.php removido"
rm -f seo.php && echo "✅ seo.php removido"
rm -f auth.php && echo "✅ auth.php removido"
rm -f header.php && echo "✅ header.php removido"
rm -f logout.php && echo "✅ logout.php removido"
rm -f redirect_if_logged.php && echo "✅ redirect_if_logged.php removido"
rm -f process_payment.php && echo "✅ process_payment.php removido"
rm -f login_process.php && echo "✅ login_process.php removido"
rm -f registro_process.php && echo "✅ registro_process.php removido"

echo ""
echo "✨ Limpeza concluída!"
echo ""
echo "📂 Estrutura final das pastas:"
echo "   css/         - Arquivos de estilo"
echo "   js/          - Arquivos JavaScript"
echo "   assets/      - Imagens e mídia"
echo "   php/         - Arquivos PHP utilitários"
echo ""
echo "📄 Arquivos na raiz:"
echo "   - Páginas PHP (index.php, login.php, etc.)"
echo "   - database.sql"
echo ""

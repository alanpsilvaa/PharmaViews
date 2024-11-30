<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestão de Verbas</title>
    <link rel="stylesheet" href="style.css">

</head>

<body>
    <header>
             <h1>PharmaViews</h1>
    </header>
            <h2 class="2">GESTÃO DE VERBAS</h2>

    <main style="padding: 20px;">


    <form id="acaoForm" action="processa.php" method="POST" style="margin-bottom: 20px;">
            <div style="margin-bottom: 10px;">
                <label for="tipoAcao">Ação:</label>
                <br>
                <select id="tipoAcao" required>
                    <option value="">Selecione o tipo da ação...</option>
                    <option value="palestra">Palestra</option>
                    <option value="evento">Evento</option>
                    <option value="apoioGrafico">Apoio Gráfico</option>
                </select>
            </div>
            <div style="margin-bottom: 10px;">
                <label for="dataPrevista">Data prevista:</label>
                <input type="date" id="dataPrevista" required>
            </div>
            <div style="margin-bottom: 10px;">
                <label for="investimento">Investimento previsto (R$):</label>
                <input type="number" id="investimento" min="0" step="0.01" required>
            </div>
            <button type="button" id="limpar">Limpar</button>
            <button type="submit">Adicionar</button>
        </form>

        <table border="1">
            <thead>
                <tr>
                    <th>Ação</th>
                    <th>Data prevista</th>
                    <th>Investimento previsto</th>
                    <th>Editar</th>
                    <th>Excluir</th>
                </tr>
            </thead>
            <tbody id="acoesTabela">
                <!-- Linhas serão adicionadas dinamicamente -->
            </tbody>
        </table>
    </main>

    <footer class="rodape">
        <p>&copy; 2024 PHARMAVIEWS. Todos os direitos reservados.</p>
    </footer>

    <script>
        document.getElementById("acaoForm").addEventListener("submit", function(event) {
            event.preventDefault(); // Evita o envio padrão do formulário

            const tipoAcao = document.getElementById("tipoAcao").value;
            const dataPrevista = document.getElementById("dataPrevista").value;
            const investimento = document.getElementById("investimento").value;

            if (tipoAcao && dataPrevista && investimento) {
                const tabela = document.getElementById("acoesTabela");
                const novaLinha = tabela.insertRow();

                novaLinha.innerHTML = `
          <td>${tipoAcao}</td>
          <td>${dataPrevista}</td>
          <td>R$ ${parseFloat(investimento).toFixed(2)}</td>
          <td><button class="editar">Editar</button></td>
          <td><button class="excluir">Excluir</button></td>
        `;

                novaLinha.querySelector(".excluir").addEventListener("click", function() {
                    tabela.deleteRow(novaLinha.rowIndex - 1);
                });

                document.getElementById("acaoForm").reset();
            }
        });

        document.getElementById("limpar").addEventListener("click", function() {
            document.getElementById("acaoForm").reset();
        });
    </script>
</body>

</html>
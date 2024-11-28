<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Conversor de Anos-luz para Km</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <style>
        .sidebar {
            background-color: #003366;
            color: white;
            border-radius: 10px 0 0 10px;
        }
        .sidebar img {
            width: 80%;
            margin: 20px auto;
            display: block;
            border-radius: 100px;
        }
        .sidebar button {
            background-color: #0055aa;
            border: none;
            margin-bottom: 10px;
            border-radius: 7px;
        }
        .sidebar button.active {
            background-color: #007bff;
        }
        .main-content {
            border-radius: 0 10px 10px 0;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }
        .convert-section input {
            max-width: 300px;
            margin: 20px auto;
        }
        .convert-section button {
            background-color: #0055aa;
        }
        h2 {
            font-size: 27px;
        }
    </style>
</head>
<body class="bg-light">
    <div class="container mt-5">
        <div class="row">
            <!-- Sidebar -->
            <div class="col-md-3 sidebar py-4"> 
                <img src="{{ asset('images/logo.jpg') }}" alt="Netcon Logo">
                <a href="/" class="btn btn-primary w-100">KM → ANOS LUZ</a>
                &nbsp
                <a class="btn btn-primary w-100">ANOS LUZ → KM</a>
            </div>

            <!-- Content -->
            <div class="col-md-9 bg-white p-5 main-content">
                <h2 class="text-center mb-3">Projeto PHP Netcon - Conversor de Anos-luz para Km</h2>

                <!-- Conversão -->
                <div class="convert-section text-center">
                    <label for="inputValue" class="form-label"><strong>Anos-luz:</strong></label>
                    <input 
                        type="number" 
                        id="inputValue" 
                        class="form-control text-center" 
                        placeholder="Digite o valor em Anos-luz" 
                        oninput="validateInput(this)"
                    >
                    <button id="convertButton" onclick="convert()" class="btn btn-primary mt-3" disabled>Converter →</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal para exibição do resultado -->
    <div class="modal fade" id="resultModal" tabindex="-1" aria-labelledby="resultModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="resultModalLabel">Resultado da Conversão</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body" id="resultText">
                    <!-- Resultado será inserido aqui via JavaScript -->
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <script>
        // Validação do input para aceitar apenas números positivos
        function validateInput(input) {
            const value = input.value;
            const button = document.getElementById("convertButton");
            if (value && value > 0) {
                button.disabled = false; // Habilita o botão
            } else {
                button.disabled = true; // Desabilita o botão
            }
        }

        // Conversão de Anos-luz para Km
        function convert() {
            const inputValue = document.getElementById("inputValue").value;

            if (!inputValue || inputValue <= 0) {
                alert("Por favor, insira um valor válido!");
                return;
            }
            $.ajax({
                url : 'api/quilometros',
                data: {light_years: inputValue},
                type : 'post',
                dataType : 'json',
                success : function(data){

                // Exibe o resultado no modal
                const resultText = `O valor convertido é: <strong>${data.quilometros} Km</strong>`;
                document.getElementById("resultText").innerHTML = resultText;

                // Exibe o modal
                const resultModal = new bootstrap.Modal(document.getElementById('resultModal'));
                resultModal.show();
                }
            });
            
        }
    </script>
    
</body>

<footer class="bg-secondary col-md-10 text-white text-center py-4 mt-5 mx-auto" style="max-width: 75%;">
    <div class="container">
        <p class="mb-2">&copy; 2024 Projeto PHP Netcon - Todos os direitos reservados.</p>
        <p class="mb-0">Desenvolvido por <a href="https://www.linkedin.com/in/bruna-borges-098a64200/" class="text-light text-decoration-underline">Bruna Borges</a></p>
    </div>
</footer>


</html>

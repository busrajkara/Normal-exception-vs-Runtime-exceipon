<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Deniz Temalı API İsteği</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        
        body {
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100vh;
            font-family: Arial, sans-serif;
            background: linear-gradient(to bottom, #a2d9ff, #0077be); /* Deniz temalı degrade arka plan */
            background-size: cover;
            color: #fff;
        }

        .container {
            width: 100%;
            max-width: 400px;
            background-color: rgba(255, 255, 255, 0.9); /* Şeffaf beyaz ile deniz havası */
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 6px 12px rgba(0, 0, 0, 0.15);
            text-align: center;
        }

        h1 {
            color: #004d66; /* Deniz mavisi */
            font-size: 1.7em;
            margin-bottom: 1em;
            text-shadow: 1px 1px 2px #004d66;
        }

        .button {
            display: inline-block;
            background-color: #005f73; /* Deniz mavisi */
            color: #fff;
            padding: 12px 25px;
            border: none;
            border-radius: 25px;
            cursor: pointer;
            font-size: 1em;
            transition: background-color 0.3s ease, transform 0.2s;
        }

        .button:hover {
            background-color: #0a9396;
            transform: scale(1.05);
        }

        .result, .error {
            padding: 15px;
            margin-top: 20px;
            border-radius: 5px;
            font-size: 0.95em;
            line-height: 1.5;
            display: inline-block;
            width: 100%;
            text-align: left;
        }

        .result {
            background-color: #e0f7fa; /* Hafif deniz köpüğü rengi */
            color: #004d40;
            border-left: 5px solid #00796b;
        }

        .error {
            background-color: #ffe5e5; /* Hafif mercan rengi */
            color: #b71c1c;
            border-left: 5px solid #d32f2f;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Deniz Temalı Veri Çekme</h1>
        <button class="button" onclick="fetchData()">Veriyi Getir</button>
        <div id="output"></div>
    </div>

    <script>
        function fetchData() {
            fetch('index.php?action=fetch') // Aynı dosyaya istek gönderiyoruz
                .then(response => response.json())
                .then(data => {
                    const output = document.getElementById('output');
                    output.innerHTML = ""; // Önceki sonucu temizle

                    if (data.error) {
                        output.innerHTML = `<div class="error">${data.error}</div>`;
                    } else {
                        output.innerHTML = `<div class="result">${data.message}</div>`;
                    }
                })
                .catch(error => {
                    document.getElementById('output').innerHTML = `<div class="error">Beklenmedik bir hata oluştu: ${error.message}</div>`;
                });
        }
    </script>

    <?php
    // PHP kodu veri çekme işlemini simüle ediyor
    if (isset($_GET['action']) && $_GET['action'] == 'fetch') {
        header('Content-Type: application/json');

        try {
            $url = ""; // Boş URL simülasyonu
            if (!$url) {
                throw new Exception("URL boş olamaz!");
            }

            // Örnek veri simülasyonu
            $data = ["status" => "success", "message" => "Veri başarıyla çekildi"];

            if ($data['status'] !== 'success') {
                throw new RuntimeException("Veri çekme başarısız oldu.");
            }

            echo json_encode($data);
        } catch (Exception $e) {
            echo json_encode(["error" => $e->getMessage()]);
        } catch (RuntimeException $e) {
            echo json_encode(["error" => "Bir çalışma zamanı hatası oluştu: " . $e->getMessage()]);
        }
        exit;
    }
    ?>
</body>
</html>

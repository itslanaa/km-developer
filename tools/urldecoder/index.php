<!DOCTYPE html>
<html>
<head>
  <title>URL Decoder/Encoder and Extractor</title>
  <style>
    body {
      font-family: Arial, sans-serif;
      background-color: #f0f0f0;
      display: flex;
      flex-direction: column;
      align-items: center;
      justify-content: center;
      min-height: 100vh;
    }

    h1 {
      color: #333;
      text-align: center;
    }
    
    
    h2 {
      color: #333;
      text-align: center;
    }
    .container {
      background-color: #fff;
      padding: 20px;
      border-radius: 10px;
      box-shadow: 0 2px 5px rgba(0, 0, 0, 0.3);
    }

    textarea {
      width: 100%;
      height: 150px;
      border: 1px solid #ccc;
      border-radius: 5px;
      padding: 10px;
      resize: vertical;
    }

    button {
      background-color: #4CAF50;
      color: white;
      padding: 10px 20px;
      border: none;
      border-radius: 4px;
      cursor: pointer;
      transition: background-color 0.3s ease;
    }

    button:hover {
      background-color: #3e8e41;
    }

    #extractedResult {
      margin-top: 20px;
    }

    #extractedQueryTextarea {
      width: 100%;
      height: 100px;
    }

    #copyButton {
      background-color: #f2f2f2;
      color: #333;
      padding: 8px 12px;
      border: 1px solid #ccc;
      border-radius: 4px;
      cursor: pointer;
    }
  </style>
</head>
<body>
  <div class="container">
    <h1>URL Decoder/Encoder</h1>
    <h2>for TG MiniApp</h2>
    <center>
    <a href="tutor.mp4" target="_blank" rel="noopener noreferrer">
    <button>Watch the Video Tutorial here</button>
    </a>
    </center>
    <label>
      <input type="radio" name="mode" value="decode" checked> Decode
      <input type="radio" name="mode" value="encode"> Encode
    </label>
    <textarea id="inputUrl"></textarea>
    <button onclick="convertAndExtract()">Convert and Extract</button>
    <textarea id="output"></textarea>
  </div>

  <div id="extractedResult">
    <h2>Extracted Query:</h2>
    <textarea id="extractedQueryTextarea"></textarea>
    <button id="copyButton" onclick="copyText()">Copy</button>
  </div>

  <footer>
    <p>&copy; 2024 Made with ♥️ by <a href="javascript:alert('Apa sayang?♥️');"> KM Developer</p></a>
  </footer>

  <script>
    function convertAndExtract() {
      const inputUrl = document.getElementById('inputUrl').value;
      const output = document.getElementById('output');
      const mode = document.querySelector('input[name="mode"]:checked').value;

      try {
        if (mode === 'decode') {
          output.value = decodeURIComponent(inputUrl);

          // Extract query after decoding
          const regex = /tgWebAppData=(.*?)&tgWebAppVersion/;
          const match = output.value.match(regex);

          if (match) {
            document.getElementById('extractedQueryTextarea').value = match[1];
          } else {
            alert('Query tidak ditemukan.');
          }
        } else {
          output.value = encodeURIComponent(inputUrl);
        }
      } catch (error) {
        output.value = "Terjadi kesalahan: " + error.message;
      }
    }

    function copyText() {
      const textarea = document.getElementById('extractedQueryTextarea');
      textarea.select();
      document.execCommand('copy');
      alert('Teks telah disalin!');
    }
    
    // Fungsi untuk membuka video dalam popup (opsional, jika ingin kustomisasi lebih lanjut)
    function openVideoPopup(url) {
      window.open(url, '_blank', 'width=800,height=600');
    }

  </script>
</body>
</html>

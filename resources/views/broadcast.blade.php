<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Realtime Broadcast Viewer</title>
    @vite('resources/js/app.js')
</head>
<body>
    <h1>📢 Realtime Message Viewer</h1>

    <label for="msg">Ketik Pesan:</label>
    <input type="text" id="msg" placeholder="Tulis pesan..." style="margin-right: 10px;">
    <button onclick="sendMessage()">Kirim</button>

    <p>Pesan terakhir:</p>
    <div id="message-box" style="padding: 10px; border: 1px solid #ccc; margin-top: 10px;"></div>

    <script>
        const box = document.getElementById('message-box');

        window.Echo.channel('chat')
            .listen('MessageSent', (event) => {
                console.log('[📡 Broadcast received]', event.message);
                box.innerHTML = `<strong>${event.message}</strong>`;
                alert("📢 Pesan baru: " + event.message);
            });

        function sendMessage() {
            const msg = document.getElementById('msg').value;
            fetch(`/send-message?msg=${encodeURIComponent(msg)}`)
                .then(res => res.text())
                .then(data => console.log(data));
        }
    </script>
</body>
</html>

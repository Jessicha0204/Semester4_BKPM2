<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Reverb Chat</title>
    @vite(['resources/js/app.js'])  <!-- Jangan lupa memastikan app.js memuat Echo -->
</head>
<body>
    <h1>Laravel Reverb Chat Demo</h1>
    <p>Open browser console and then access <code>/send-message</code> to see real-time message.</p>

    <!-- Pasti pastikan URL untuk Reverb client benar -->
    <script src="https://cdn.reverb.com/actual-reverb-client.js"></script>

    <script>
        // Tunggu halaman dimuat sepenuhnya
        window.onload = () => {
            // Pastikan Echo dan Reverb siap
            if (window.Echo && window.Reverb) {
                // Menggunakan Echo dengan Reverb client
                window.Echo.channel('chat')
                    .listen('MessageSent', (e) => {
                        console.log("Pesan real-time:", e.message);
                    });
            } else {
                console.error("Echo atau Reverb belum siap!");
            }
        };
    </script>
</body>
</html>

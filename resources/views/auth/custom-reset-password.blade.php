<!DOCTYPE html>
<html>

    <head>
        <meta charset="UTF-8">
        <title>Reset Password</title>
        <style>
            body {
                font-family: 'Arial', sans-serif;
                background-color: #f4f4f4;
                padding: 20px;
                color: #333;
            }

            .email-container {
                background-color: #ffffff;
                max-width: 600px;
                margin: auto;
                padding: 30px;
                border-radius: 8px;
                box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
            }

            .header {
                text-align: center;
                padding-bottom: 20px;
            }

            .header h1 {
                color: #4e73df;
            }

            .button {
                display: inline-block;
                margin-top: 25px;
                padding: 12px 24px;
                background-color: #4e73df;
                color: white !important;
                text-decoration: none;
                border-radius: 5px;
                font-weight: bold;
            }

            .footer {
                margin-top: 30px;
                font-size: 14px;
                color: #777;
                text-align: center;
            }

            .highlight {
                font-weight: bold;
                color: #000;
            }
        </style>
    </head>

    <body>
        <div class="email-container">
            <div class="header">
                <h1>Reset Password</h1>
            </div>
            <p>Hai <span class="highlight">{{ $user->name ?? 'User' }}</span>,</p>
            <p>Kami menerima permintaan untuk mengatur ulang password akun kamu. Klik tombol di bawah untuk melanjutkan:
            </p>
            <div style="text-align: center;">
                <a href="{{ $url }}" class="button">Reset Password</a>
            </div>
            <p>Link ini akan kedaluwarsa dalam 60 menit.</p>
            <p>Jika kamu tidak merasa meminta reset password, kamu bisa abaikan email ini.</p>

            <div class="footer">
                &copy; {{ date('Y') }} Aplikasi Perpustakaan. All rights reserved.
            </div>
        </div>
    </body>

</html>

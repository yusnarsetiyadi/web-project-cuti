<?php
function sendEmail($recipient, $subject, $bodyHtml) {
    // URL endpoint API omailer
    $url = "https://yusnar.my.id/omailer/send";

    // Data form-data
    $data = [
        "smtp_host"     => "smtp.gmail.com",
        "smtp_port"     => "465",
        "auth_email"    => "obetelman@gmail.com",
        "auth_password" => "wdvo edur qpff nfiw",
        "sender_name"   => "Admin Sistem Pengajuan Cuti <obetelman@gmail.com>",
        "recipient"     => $recipient,
        "subject"       => $subject,
        "body_html"     => $bodyHtml
    ];

    // Inisialisasi cURL
    $ch = curl_init($url);

    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_POST, true);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $data);

    $response = curl_exec($ch);

    if (curl_errno($ch)) {
        $error = "cURL Error: " . curl_error($ch);
        curl_close($ch);
        return $error;
    }

    curl_close($ch);
    return $response;
}

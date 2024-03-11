<?php

echo "Masukkan API Telegram (format: https://api.telegram.org/botTOKEN): ";
$telegramAPI = trim(fgets(STDIN));

if (!preg_match('/^https:\/\/api\.telegram\.org\/bot\d+:[\w-]+$/i', $telegramAPI)) {
    echo "Format API Telegram tidak valid.\n";
    exit;
}

echo "Masukkan Chat ID: ";
$chatID = trim(fgets(STDIN));

echo "Masukkan Text ID: ";
$textID = trim(fgets(STDIN));

$websiteToOpen = "{$telegramAPI}/sendMessage?parse_mode=markdown&chat_id={$chatID}&text={$textID}";

echo "Masukkan jumlah : ";
$jumlahPembukaan = trim(fgets(STDIN));

echo "Membuka URL: $websiteToOpen\n";

if (!is_numeric($jumlahPembukaan) || $jumlahPembukaan <= 0) {
    echo "Masukkan jumlah harus angka positif.\n";
    exit;
}

for ($i = 1; $i <= $jumlahPembukaan; $i++) {
    $content = file_get_contents($websiteToOpen);

    echo "Spam ke-$i Sukses!";

    sleep(1);
}

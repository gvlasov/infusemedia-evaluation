<?php
$config = parse_ini_file('../.env');

$pdo = new PDO(
    "mysql:host=${config['MYSQL_HOSTNAME']};dbname=${config['MYSQL_DATABASE']};port=${config['MYSQL_PORT']};charset=utf8mb4;",
    $config['MYSQL_USER'],
    $config['MYSQL_PASSWORD']
);
$pdo->prepare(
    <<<EOD
INSERT INTO visits (ip_address, user_agent, view_date, page_url, views_count) VALUES (:ip_address, :user_agent, NOW(), :page_url, 1)
ON DUPLICATE KEY UPDATE views_count = views_count + 1, view_date = NOW()
EOD
)->execute(
    [
        'ip_address' => $_SERVER['REMOTE_ADDR'],
        'user_agent' => $_SERVER['HTTP_USER_AGENT'],
        'page_url' => $_SERVER['HTTP_REFERER'] ?? '',
    ]
);
header('Content-Type: image/png');
echo file_get_contents('task.png');
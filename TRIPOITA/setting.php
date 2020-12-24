<?php

// メール情報
// メールホスト名・gmailでは smtp.gmail.com
define('MAIL_HOST','smtp.gmail.com');

// メールユーザー名・アカウント名・メールアドレスを@込でフル記述
define('MAIL_USERNAME','tripoita.piyopiyo@gmail.com');

// メールパスワード・上で記述したメールアドレスに即したパスワード
define('MAIL_PASSWORD','miyakan0605');

// SMTPプロトコル(sslまたはtls)
define('MAIL_ENCRPT','ssl');

// 送信ポート(ssl:465, tls:587)
define('SMTP_PORT', 465);

// メールアドレス・ここではメールユーザー名と同じでOK
define('MAIL_FROM','tripoita.piyopiyo@gmail.com');

// 表示名
define('MAIL_FROM_NAME','大分産の鳥');

// メールタイトル
define('MAIL_SUBJECT','とりっぷ🐓大分担当の鳥です。');
?>


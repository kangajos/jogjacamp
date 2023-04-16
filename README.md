## CARA INSTALL DAN MENGGUNAKAN APLIKASI INI

1. Download code ini dan masuk ke root pada base projek ini
2. Copy File .env.example menjadi .env
3. setting file .env bagian database dan buat database sesuai yg di tulis di env bagian database.
4. setting file .env bagian SMTP MAILER, bisa menggunakan mailtrap versi gratis (silahkan login/register disini https://mailtrap.io/) 
5. buka terminal/CMD dan install package dengan perintah: composer install
6. lalu import table dan data faker dengan cara php artisan migrate --seed
7. lalu jalan projek ini dengan perintah php artisan serve
8. kunjungi link yg tertera pada terminal setalah jalankan projek ini
9. buka terminal kembali untuk menjalankan unit testing dengan perintah: vendor/bin/phpunit test/Feature/CategoryTest.php
10. dan lihat notifikasi pada inbox mailtrap.

## Aplikasi ini untuk test skill dari jogjacamp #byAjos#
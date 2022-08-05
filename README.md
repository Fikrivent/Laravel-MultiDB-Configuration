# multiDBTest


1. Folder "Database" berisikan dump sql untuk dua database yang digunakan dalam percobaan ini.
2. Folder "Laravel" berisikan projet laravel, dengan rincian lokasi code sebagai berikut : 
    - Controller => MultiDBTestController : berisikan simple crud terhadap dua database.
    - route.php => route untuk akses controller
    - .env => penambahan konfigurasi untuk database kedua(mysql2) [Line : 19 - 25]
    - config/database.php => penambahan konfigurasi untuk database kedua(mysql2) [Line : 66 - 80]

**Versi LARAVEL yang digunakan dalam projet ini adalah 9.X**
**Untuk LARAVEL versi dibawahnya hanya perlu penyesuaian pada bagian route.php**


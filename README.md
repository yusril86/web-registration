

## How to run Project
 Project ini merupakan teknikal test untuk posisi Junior Programmer.

 untuk menjalankan project ini, berikut step by step nya : 

 1. clone project :
    ```bash
        git clone https://github.com/yusril86/web-registration.git
     ```
2. Install composer : 
 ```bash
        composer install
 ```

3. set file .env untuk database dan email notifikasi atau kalian bisa copy settingan dari .env.example:
    ```bash
    DB_CONNECTION=mysql
    DB_HOST=127.0.0.1
    DB_PORT=3306
    DB_DATABASE=db_registration
    DB_USERNAME=root
    DB_PASSWORD=


    MAIL_DRIVER=smtp
    MAIL_HOST=smtp.gmail.com
    MAIL_PORT=587
    MAIL_USERNAME=emailkita@gmail.com
    MAIL_PASSWORD=passwordkita
    MAIL_ENCRYPTION=tls
    MAIL_FROM_ADDRESS="email kita"
    MAIL_FROM_NAME="${APP_NAME}"
    ```
ssesuaikan email dan password kalian untuk gmail. Pastikan untuk mengaktifkan pengaturan Google Keamanan pada akun Gmail Kita. Caranya, masuk ke halaman Kelola Akun Google Anda lalu klik  Keamanan  . Scroll ke bawah sampai Kita menemukan bagian Akses aplikasi yang kurang aman , set menjadi Nonaktif  seperti gambar di bawah ini.



4. install npm for auth :
```bash
        npm install
 ```

 and run 
 ```bash
        npm run build
 ```

 5. Silahkan inject data dari seeder :
 ```bash
        php artisan migrate:fresh --seed
 ```
6.  untuk akun user admin panel
    email : admin@admin.com
    password : admin
# PerPusQu
<p>PerpusQu adalah web Application untuk membantu mengelolah perpustakaan dengan skala kecil</p>

# How to use
- Clone this Repository
  ```
  git clone https://github.com/Farriq-mfq/Perpustakaan-Web.git
  ```
- cd perpusQu and run 
  ```
  composer install
  ```
  ```
  php artisan key:generate
  ```
  ```
  php artisan storage:link
  ```
- visit ``{base_url}/admin/login`` to login admin
  
  username
  ```
  admin@admin.com
  ```
  password
  ```
  admin
  ```
# Fitur
  ```
  1. Manage Anggota
  2. Manage Peminjaman
  3. Manage Rak
  4. Manage Buku
  5. Manage Transaksi Peminjaman
  ```
 # Tech Stack
 - Laravel (Liveware)
 - mysql

# Note
Jika ada kendala Gambar Tidak muncul, Hapus Folder Storage di ``public/storage`` kemudian jalankan ulang 
```
php artisan storage:link 
```

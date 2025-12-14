# Panduan Pengguna & Instalasi

## Bagian 1: Panduan Instalasi (Windows)

### Langkah 1: Instal XAMPP
1.  Unduh XAMPP untuk Windows dari [situs web resmi](https://www.apachefriends.org/index.html).
2.  Jalankan installer.
3.  Selama instalasi, pastikan **Apache** dan **PHP** dicentang. (Dapat menghapus centang MySQL/MariaDB karena kita akan menggunakan PostgreSQL).
4.  Selesaikan instalasi dan buka **XAMPP Control Panel**.

### Langkah 2: Instal PostgreSQL
1.  Unduh installer PostgreSQL Versi 15.14 untuk Windows dari [situs web resmi](https://www.postgresql.org/download/windows/).
2.  Jalankan installer.
3.  **Penting:** Selama instalasi, Anda akan diminta untuk mengatur kata sandi untuk superuser (`postgres`). **Ingat password ini!**
4.  Selesaikan instalasi. Jika Stack Builder terbuka setelahnya, Anda dapat menutupnya.

### Langkah 3: Aktifkan Ekstensi PHP untuk PostgreSQL
1.  Buka **XAMPP Control Panel**.
2.  Di sebelah **Apache**, klik tombol **Config** -> **PHP (php.ini)**.
3.  File teks akan terbuka. Tekan `Ctrl+F` untuk mencari.
4.  Cari baris berikut (mungkin ada tanda `;` di awalnya):
    ```ini
    ;extension=pdo_pgsql
    ;extension=pgsql
    ```
5.  **Hapus titik koma (;)** dari awal baris tersebut sehingga terlihat seperti ini:
    ```ini
    extension=pdo_pgsql
    extension=pgsql
    ```
6.  Simpan file (`Ctrl+S`) dan tutup.
7.  Di XAMPP Control Panel, klik **Stop** lalu **Start** di sebelah Apache untuk menerapkan perubahan.

### Langkah 4: Siapkan File Proyek (Git Clone)
Anda memiliki dua pilihan untuk mendapatkan file proyek:

**Opsi A: Menggunakan Git**
1.  Pastikan Git sudah terinstal. Jika belum, unduh dari [git-scm.com](https://git-scm.com/).
2.  Buka folder instalasi XAMPP Anda (biasanya `C:\xampp`).
3.  Masuk ke folder `htdocs` (`C:\xampp\htdocs`).
4.  Klik kanan di ruang kosong dan pilih **Git Bash Here** (atau buka terminal/CMD di folder ini).
5.  Ketik perintah berikut dan tekan Enter:
    ```bash
    git clone https://github.com/MuhammadAryatamaM/Web_Profile_PBL.git
    ```

**Opsi B: Unduh ZIP**
1.  Unduh file ZIP dari halaman GitHub repository.
2.  Ekstrak file ZIP tersebut.
3.  Pindahkan folder hasil ekstrak ke dalam `C:\xampp\htdocs`.
4.  Pastikan nama foldernya adalah `Web_Profile_PBL`.

### Langkah 5: Impor Database
*Catatan: Anda memerlukan file database bernama `db_pbl.sql`) yang disertakan di Git.*

1.  Buka **pgAdmin 4** (terinstal bersama PostgreSQL) dari Start Menu.
2.  Buka **Servers** -> **PostgreSQL 15.14** -> **Databases**.
3.  Klik kanan **Databases** -> **Create** -> **Database...**
4.  Beri nama (misalnya: `db_profile`) dan klik **Save**.
5.  Klik kanan pada database baru Anda (`db_profile`) -> **Restore...**
6.  Di kolom **Filename**, pilih file `.sql` yang disertakan dalam proyek.
7.  Klik **Restore**.

### Langkah 6: Konfigurasi Koneksi
1.  Buka file `config/koneksi.php` menggunakan text editor (Notepad, VS Code, dll).
2.  Perbarui pengaturan agar sesuai dengan kredensial PostgreSQL Anda.

**Contoh Kode untuk PostgreSQL:**
```php
<?php
$host = 'localhost';
$port = '5432';
$dbname = 'db_profile'; // Nama database dari Langkah 5
$user = 'postgres';     // User default PostgreSQL
$password = 'password_postgres_anda'; // Kata sandi yang Anda buat di Langkah 2

$dsn = "pgsql:host=$host;port=$port;dbname=$dbname;user=$user;password=$password";

try {
  $pdo = new PDO($dsn);
  $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
  echo "Koneksi database gagal: " . $e->getMessage();
  exit();
}
$koneksi = $pdo;
?>
```

### Langkah 7: Akses Website
1.  Buka web browser Anda.
2.  Kunjungi: `http://localhost/Web_Profile_PBL`

---

## Bagian 2: Panduan Pengguna Website

### 1. Website Publik (Tampilan Pengunjung)
Website publik dirancang untuk memberikan informasi tentang profil laboratorium/perusahaan.

*   **Halaman Beranda (Home):**
    *   **Hero Section:** Pengenalan singkat.
    *   **Stats:** Menampilkan jumlah dinamis anggota aktif, artikel, prototipe, dll.
    *   **Berita:** Menampilkan 3 artikel berita terbaru.
    *   **Galeri:** Menampilkan pratinjau aktivitas terkini.
    *   **Tim:** Menampilkan Kepala Lab dan anggota aktif.
*   **Menu Navigasi:** Gunakan navigasi atas untuk mengakses halaman seperti **Berita**, **Galeri**, **Produk**, dan **Tim**.
*   **Halaman Berita:** 
    *   Melihat semua artikel berita.
    *   Gunakan tombol "Terbaru" dan "Terlama" untuk mengurutkan berita.
    *   Gunakan nomor halaman (pagination) di atas daftar untuk melihat berita lama (9 item per halaman).
*   **Halaman Galeri:**
    *   Melihat semua foto yang diunggah.
    *   Gunakan pagination untuk menelusuri koleksi (12 item per halaman).

### 2. Panel Admin (Manajemen)
Untuk mengelola konten, Anda harus login ke area admin.

#### A. Login
1.  Buka `http://localhost/Web_Profile_PBL/admin`
2.  Masukkan kredensial default:
    *   **Username:** `kepala`
    *   **Password:** `password123`
3.  Klik **Login**.

#### B. Dashboard
Setelah login, Anda akan melihat ringkasan sistem.

#### C. Mengelola Berita (News)
*   **Lihat:** Klik "News" di sidebar untuk melihat daftar artikel.
*   **Tambah:** Klik tombol "Create New News".
    *   Masukkan Judul.
    *   Upload gambar.
    *   Tulis deskripsinya.
    *   Klik **Submit**.
*   **Edit/Hapus:** Gunakan tombol yang ada di kartu berita untuk memperbarui atau menghapus artikel.

#### D. Mengelola Produk
*   **Lihat:** Klik "Products" di sidebar untuk melihat daftar produk.
*   **Tambah:** Klik tombol "Create New Product".
    *   Masukkan Judul.
    *   Upload gambar.
    *   Tulis deskripsi dan kategori (maksimal 4).
    *   Klik **Submit**.
*   **Edit/Hapus:** Gunakan tombol yang ada di kartu produk untuk memperbarui atau menghapus artikel.

#### E. Mengelola Galeri
*   **Lihat:** Klik "Gallery" di sidebar. Foto ditampilkan dalam grid (16 per halaman).
*   **Tambah:** Klik "Upload Photos".
    *   Beri judul foto.
    *   Pilih file gambar.
    *   Klik **Save**.
*   **Edit/Hapus:** Gunakan tombol yang ada di kartu produk untuk memperbarui atau menghapus foto.

#### F. Mengelola Tim
*   **Lihat:** Klik "Teams".
*   **Tambah:** Tambah anggota baru, tentukan posisi mereka (misalnya: "Kepala Lab" atau "Anggota") dan data lainnya.
*   **Catatan:** Halaman Beranda secara otomatis menghitung anggota. Pastikan Anda menandai posisi "Kepala" dengan benar jika ingin ditampilkan secara terpisah.

---

## Troubleshooting

*   **"Call to undefined function pg_connect()" atau "could not find driver"**:
    *   Ini berarti ekstensi PostgreSQL belum diaktifkan di PHP.
    *   Ulangi **Langkah 3** dan pastikan Anda menghapus tanda `;` dari `extension=pdo_pgsql` dan `extension=pgsql` di file `php.ini`.
    *   Restart Apache di XAMPP.
*   **"Koneksi database gagal"**:
    *   Periksa `config/koneksi.php`. Pastikan `$password` cocok dengan yang Anda buat saat instalasi PostgreSQL.
    *   Pastikan `$dbname` cocok persis dengan yang Anda buat di pgAdmin.
*   **Gambar tidak dapat diunggah**:
    *   Pastikan folder `assets/uploads/` ada.
    *   Di Windows, izin biasanya otomatis, tetapi pastikan folder tersebut tidak dalam mode "Read Only".
*   **"Page Not Found" (Halaman Tidak Ditemukan)**:
    *   Pastikan Anda mengakses URL yang benar (huruf besar/kecil berpengaruh): `Web_Profile_PBL` harus sesuai dengan nama folder di htdocs.

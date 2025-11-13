```text
Web_Profile_PBL/
│
├── 📁 assets/                  <-- File statis (CSS, JS, Gambar)
│   ├── 📁 css/                 <-- style.css, bootstrap.min.css
│   ├── 📁 js/                  <-- script.js, bootstrap.bundle.min.js
│   ├── 📁 img/                 <-- Aset template (logo, foto profil, background)
│   └── 📁 uploads/             <-- Tempat menyimpan gambar (berita, produk, tim)
│
├── 📁 config/
│   └── 📄 koneksi.php          <-- Koneksi Database
│
├── 📁 helper/                  <-- Fungsi bantuan
│   ├── 📄 auth.php             <-- Cek login/session
│   ├── 📄 antiinjection.php    <-- Keamanan
│   └── 📄 message_send.php     <-- Mengirim pesan dari Contact Us
│
├── 📁 layouts/                 <-- Potongan tampilan Public
│   ├── 📄 header.php           <-- Navbar & Head
│   └── 📄 footer.php           <-- Footer & Script JS
│
├── 📁 pages/                   <-- Halaman-halaman Public
│   ├── 📄 home.php
│   ├── 📄 teams.php
│   ├── 📄 products.php
│   ├── 📄 news.php
│   └── 📄 gallery.php
│
├── 📄 index.php                <-- ROUTER PUBLIC (Pintu Masuk Pengunjung)
│
└── 📁 admin/
    ├── 📄 login.php            <-- Form Login Admin
    ├── 📄 logout.php
    ├── 📄 index.php            <-- ROUTER ADMIN (Pintu Masuk Admin)
    │
    ├── 📁 template/            <-- Potongan tampilan Admin
    │   ├── 📄 header.php
    │   ├── 📄 sidebar.php
    │   └── 📄 footer.php
    │
    └── 📁 module/              <-- Fitur CRUD (MVC Sederhana)
        │
        ├── 📁 settings/
        │   ├── 📄 index.php    <-- (VIEW) Tampilan Settings
        │   └── 📄 aksi.php     <-- (CONTROLLER) Proses Update
        │
        ├── 📁 news/
        │   ├── 📄 index.php    <-- (VIEW) Tampilan News
        │   ├── 📄 create.php   <-- (VIEW) Form Tambah
        │   ├── 📄 edit.php     <-- (VIEW) Form Edit
        │   └── 📄 aksi.php     <-- (CONTROLLER) Proses Insert/Update/Delete
        │
        ├── 📁 products/
        │   ├── 📄 index.php    <-- (VIEW) Tampilan Products
        │   ├── 📄 create.php   <-- (VIEW) Form Tambah
        │   ├── 📄 edit.php     <-- (VIEW) Form Edit
        │   └── 📄 aksi.php     <-- (CONTROLLER) Proses Insert/Update/Delete
        │
        ├── 📁 teams/
        │   ├── 📄 index.php    <-- (VIEW) Tampilan Teams
        │   ├── 📄 create.php   <-- (VIEW) Form Tambah
        │   ├── 📄 edit.php     <-- (VIEW) Form Edit
        │   └── 📄 aksi.php     <-- (CONTROLLER) Proses Insert/Update/Delete
        │
        └── 📁 message/
            └── 📄 index.php    <-- (VIEW) Tampilan Message
```

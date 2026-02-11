**SISPEKA**
Sistem Informasi Pengawasan Evaluasi Karakter dan Akademik

SISPEKA (Sistem Informasi Pengawasan Evaluasi Karakter dan Akademik) merupakan sistem informasi berbasis web yang dirancang untuk membantu satuan pendidikan dalam mengelola, memantau, dan mengevaluasi data akademik serta karakter peserta didik secara terstruktur, terintegrasi, dan terdokumentasi dengan baik.

Sistem ini dikembangkan sebagai implementasi dari konsep Rekayasa Perangkat Lunak (RPL) dengan pendekatan analisis dan perancangan berorientasi objek serta pemodelan menggunakan Unified Modeling Language (UML). Pengembangan SISPEKA bertujuan untuk menggantikan proses manual yang kurang efisien dengan sistem digital yang lebih akurat, transparan, dan mudah dikembangkan.

**Latar Belakang**

Dalam proses pendidikan, pengelolaan data akademik dan evaluasi karakter siswa merupakan aspek penting yang memerlukan ketelitian dan konsistensi. Pada banyak institusi pendidikan, proses pencatatan nilai, absensi, dan perilaku siswa masih dilakukan secara manual atau menggunakan sistem yang terpisah, sehingga berpotensi menimbulkan:

*Ketidakkonsistenan data*
*Kesalahan pencatatan*
*Kesulitan dalam monitoring dan evaluasi*
*Keterbatasan akses terhadap informasi yang terintegrasi*

Berdasarkan permasalahan tersebut, SISPEKA dirancang sebagai solusi sistem informasi terintegrasi yang mampu mengelola data akademik dan karakter siswa secara sistematis serta mendukung proses evaluasi pendidikan secara berkelanjutan.

**Tujuan Pengembangan Sistem**

Tujuan pengembangan SISPEKA antara lain:

-Menyediakan sistem informasi terintegrasi untuk pengelolaan data akademik dan karakter siswa

-Membantu guru dalam melakukan pencatatan dan evaluasi nilai, absensi, serta perilaku siswa

-Meningkatkan akurasi dan konsistensi data akademik

-Mempermudah proses monitoring dan pelaporan data siswa

-Menjadi dasar pengembangan sistem pendidikan berbasis teknologi informasi di masa depan

**Ruang Lingkup Sistem**

SISPEKA memiliki ruang lingkup sebagai berikut:

-Pengelolaan data siswa

-Pengelolaan data guru

-Pengelolaan mata pelajaran

-Pengelolaan nilai akademik

-Pengelolaan absensi siswa

-Pengelolaan evaluasi karakter/perilaku siswa

-Manajemen pengguna (admin dan guru)

Catatan:
Sistem SISPEKA tidak menyediakan fitur notifikasi kepada wali murid. Fokus sistem adalah pada pengelolaan dan evaluasi internal oleh pihak sekolah.

**Karakteristik Pengguna Sistem**

Sistem SISPEKA dirancang untuk digunakan oleh:

Administrator
Bertanggung jawab atas pengelolaan data master dan pengaturan sistem

Guru
Bertugas menginput dan mengelola data nilai, absensi, dan evaluasi karakter siswa

Wali Murid
Hanya memiliki akses untuk melihat dan memantau perkembangan siswa.

**Arsitektur Sistem**

SISPEKA menerapkan arsitektur **Client–Server dengan pendekatan Three-Tier Architecture**, yang terdiri dari:

-Presentation Layer (Client)
Browser web yang digunakan oleh pengguna untuk mengakses sistem

-Application Layer (Web/Application Server)
Menangani logika bisnis dan proses aplikasi menggunakan framework Laravel

-Data Layer (Database Server)
Menyimpan seluruh data sistem menggunakan database MySQL

Arsitektur ini memungkinkan sistem untuk dikembangkan, dipelihara, dan diskalakan dengan lebih mudah.

**Teknologi yang Digunakan**

Bahasa Pemrograman: PHP

Framework Backend: Laravel

Database: MySQL

Frontend:

Blade Template Engine

HTML5

CSS3

JavaScript

**Tools Pendukung:**

Composer

Node.js & NPM

Git & GitHub

**Struktur Direktori Proyek**

Struktur direktori proyek mengikuti standar framework Laravel, antara lain:

    app/            -> Logika aplikasi (Controller, Model, Middleware)
    bootstrap/      -> Proses bootstrapping framework
    config/         -> File konfigurasi sistem
    database/       -> Migration dan seeder database
    public/         -> Aset publik (CSS, JS, gambar)
    resources/      -> View (Blade), asset frontend
    routes/         -> Definisi routing aplikasi
    storage/        -> Log, cache, dan file sistem
    tests/          -> Pengujian aplikasi

**Dokumentasi Perancangan Sistem**

Dokumentasi perancangan SISPEKA meliputi:

UML Diagram (Use Case Diagram, Class Diagram, Sequence Diagram, Component Diagram)

Diagram Arsitektur Sistem

ER Diagram dan Database Schema

User Flow dan Wireframe Antarmuka

Spesifikasi API

Dokumentasi lengkap sistem dijelaskan secara rinci pada buku:
“Perancangan dan Implementasi Sistem Informasi SISPEKA (Sistem Informasi Pengawasan Evaluasi Karakter dan Akademik)”

**Link Buku:**    

    https://ebook.webiot.id/ebooks/sispeka-sistem-informasi-pengawasan-serta-evaluasi-karakter-dan-akademik-siswa-sma

**Repository GitHub**

Kode sumber sistem SISPEKA tersedia pada repository GitHub berikut:

    https://github.com/ikbalpadila/RPL-SISPEKA

Repository ini digunakan sebagai media:

Penyimpanan kode sumber

Dokumentasi pengembangan sistem

Evaluasi dan pengembangan lanjutan

**Pengembangan Selanjutnya**

Beberapa pengembangan yang dapat dilakukan di masa depan:

Penambahan dashboard analitik

Integrasi laporan dalam format PDF/Excel

Peningkatan keamanan sistem

Optimalisasi antarmuka pengguna

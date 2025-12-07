# Aplikasi Layanan Mahasiswa

Aplikasi berbasis **PHP & MySQL (XAMPP)** untuk mempermudah mahasiswa mengajukan layanan administrasi dan memudahkan admin dalam mengelola pengajuan.  
# nama anggota kelompok 2
  * zabrina zalwa zalikha ( 7011230110 )
  * dwi wahyuni ( 701230102)
  * ferdinand ali (701230207)

## Fitur

### Mahasiswa
- **Login Mahasiswa**
- **Ajukan Layanan**  
  - pembuatan makalah  
  - pembuatan ppt  
  - pembuatan artikel
  - pembuatan poster
- **Form Nomor WhatsApp** untuk menerima informasi status pengajuan.
- **Dashboard Status** pengajuan layanan dengan status: Menunggu, Diproses, Selesai.
- **Logout** dari sistem.

### Admin
- **Login Admin**
- **Dashboard Admin** untuk melihat semua pengajuan mahasiswa.
- **Hapus Pengajuan** mahasiswa jika diperlukan.
- **Update Status Layanan** (Menunggu, Diproses, Selesai).
- **Kelola Data Mahasiswa dan Layanan**.

---

## Struktur Folder


---

## Database

### Tabel `users`
| Field      | Tipe        | Keterangan          |
|-----------|------------|-------------------|
| id        | INT PK AI  | ID user            |
| nama      | VARCHAR    | Nama user          |
| username  | VARCHAR    | Username login     |
| password  | VARCHAR    | Password (hash)    |
| role      | VARCHAR    | 'mahasiswa' atau 'admin' |

### Tabel `layanan`
| Field        | Tipe        | Keterangan          |
|-------------|------------|-------------------|
| id          | INT PK AI  | ID layanan         |
| id_mahasiswa| INT        | ID mahasiswa       |
| layanan     | VARCHAR    | Jenis layanan      |
| wa          | VARCHAR    | Nomor WhatsApp     |
| status      | VARCHAR    | Status layanan     |

> Catatan: Pastikan `id_mahasiswa` di `layanan` sesuai dengan `id` mahasiswa di tabel `users`.

---

## Instalasi

1. Install **XAMPP** (PHP & MySQL) di komputer.
2. Buat database baru misal `db_layanan`.
3. Import tabel `users` dan `layanan`.
4. Sesuaikan konfigurasi **koneksi.php**:

```php
<?php
$conn = mysqli_connect("localhost", "root", "", "db_layanan");
if (!$conn) {
    die("Koneksi gagal: " . mysqli_connect_error());
}
?>



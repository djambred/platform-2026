# Product Requirement Document (PRD)
**Dokumen Kebutuhan Produk**

---

## 1. Ringkasan Produk

| Atribut | Detail |
|---------|--------|
| **Nama Produk** | Rumpun Ilmu |
| **Platform** | Web (responsive: desktop, tablet, mobile) |
| **Target Pengguna** | Guru, siswa, staf akademik, orang tua |
| **Lingkup Sistem** | TK, SD, SMP, SMA/sederajat |

---

## 2. Tujuan Produk (Product Goals)

1. Menyediakan antarmuka terpisah berdasarkan peran (*role-based dashboard*).
2. Mengotomatisasi alur pengelolaan akademik mulai dari input nilai hingga cetak rapor.
3. Memberikan notifikasi real-time untuk pengumuman, nilai baru, atau ketidakhadiran.

---

## 3. Pengguna & Kebutuhan Utama (User Personas)

| Peran | Kebutuhan Inti |
|-------|----------------|
| **Guru** | Input nilai per mata pelajaran; rekap presensi harian; unggah materi/bahan ajar; komunikasi dengan orang tua siswa tertentu |
| **Siswa** | Lihat jadwal pelajaran; lihat nilai tugas & ujian; akses materi belajar; lihat histori kehadiran |
| **Staf Akademik** | Kelola data master (kelas, mata pelajaran, tahun ajaran); generate laporan; atur periode penilaian (PTS, PAS) |
| **Orang Tua** | Pantau nilai anak secara real-time; terima notifikasi ketidakhadiran; lihat jadwal dan pengumuman; kirim pesan ke guru/wali kelas |

---

## 4. Fitur Fungsional (Functional Requirements)

| Modul | Fitur | Prioritas |
|-------|-------|-----------|
| **Manajemen Pengguna** | Registrasi/onboard sekolah; login dengan NIS/NIK (siswa/orang tua) dan email (guru/staf); manajemen role & akses | **P0** |
| **Manajemen Akademik** | CRUD kelas, mata pelajaran, tahun ajaran; pengaturan relasi guru–mata pelajaran–kelas | **P0** |
| **Penjadwalan & Presensi** | Kalender jadwal per kelas; presensi online (guru isi kehadiran siswa); rekap otomatis izin/sakit | **P0** |
| **Penilaian & Rapor** | Input nilai harian, PTS, PAS; bobot nilai dapat dikonfigurasi; generate rapor digital (PDF) sesuai jenjang | **P0** |
| **Komunikasi** | Papan pengumuman sekolah; pesan internal (guru–orang tua); notifikasi via email/WA Gateway (opsional) | **P1** |
| **Laporan & Analitik** | Laporan kehadiran per siswa/kelas; laporan peringkat kelas; export ke Excel/CSV | **P1** |
| **Materi & Tugas** | Unggah file materi (PDF, video); buat tugas dengan tenggat waktu; siswa upload jawaban | **P2** |

> **Keterangan Prioritas:** P0 = Wajib (MVP) · P1 = Penting · P2 = Iterasi berikutnya

---

## 5. Persyaratan Non-Fungsional (NFR)

| Kategori | Spesifikasi |
|----------|-------------|
| **Kinerja** | Waktu muat halaman < 3 detik (koneksi 3G); mendukung minimal 500 pengguna simultan per sekolah |
| **Keamanan** | Otentikasi base64+hash, rekomendasi 2FA untuk staf; log akses dan perubahan data; enkripsi data sensitif (nilai, NIS, alamat) |
| **Ketersediaan** | Uptime 99,5% pada jam operasional sekolah (07.00–17.00) |
| **Usabilitas** | Desain responsif (mobile first); uji aksesibilitas dasar (font readable, kontras warna); tooltips dan panduan singkat per peran |
| **Kompatibilitas** | Chrome, Firefox, Edge (versi 2 tahun terakhir); resolusi minimal 1024×768 |

---

## 6. Alur Pengguna Kritis (Critical User Flow)

### Alur 1 – Guru Input Nilai

```
Login
  → Dashboard Guru
    → Pilih Kelas
      → Pilih Mata Pelajaran
        → Pilih Siswa
          → Input Nilai (angka / deskripsi)
            → Simpan
              → [Opsional] Notifikasi terkirim ke orang tua
```

### Alur 2 – Orang Tua Lihat Rapor

```
Login
  → Dashboard Orang Tua
    → Pilih Anak (jika lebih dari 1)
      → Menu "Rapor"
        → Pilih Semester
          → Lihat Nilai & Deskripsi Kemajuan
            → Download PDF
```

---

## 7. Batasan & Dependensi

| Jenis | Detail |
|-------|--------|
| **Batasan teknis** | Tidak mendukung real-time chat (hanya pesan internal asynchronous) |
| **Dependensi eksternal** | Integrasi WA Gateway membutuhkan biaya dan API pihak ketiga (opsional) |
| **Regulasi** | Data siswa wajib disimpan di server lokal Indonesia |

---

## 8. Kriteria Penerimaan (Acceptance Criteria)

| Fitur | Acceptance Criteria |
|-------|---------------------|
| **Login Guru** | Email + password valid → masuk ke dashboard guru. Salah password 3× → akun terkunci selama 15 menit. |
| **Input Nilai** | Guru dapat menyimpan nilai dengan range 0–100. Data nilai tersimpan dan muncul di dashboard siswa/orang tua dalam waktu < 1 menit. |
| **Generate Rapor** | Rapor PDF ter-generate sesuai format jenjang: TK tanpa angka, SD/SMP/SMA dengan deskripsi dan angka. |
| **Presensi** | Guru dapat mengisi kehadiran seluruh siswa dalam satu kelas dalam satu sesi dan rekap tersimpan otomatis. |
| **Notifikasi Orang Tua** | Notifikasi ketidakhadiran terkirim ke orang tua dalam waktu < 5 menit setelah presensi dikunci. |
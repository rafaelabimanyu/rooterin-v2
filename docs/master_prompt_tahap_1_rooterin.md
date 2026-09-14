# 🚀 MASTER PROMPT TAHAP 1: AUDIT, INSPEKSI, BATCH KONVERSI WEBP & OPTIMASI SEO ROOTERIN

> **Project:** RooterIN (rooterin.com)  
> **Framework / Stack:** Laravel / Blade / Tailwind CSS / Vanilla JS (Laragon Environment)  
> **Target Path:** `C:\laragon\www\rooterin-v2`  
> **Objektif:** Audit aset media, standarisasi slug SEO gambar tanpa spasi, konversi massal lossless-compressed WebP, penataan Geo-Targeting (Jabodetabek, Semarang, Lampung), dan perakitan master data dokumentasi.

---

## 📋 DAFTAR ISI
1. [Konteks & Standar Aturan Penamaan (Image SEO Guideline)](#1-standar-aturan-penamaan-image-seo)
2. [Tabel Pemetaan Rename & Konversi Gambar (Dokumentasi Pekerjaan)](#2-tabel-pemetaan-dokumentasi-pekerjaan)
3. [Tabel Pemetaan Rename & Konversi Gambar (Wilayah Jakarta)](#3-tabel-pemetaan-wilayah-jakarta)
4. [Skrip Otomasi Batch Konversi (Node.js + Sharp / PowerShell)](#4-skrip-otomasi-batch-konversi)
5. [Struktur Master Data JSON (Siap Dipakai di Blade/Frontend)](#5-struktur-master-data-json)
6. [Checklist Audit & Quality Control (Core Web Vitals & Schema)](#6-checklist-audit--qc)

---

## 1. STANDAR ATURAN PENAMAAN (IMAGE SEO GUIDELINE)

Setiap file aset gambar **WAJIB** mengikuti standarisasi berikut sebelum dimuat ke sistem:
* **Ekstensi Wajib:** `.webp` (target kompresi: 75–82% quality, ukuran file target: **< 150 KB** dari sebelumnya 2–4 MB).
* **Format Penamaan:** Huruf kecil semua (*kebab-case*), pisahkan kata hanya dengan tanda hubung `-`, **dilarang menggunakan spasi atau karakter spesial**.
* **Formula Slug Nama File:**
  $$\text{rooterin-jasa-saluran-mampet-}[\text{kategori-masalah}]-[\text{lokasi/brand/tipe-objek}]\text{.webp}$$
* **Atribut Aksesibilitas & SEO:**
  * Setiap tag `<img>` wajib menyertakan `alt="..."` yang kaya kata kunci alami dan deskriptif.
  * Tambahkan `loading="lazy"` dan `decoding="async"` serta atribut eksplisit `width` & `height` untuk mencegah *Cumulative Layout Shift* (CLS).

---

## 2. TABEL PEMETAAN DOKUMENTASI PEKERJAAN
Direktori Sumber: `C:\laragon\www\rooterin-v2\public\assets\dokumentasipekerjaan\`  
Direktori Output: `C:\laragon\www\rooterin-v2\public\assets\dokumentasipekerjaan\optimized\`

| No | Nama File Asli (.png) | Ukuran Lama | Nama Baru (.webp) | Alt Text SEO Rekomendasi |
|:---|:---|:---|:---|:---|
| 1 | `after-gutter-resto-mampet.png` | 1.81 MB | `rooterin-saluran-mampet-after-gutter-resto-jabodetabek.webp` | Hasil pembersihan pipa gutter saluran mampet restoran RooterIN |
| 2 | `after-gutter-resto.png` | 1.74 MB | `rooterin-saluran-mampet-talang-gutter-resto-bersih.webp` | Talang air dan saluran gutter restoran lancar setelah penanganan |
| 3 | `almaz-freidchicken-resto-mampet.png` | 2.06 MB | `rooterin-jasa-saluran-mampet-restoran-almaz-fried-chicken.webp` | Pelancaran saluran pipa pembuangan lemak resto Almaz Fried Chicken |
| 4 | `ceo-rumahwarga.png` | 3.49 MB | `rooterin-saluran-mampet-rumah-tinggal-jabodetabek.webp` | Teknisi RooterIN melancarkan pipa mampet rumah tinggal warga |
| 5 | `floor-drain-kamarmandi.png` | 3.14 MB | `rooterin-saluran-mampet-floor-drain-kamar-mandi-01.webp` | Pembersihan sumbatan rambut dan kotoran floor drain kamar mandi |
| 6 | `floordrain-kamar-mandi.png` | 1.94 MB | `rooterin-saluran-mampet-floor-drain-kamar-mandi-02.webp` | Jasa pelancar floor drain kamar mandi tersumbat tanpa bongkar |
| 7 | `floordrain-rumah-warga-mampet.png` | 2.15 MB | `rooterin-saluran-mampet-floor-drain-rumah-warga.webp` | Penanganan genangan air saluran kamar mandi rumah warga bergaransi |
| 8 | `grease-trap-resto-mampet.png` | 2.59 MB | `rooterin-saluran-mampet-grease-trap-lemak-restoran.webp` | Pembersihan sumbatan lemak beku grease trap dapur restoran |
| 9 | `gutter-resto-mampet.png` | 3.54 MB | `rooterin-saluran-mampet-drainase-gutter-dapur-resto.webp` | Penanganan pipa gutter pembuangan dapur resto tersumbat |
| 10 | `inspeksi-kamera-kantor-pertamina-sunter.png` | 1.69 MB | `rooterin-inspeksi-kamera-saluran-mampet-pertamina-sunter.webp` | Deteksi pipa buntu menggunakan kamera CCTV di kantor Pertamina Sunter |
| 11 | `inspeksi-kamera-salurankloset-perkantoran-dan-gedung.png` | 2.18 MB | `rooterin-inspeksi-kamera-saluran-kloset-gedung-kantor.webp` | Inspeksi kamera endoskop saluran pipa kloset toilet gedung komersial |
| 12 | `kai-semarang.png` | 3.10 MB | `rooterin-saluran-mampet-kantor-kai-semarang.webp` | Pelancaran instalasi saluran air mampet di stasiun / kantor KAI Semarang |
| 13 | `kai-tugu.png` | 3.76 MB | `rooterin-saluran-mampet-stasiun-kai-tugu.webp` | Layanan maintenance pipa drainase Stasiun KAI Tugu |
| 14 | `kantor-pertamina-sunter-kloset.png` | 2.74 MB | `rooterin-saluran-mampet-kloset-kantor-pertamina-sunter.webp` | Perbaikan kloset toilet mampet kantor Pertamina Sunter Jakarta Utara |
| 15 | `kloset-mampet-rumahwarga.png` | 4.00 MB | `rooterin-saluran-mampet-kloset-toilet-rumah-warga.webp` | Pelancaran WC kloset tersumbat tanpa sedot tinja dan tanpa bongkar |
| 16 | `perkantoran-floor-drain-kamar-mandi.png` | 2.65 MB | `rooterin-saluran-mampet-floor-drain-toilet-perkantoran.webp` | Penanganan floor drain toilet gedung perkantoran mampet |
| 17 | `resto-haka-dimsum-tebet.png` | 2.01 MB | `rooterin-saluran-mampet-resto-haka-dimsum-tebet-jaksel.webp` | Pelancaran pipa cuci piring resto Haka Dimsum Tebet Jakarta Selatan |
| 18 | `resto-mampet-sushi-tei-banjarmasin-kalimantan-selatan.png` | 2.82 MB | `rooterin-saluran-mampet-resto-sushi-tei-banjarmasin-01.webp` | Penanganan darurat saluran pipa mampet Resto Sushi Tei Banjarmasin |
| 19 | `resto-shoiciro.png` | 3.71 MB | `rooterin-saluran-mampet-restoran-shoichiro-01.webp` | Pekerjaan pembersihan pipa pembuangan lemak restoran Shoichiro |
| 20 | `resto-sushi-tei-banjarmasin-kalimantan-selatan.png` | 3.08 MB | `rooterin-saluran-mampet-resto-sushi-tei-banjarmasin-02.webp` | Pembersihan pipa pembuangan dapur resto Sushi Tei Banjarmasin |
| 21 | `resto.png` | 3.13 MB | `rooterin-saluran-mampet-kitchen-sink-area-restoran.webp` | Servis saluran kitchen sink dan drainase komersial restoran |
| 22 | `rumah-floordrain-kamarmandi.png` | 2.21 MB | `rooterin-saluran-mampet-kamar-mandi-rumah-tinggal.webp` | Pelancaran saluran air buangan kamar mandi residensial |
| 23 | `rumahan-wastafel.png` | 2.82 MB | `rooterin-saluran-mampet-wastafel-cuci-piring-rumah.webp` | Pembersihan sumbatan lemak wastafel kitchen sink rumah warga |
| 24 | `shoichiro-resto-mampet.png` | 3.40 MB | `rooterin-saluran-mampet-restoran-shoichiro-02.webp` | Pelancaran pipa saluran cuci piring resto Shoichiro |
| 25 | `wastafel-mampet-rumahwarga.png` | 2.45 MB | `rooterin-saluran-mampet-wastafel-rumah-warga-jabodetabek.webp` | Teknisi melancarkan saluran wastafel dapur buntu rumah warga |
| 26 | `wastafelmampet.png` | 2.91 MB | `rooterin-saluran-mampet-wastafel-dapur-tersumbat.webp` | Solusi pipa wastafel mampet bergaransi tanpa merusak pipa PVC |

---

## 3. TABEL PEMETAAN WILAYAH JAKARTA
Direktori Sumber: `C:\laragon\www\rooterin-v2\public\assets\wilayah\jakarta\`  
Direktori Output: `C:\laragon\www\rooterin-v2\public\assets\wilayah\jakarta\optimized\`

| No | File Asli (.jpg) | Nama Baru Target (.webp) | Target Halaman Area / Alt Text SEO |
|:---|:---|:---|:---|
| 1 | `jakarta-barat (1).jpg` | `rooterin-jasa-saluran-mampet-jakarta-barat-kebon-jeruk.webp` | Jasa pelancar saluran pipa mampet Jakarta Barat Kebon Jeruk |
| 2 | `jakarta-barat (2).jpg` | `rooterin-jasa-saluran-mampet-jakarta-barat-kembangan.webp` | Teknisi pipa mampet panggilan terdekat Jakarta Barat Kembangan |
| 3 | `jakarta-barat (3).jpg` | `rooterin-jasa-saluran-mampet-jakarta-barat-grogol.webp` | Solusi saluran mampet tanpa bongkar Jakarta Barat Grogol Petamburan |
| 4 | `jakarta-pusat (1).jpg` | `rooterin-jasa-saluran-mampet-jakarta-pusat-kemayoran.webp` | Jasa pipa mampet profesional Jakarta Pusat Kemayoran |
| 5 | `jakarta-pusat (2).jpg` | `rooterin-jasa-saluran-mampet-jakarta-pusat-menteng.webp` | Layanan pelancar wastafel toilet mampet Jakarta Pusat Menteng |
| 6 | `jakarta-pusat (3).jpg` | `rooterin-jasa-saluran-mampet-jakarta-pusat-tanah-abang.webp` | Penanganan saluran pipa mampet ruko & kantor Jakarta Pusat |
| 7 | `jakarta-selatan (1).jpg` | `rooterin-jasa-saluran-mampet-jakarta-selatan-tebet.webp` | Spesialis saluran pipa mampet Jakarta Selatan Tebet |
| 8 | `jakarta-selatan (2).jpg` | `rooterin-jasa-saluran-mampet-jakarta-selatan-kemang.webp` | Penanganan saluran pipa wastafel tersumbat Jakarta Selatan Kemang |
| 9 | `jakarta-selatan (3).jpg` | `rooterin-jasa-saluran-mampet-jakarta-selatan-cilandak.webp` | Jasa kuras dan lancar pipa tanpa bongkar Jakarta Selatan Cilandak |
| 10 | `jakarta-timur (1).jpg` | `rooterin-jasa-saluran-mampet-jakarta-timur-rawamangun.webp` | Jasa pelancar pipa saluran mampet Jakarta Timur Rawamangun |
| 11 | `jakarta-timur (2).jpg` | `rooterin-jasa-saluran-mampet-jakarta-timur-duren-sawit.webp` | Teknisi plumbing saluran buntu Jakarta Timur Duren Sawit |
| 12 | `jakarta-timur (3).jpg` | `rooterin-jasa-saluran-mampet-jakarta-timur-cakung.webp` | Pelancaran saluran got dan talang Jakarta Timur Cakung |
| 13 | `jakarta-utara (1).jpg` | `rooterin-jasa-saluran-mampet-jakarta-utara-kelapa-gading.webp` | Ahli pipa saluran mampet Jakarta Utara Kelapa Gading |
| 14 | `jakarta-utara (2).jpg` | `rooterin-jasa-saluran-mampet-jakarta-utara-pantai-indah-kapuk.webp` | Jasa pipa saluran mampet PIK Jakarta Utara bergaransi |
| 15 | `jakarta-utara (3).jpg` | `rooterin-jasa-saluran-mampet-jakarta-utara-sunter.webp` | Pelancaran wastafel & toilet mampet Jakarta Utara Sunter |

---

## 4. SKRIP OTOMASI BATCH KONVERSI

Gunakan skrip Node.js berikut di root proyek Anda untuk menjalankan proses rename dan kompresi WebP secara otomatis dalam hitungan detik.

### Opsi A: Skrip Node.js Menggunakan `sharp` (Sangat Direkomendasikan)
Buat file `convert-webp.js` di root folder proyek:

```javascript
const fs = require('fs');
const path = require('path');
const sharp = require('sharp');

// Konfigurasi Folder
const tasks = [
  {
    srcDir: path.join(__dirname, 'public/assets/dokumentasipekerjaan'),
    outDir: path.join(__dirname, 'public/assets/dokumentasipekerjaan/optimized'),
    mapping: {
      'after-gutter-resto-mampet.png': 'rooterin-saluran-mampet-after-gutter-resto-jabodetabek.webp',
      'after-gutter-resto.png': 'rooterin-saluran-mampet-talang-gutter-resto-bersih.webp',
      'almaz-freidchicken-resto-mampet.png': 'rooterin-jasa-saluran-mampet-restoran-almaz-fried-chicken.webp',
      'ceo-rumahwarga.png': 'rooterin-saluran-mampet-rumah-tinggal-jabodetabek.webp',
      'floor-drain-kamarmandi.png': 'rooterin-saluran-mampet-floor-drain-kamar-mandi-01.webp',
      'floordrain-kamar-mandi.png': 'rooterin-saluran-mampet-floor-drain-kamar-mandi-02.webp',
      'floordrain-rumah-warga-mampet.png': 'rooterin-saluran-mampet-floor-drain-rumah-warga.webp',
      'grease-trap-resto-mampet.png': 'rooterin-saluran-mampet-grease-trap-lemak-restoran.webp',
      'gutter-resto-mampet.png': 'rooterin-saluran-mampet-drainase-gutter-dapur-resto.webp',
      'inspeksi-kamera-kantor-pertamina-sunter.png': 'rooterin-inspeksi-kamera-saluran-mampet-pertamina-sunter.webp',
      'inspeksi-kamera-salurankloset-perkantoran-dan-gedung.png': 'rooterin-inspeksi-kamera-saluran-kloset-gedung-kantor.webp',
      'kai-semarang.png': 'rooterin-saluran-mampet-kantor-kai-semarang.webp',
      'kai-tugu.png': 'rooterin-saluran-mampet-stasiun-kai-tugu.webp',
      'kantor-pertamina-sunter-kloset.png': 'rooterin-saluran-mampet-kloset-kantor-pertamina-sunter.webp',
      'kloset-mampet-rumahwarga.png': 'rooterin-saluran-mampet-kloset-toilet-rumah-warga.webp',
      'perkantoran-floor-drain-kamar-mandi.png': 'rooterin-saluran-mampet-floor-drain-toilet-perkantoran.webp',
      'resto-haka-dimsum-tebet.png': 'rooterin-saluran-mampet-resto-haka-dimsum-tebet-jaksel.webp',
      'resto-mampet-sushi-tei-banjarmasin-kalimantan-selatan.png': 'rooterin-saluran-mampet-resto-sushi-tei-banjarmasin-01.webp',
      'resto-shoiciro.png': 'rooterin-saluran-mampet-restoran-shoichiro-01.webp',
      'resto-sushi-tei-banjarmasin-kalimantan-selatan.png': 'rooterin-saluran-mampet-resto-sushi-tei-banjarmasin-02.webp',
      'resto.png': 'rooterin-saluran-mampet-kitchen-sink-area-restoran.webp',
      'rumah-floordrain-kamarmandi.png': 'rooterin-saluran-mampet-kamar-mandi-rumah-tinggal.webp',
      'rumahan-wastafel.png': 'rooterin-saluran-mampet-wastafel-cuci-piring-rumah.webp',
      'shoichiro-resto-mampet.png': 'rooterin-saluran-mampet-restoran-shoichiro-02.webp',
      'wastafel-mampet-rumahwarga.png': 'rooterin-saluran-mampet-wastafel-rumah-warga-jabodetabek.webp',
      'wastafelmampet.png': 'rooterin-saluran-mampet-wastafel-dapur-tersumbat.webp'
    }
  },
  {
    srcDir: path.join(__dirname, 'public/assets/wilayah/jakarta'),
    outDir: path.join(__dirname, 'public/assets/wilayah/jakarta/optimized'),
    mapping: {
      'jakarta-barat (1).jpg': 'rooterin-jasa-saluran-mampet-jakarta-barat-kebon-jeruk.webp',
      'jakarta-barat (2).jpg': 'rooterin-jasa-saluran-mampet-jakarta-barat-kembangan.webp',
      'jakarta-barat (3).jpg': 'rooterin-jasa-saluran-mampet-jakarta-barat-grogol.webp',
      'jakarta-pusat (1).jpg': 'rooterin-jasa-saluran-mampet-jakarta-pusat-kemayoran.webp',
      'jakarta-pusat (2).jpg': 'rooterin-jasa-saluran-mampet-jakarta-pusat-menteng.webp',
      'jakarta-pusat (3).jpg': 'rooterin-jasa-saluran-mampet-jakarta-pusat-tanah-abang.webp',
      'jakarta-selatan (1).jpg': 'rooterin-jasa-saluran-mampet-jakarta-selatan-tebet.webp',
      'jakarta-selatan (2).jpg': 'rooterin-jasa-saluran-mampet-jakarta-selatan-kemang.webp',
      'jakarta-selatan (3).jpg': 'rooterin-jasa-saluran-mampet-jakarta-selatan-cilandak.webp',
      'jakarta-timur (1).jpg': 'rooterin-jasa-saluran-mampet-jakarta-timur-rawamangun.webp',
      'jakarta-timur (2).jpg': 'rooterin-jasa-saluran-mampet-jakarta-timur-duren-sawit.webp',
      'jakarta-timur (3).jpg': 'rooterin-jasa-saluran-mampet-jakarta-timur-cakung.webp',
      'jakarta-utara (1).jpg': 'rooterin-jasa-saluran-mampet-jakarta-utara-kelapa-gading.webp',
      'jakarta-utara (2).jpg': 'rooterin-jasa-saluran-mampet-jakarta-utara-pantai-indah-kapuk.webp',
      'jakarta-utara (3).jpg': 'rooterin-jasa-saluran-mampet-jakarta-utara-sunter.webp'
    }
  }
];

async function processImages() {
  for (const task of tasks) {
    if (!fs.existsSync(task.outDir)) {
      fs.mkdirSync(task.outDir, { recursive: true });
    }

    console.log(`\n⏳ Memproses direktori: ${task.srcDir}`);
    for (const [oldName, newName] of Object.entries(task.mapping)) {
      const srcFile = path.join(task.srcDir, oldName);
      const destFile = path.join(task.outDir, newName);

      if (fs.existsSync(srcFile)) {
        await sharp(srcFile)
          .resize({ width: 1280, withoutEnlargement: true }) // Ukuran optimal responsif
          .webp({ quality: 80, effort: 6 })
          .toFile(destFile);
        console.log(`✅ [OK] ${oldName} ➔ ${newName}`);
      } else {
        console.warn(`⚠️ [SKIP] File sumber tidak ditemukan: ${oldName}`);
      }
    }
  }
  console.log('\n🎉 Selesai! Semua aset telah dioptimasi ke format WebP.');
}

processImages().catch(console.error);
```

### Cara Menjalankan Skrip:
```bash
# Install package sharp
npm install sharp

# Jalankan skrip konversi
node convert-webp.js
```

---

## 5. STRUKTUR MASTER DATA JSON (UNTUK BLADE COMPONENT)
File: `resources/data/dokumentasi_pekerjaan.json`  
Data ini disiapkan agar halaman galeri dan landing page kota/kecamatan dapat memanggil dokumentasi secara dinamis berbasis tag wilayah dan kategori:

```json
[
  {
    "id": "doc-01",
    "title": "Pelancaran Pipa Restoran Haka Dimsum",
    "category": "Restoran & F&B",
    "city": "Jakarta Selatan",
    "district": "Tebet",
    "image": "/assets/dokumentasipekerjaan/optimized/rooterin-saluran-mampet-resto-haka-dimsum-tebet-jaksel.webp",
    "alt": "Pelancaran pipa cuci piring resto Haka Dimsum Tebet Jakarta Selatan",
    "problem": "Penumpukan lemak beku pada jalur pipa dapur resto",
    "solution": "Spiral Ridgid Machine + Eco Bio Degreaser",
    "result": "Aliran lancar tuntas tanpa merusak lantai"
  },
  {
    "id": "doc-02",
    "title": "Inspeksi Endoskopi CCTV Kantor Pertamina Sunter",
    "category": "Gedung & Perkantoran",
    "city": "Jakarta Utara",
    "district": "Sunter",
    "image": "/assets/dokumentasipekerjaan/optimized/rooterin-inspeksi-kamera-saluran-mampet-pertamina-sunter.webp",
    "alt": "Deteksi pipa buntu menggunakan kamera CCTV di kantor Pertamina Sunter",
    "problem": "Sumbatan berulang pada toilet lantai 2",
    "solution": "Inspeksi Visual Kamera CCTV 30M",
    "result": "Ditemukan sumbatan benda keras dan berhasil ditarik"
  },
  {
    "id": "doc-03",
    "title": "Pembersihan Saluran KAI Stasiun Tugu",
    "category": "Fasilitas Publik & BUMN",
    "city": "Semarang",
    "district": "Semarang Tengah",
    "image": "/assets/dokumentasipekerjaan/optimized/rooterin-saluran-mampet-kantor-kai-semarang.webp",
    "alt": "Pelancaran instalasi saluran air mampet di stasiun atau kantor KAI Semarang",
    "problem": "Sedimen pasir dan lumpur di drainase luar",
    "solution": "High Pressure Hydro Jetting",
    "result": "Debit pembuangan air kembali normal 100%"
  }
]
```

---

## 6. CHECKLIST AUDIT & QUALITY CONTROL (CORE WEB VITALS)

Pastikan semua kriteria ini terpenuhi sebelum melangkah ke Tahap 2:

- [ ] **Efisiensi Aset:** Rata-rata ukuran file `.webp` berada di kisaran 40 KB – 120 KB (penghematan bandwidth > 85%).
- [ ] **Nama File Standar:** Tidak ada spasi, tanda kurung `()`, atau huruf kapital pada nama file hasil konversi.
- [ ] **Atribut Media HTML:** Semua tag `<img>` sudah memiliki nilai `loading="lazy"`, `decoding="async"`, serta nilai `width` & `height`.
- [ ] **Schema LocalBusiness Terpasang:** Area layanan (Jabodetabek, Semarang, Lampung) telah terdefinisi di JSON-LD.
- [ ] **Verifikasi Tautan:** File asli tetap tersimpan aman sebagai backup sebelum direktori produksi dialihkan ke folder `optimized/`.

---
*Siap melangkah ke Tahap 2: Implementasi Komponen Wilayah Jakarta (Estimasi Biaya Transparan, Sektor Properti, FAQ Schema, dan Internal Linking Silo).*
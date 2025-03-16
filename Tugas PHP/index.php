<?php
// Fungsi untuk menghitung diskon
function hitungDiskon($totalBelanja)
{
  if ($totalBelanja >= 100000) {
    $diskon = 0.10; // Diskon 10%
  } elseif ($totalBelanja >= 50000) {
    $diskon = 0.05; // Diskon 5%
  } else {
    $diskon = 0; // Tidak ada diskon
  }

  // Mengembalikan nilai diskon
  return $totalBelanja * $diskon;
}

// Prosedur untuk menghitung dan menampilkan hasil
function producer($totalBelanja)
{
  $nilaiDiskon = hitungDiskon($totalBelanja);
  $totalBayar = $totalBelanja - $nilaiDiskon;

  echo "=== Rincian Pembayaran ===\n";
  echo "Total Belanja: Rp" . number_format($totalBelanja, 0, ',', '.') . "\n";
  echo "Diskon: Rp" . number_format($nilaiDiskon, 0, ',', '.') . "\n";
  echo "Total yang Harus Dibayar: Rp" . number_format($totalBayar, 0, ',', '.') . "\n";
}

// Contoh penggunaan producer
producer(120000); // Contoh total belanja Rp. 120.000
producer(75000);  // Contoh total belanja Rp. 75.000
producer(45000);  // Contoh total belanja Rp. 45.000

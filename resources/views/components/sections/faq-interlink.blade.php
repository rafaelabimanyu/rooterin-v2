@props([
    'namaWilayah' => 'Jakarta',
    'city' => null,
    'districts' => null,
    'allCities' => null
])

<x-faq-interlink :namaWilayah="$namaWilayah" :city="$city" :districts="$districts" :allCities="$allCities" />

function total_tarik_bea_masuk(input) {
    let harga = document.getElementById('harga').value;
    let bm = document.getElementById('tarif').value;
    document.getElementById('total-tarif').value = harga * bm / 100;
}

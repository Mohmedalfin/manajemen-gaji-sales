window.showSalesDetail = function (data) {
    document.getElementById('modalTitle').innerText = 'Bulan ' + data.bulan;
    document.getElementById('modalRevenue').innerText =
        'Rp ' + data.revenue.toLocaleString('id-ID');
    document.getElementById('modalTransaksi').innerText = data.transaksi;
    document.getElementById('modalUnit').innerText = data.unit;

    document.getElementById('detailModal').classList.remove('hidden');
    document.getElementById('detailModal').classList.add('flex');
};

window.closeModal = function () {
    document.getElementById('detailModal').classList.add('hidden');
};

export function initSalesChart(chartData) {
    const ctx = document.getElementById('salesChart');
    if (!ctx) return;

    new Chart(ctx, {
        type: 'line',
        data: {
            labels: chartData.labels,
            datasets: [{
                data: chartData.revenue,
                borderColor: '#2563eb',
                backgroundColor: 'rgba(37,99,235,.1)',
                tension: 0.4,
                fill: true
            }]
        },
        options: {
            responsive: true,
            onClick: (evt, elements) => {
                if (!elements.length) return;

                const index = elements[0].index;
                window.showSalesDetail({
                    bulan: chartData.labels[index],
                    revenue: chartData.revenue[index],
                    transaksi: chartData.transaksi[index],
                    unit: chartData.unit[index],
                });
            }
        }
    });
}

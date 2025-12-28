import './bootstrap';
import './components/search';
import './components/drop-down-profile';
import { initSalesChart } from './chart-sales';

document.addEventListener('DOMContentLoaded', () => {
    if (window.chartData) {
        initSalesChart(window.chartData);
    }
});


// Dados de exemplo (em um projeto real, estes dados viriam do seu backend Laravel)
const monthlyBookingsData = [65, 59, 80, 81, 56, 55, 40, 70, 90, 85, 95, 110];
const monthlyLabels = ['Jan', 'Fev', 'Mar', 'Abr', 'Mai', 'Jun', 'Jul', 'Ago', 'Set', 'Out', 'Nov', 'Dez'];

const topAttractionsData = [350, 280, 200, 150, 100];
const topAttractionsLabels = ['Miradouro da Lua', 'Serra da Chela', 'Tundavala', 'Foz do Kunene', 'Parque da Quiçama'];

// Configuração do gráfico de barras (Atrações)
const attractionsCtx = document.getElementById('topAttractionsChart').getContext('2d');
new Chart(attractionsCtx, {
    type: 'bar',
    data: {
        labels: topAttractionsLabels,
        datasets: [{
            label: 'Visitas',
            data: topAttractionsData,
            backgroundColor: 'rgba(229, 185, 0, 0.8)',
            borderColor: 'rgba(229, 185, 0, 1)',
            borderWidth: 1
        }]
    },
    options: {
        responsive: true,
        scales: {
            y: {
                beginAtZero: true,
                ticks: { color: '#f4f4f4' },
                grid: { color: '#444' }
            },
            x: {
                ticks: { color: '#f4f4f4' },
                grid: { color: '#444' }
            }
        },
        plugins: {
            legend: {
                labels: { color: '#f4f4f4' }
            }
        }
    }
});

// Configuração do gráfico de linhas (Reservas Mensais)
const bookingsCtx = document.getElementById('monthlyBookingsChart').getContext('2d');
new Chart(bookingsCtx, {
    type: 'line',
    data: {
        labels: monthlyLabels,
        datasets: [{
            label: 'Número de Reservas',
            data: monthlyBookingsData,
            borderColor: 'rgba(229, 185, 0, 1)',
            backgroundColor: 'rgba(229, 185, 0, 0.2)',
            tension: 0.4,
            fill: true
        }]
    },
    options: {
        responsive: true,
        scales: {
            y: {
                beginAtZero: true,
                ticks: { color: '#f4f4f4' },
                grid: { color: '#444' }
            },
            x: {
                ticks: { color: '#f4f4f4' },
                grid: { color: '#444' }
            }
        },
        plugins: {
            legend: {
                labels: { color: '#f4f4f4' }
            }
        }
    }
});
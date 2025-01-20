        // Sales Chart
        const salesCtx = document.getElementById('salesChart').getContext('2d');
        const salesChart = new Chart(salesCtx, {
            type: 'line',
            data: {
                labels: ['January', 'February', 'March', 'April', 'May', 'June', 'July'],
                datasets: [{
                    label: 'Sales',
                    data: [120000, 190000, 300000, 500000, 200000, 300000, 400000],
                    borderColor: 'rgba(75, 192, 192, 1)',
                    backgroundColor: 'rgba(75, 192, 192, 0.2)',
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });

        // User Engagement Chart
        const engagementCtx = document.getElementById('engagementChart').getContext('2d');
        const engagementChart = new Chart(engagementCtx, {
            type: 'bar',
            data: {
                labels: ['January', 'February', 'March', 'April', 'May', 'June', 'July'],
                datasets: [{
                    label: 'User  Engagement',
                    data: [50, 60, 70, 80, 90, 100, 110],
                    backgroundColor: 'rgba(153, 102, 255, 0.2)',
                    borderColor: 'rgba(153, 102, 255, 1)',
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });
// Function to apply the selected theme
function applyTheme(theme) {
    if (theme === 'dark') {
        document.body.classList.add('dark-mode');
        document.querySelector('.sidebar').classList.add('dark-mode');
        document.querySelector('.main-content').classList.add('dark-mode');
        document.querySelectorAll('.charts').forEach(chart => chart.classList.add('dark-mode'));
        document.querySelectorAll('canvas').forEach(canvas => canvas.classList.add('dark-mode')); // Add dark mode class to canvas
        document.querySelectorAll('th').forEach(th => th.classList.add('dark-mode')); // Add dark mode class to table headers
    } else {
        document.body.classList.remove('dark-mode');
        document.querySelector('.sidebar').classList.remove('dark-mode');
        document.querySelector('.main-content').classList.remove('dark-mode');
        document.querySelectorAll('.charts').forEach(chart => chart.classList.remove('dark-mode'));
        document.querySelectorAll('canvas').forEach(canvas => canvas.classList.remove('dark-mode')); // Remove dark mode class from canvas
        document.querySelectorAll('th').forEach(th => th.classList.remove('dark-mode')); // Remove dark mode class from table headers
    }
}

// On page load, check for saved theme preference
window.onload = function() {
    const savedTheme = localStorage.getItem('theme') || 'light'; // Default to light mode
    applyTheme(savedTheme); // Apply the saved theme
    renderCharts(); // Render charts after applying the theme
};

// Function to render charts
function renderCharts() {
    const salesCtx = document.getElementById('salesChart').getContext('2d');
    const engagementCtx = document.getElementById('engagementChart').getContext('2d');

    // Example chart data for Sales Overview
    const salesChart = new Chart(salesCtx, {
        type: 'bar',
        data: {
            labels: ['January', 'February', 'March', 'April', 'May', 'June'],
            datasets: [{
                label: 'Sales',
                data: [12, 19, 3, 5, 2, 3],
                backgroundColor: 'rgba(75, 192, 192, 0.2)',
                borderColor: 'rgba(75, 192, 192, 1)',
                borderWidth: 1
            }]
        },
        options: {
            scales: {
                y: {
                    beginAtZero: true,
                    grid: {
                        color: '#444444' // Change grid color for dark mode
                    }
                },
                x: {
                    grid: {
                        color: '#444444' // Change grid color for dark mode
                    }
                }
            },
            plugins: {
                legend: {
                    labels: {
                        color: '#e0e0e0' // Change legend text color for dark mode
                    }
                }
            }
        }
    });

    // Example chart data for User Engagement
    const engagementChart = new Chart(engagementCtx, {
        type: 'line',
        data: {
            labels: ['January', 'February', 'March', 'April', 'May', 'June'],
            datasets: [{
                label: 'User  Engagement',
                data: [65, 59, 80, 81, 56, 55],
                fill: false,
                borderColor: 'rgba(153, 102, 255, 1)',
                tension: 0.1
            }]
        },
        options: {
            scales: {
                y: {
                    beginAtZero: true,
                    grid: {
                        color: '#444444' // Change grid color for dark mode
                    }
                },
                x: {
                    grid: {
                        color: '#444444' // Change grid color for dark mode
                    }
                }
            },
            plugins: {
                legend: {
                    labels: {
                        color: '#e0e0e0' // Change legend text color for dark mode
                    }
                }
            }
        }
    });
}
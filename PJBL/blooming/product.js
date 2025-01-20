function addProduct() {
    alert("Add Product functionality not implemented yet.");
}

function editProduct(id) {
    alert("Edit Product functionality for ID " + id + " not implemented yet.");
}

function deleteProduct(id) {
    if (confirm("Are you sure you want to delete this product?")) {
        alert("Product with ID " + id + " deleted.");
    }
}
        // Here you would typically remove the product from the database

// Function to apply the selected theme
function applyTheme(theme) {
    if (theme === 'dark') {
        document.body.classList.add('dark-mode');
        document.querySelector('.sidebar').classList.add('dark-mode');
        document.querySelector('.main-content').classList.add('dark-mode');
        document.querySelectorAll('th').forEach(th => th.classList.add('dark-mode')); // Add dark mode class to table headers
    } else {
        document.body.classList.remove('dark-mode');
        document.querySelector('.sidebar').classList.remove('dark-mode');
        document.querySelector('.main-content').classList.remove('dark-mode');
        document.querySelectorAll('th').forEach(th => th.classList.remove('dark-mode')); // Remove dark mode class from table headers
    }
}

// On page load, check for saved theme preference
window.onload = function() {
    const savedTheme = localStorage.getItem('theme') || 'light'; // Default to light mode
    applyTheme(savedTheme); // Apply the saved theme
};

// Function to toggle theme and save preference
function toggleTheme() {
    const currentTheme = localStorage.getItem('theme') || 'light';
    const newTheme = currentTheme === 'dark' ? 'light' : 'dark';
    localStorage.setItem('theme', newTheme); // Save the new theme
    applyTheme(newTheme); // Apply the new theme
}

// Example: Add an event listener to a button to toggle the theme
document.getElementById('themeToggleButton').addEventListener('click', toggleTheme);

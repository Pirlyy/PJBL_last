function addUser () {
    alert("Add User functionality not implemented yet.");
}

function editUser (id) {
    alert("Edit User functionality for ID " + id + " not implemented yet.");
}

function deleteUser (id) {
    if (confirm("Are you sure you want to delete this user?")) {
        alert("User  with ID " + id + " deleted.");
        // Here you would typically remove the user from the database
    }
}

// Function to apply the selected theme
function applyTheme(theme) {
    if (theme === 'dark') {
        document.body.classList.add('dark-mode');
        document.querySelector('.sidebar').classList.add('dark-mode');
        document.querySelector('.main-content').classList.add('dark-mode');
        // Menambahkan elemen untuk dark mode
    } else {
        document.body.classList.remove('dark-mode');
        document.querySelector('.sidebar').classList.remove('dark-mode');
        document.querySelector('.main-content').classList.remove('dark-mode');
        // Menghapus elemen dari dark mode
    }
}

// Page di load, cek theme yang tersimpan
window.onload = function() {
    const savedTheme = localStorage.getItem('theme') || 'light'; // Default to light mode
    applyTheme(savedTheme); // Apply the saved theme
};

// Function di apply ke theme yang ter apply
function applyTheme(theme) {
    if (theme === 'dark') {
        document.body.classList.add('dark-mode');
        document.querySelector('.sidebar').classList.add('dark-mode');
        document.querySelector('.main-content').classList.add('dark-mode');
        
        // Add dark mode class to table headers
        document.querySelectorAll('th').forEach(th => th.classList.add('dark-mode'));
    } else {
        document.body.classList.remove('dark-mode');
        document.querySelector('.sidebar').classList.remove('dark-mode');
        document.querySelector('.main-content').classList.remove('dark-mode');
        
        // Remove dark mode class from table headers
        document.querySelectorAll('th').forEach(th => th.classList.remove('dark-mode'));
    }
}

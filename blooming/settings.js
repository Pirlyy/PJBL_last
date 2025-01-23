// Function to apply the selected theme
function applyTheme(theme) {
    if (theme === 'dark') {
        document.body.classList.add('dark-mode');
    } else {
        document.body.classList.remove('dark-mode');
    }
}

// Function to show the accessibility modal
function showAccessibilityModal() {
    document.getElementById('accessibilityModal').style.display = 'block';
}

// Function to hide the accessibility modal
function hideAccessibilityModal() {
    document.getElementById('accessibilityModal').style.display = 'none';
}

// On page load, check for saved settings
window.onload = function() {
    // Check for saved notification preference
    const notificationSetting = localStorage.getItem('notificationSettings') || 'enabled';
    document.getElementById('notificationSettings').value = notificationSetting;

    // Check for saved theme preference
    const savedTheme = localStorage.getItem('theme') || 'light'; // Default to light mode
    applyTheme(savedTheme); // Apply the saved theme

    // Check for saved accessibility preference
    const accessibilitySetting = localStorage.getItem('accessibility') || 'enabled';
    document.getElementById('accessibility').value = accessibilitySetting;
};

// Handle form submission
document.getElementById('settingsForm').addEventListener('submit', function(event) {
    event.preventDefault(); // Prevent the default form submission

    // Get the selected values
    const notificationSetting = document.getElementById('notificationSettings').value;
    const themeSetting = document.getElementById('theme').value;
    const accessibilitySetting = document.getElementById('accessibility').value;

    // Save the settings in localStorage
    localStorage.setItem('notificationSettings', notificationSetting);
    localStorage.setItem('theme', themeSetting);
    localStorage.setItem('accessibility', accessibilitySetting);

    // Apply the selected theme
    applyTheme(themeSetting);

    // Display a message to the user
    alert('Settings saved successfully!');
});

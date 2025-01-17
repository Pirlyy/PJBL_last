document.getElementById('settingsForm').addEventListener('submit', function(event) {
    event.preventDefault(); // Prevent the default form submission

    // Get form values
    const siteTitle = document.getElementById('siteTitle').value;
    const emailNotifications = document.getElementById('emailNotifications').value;
    const userPermissions = document.getElementById('userPermissions').value;

    // Here you would typically send the data to the server
    alert(`Settings saved:\nSite Title: ${siteTitle}\nEmail Notifications: ${emailNotifications}\nUser  Permissions: ${userPermissions}`);
});
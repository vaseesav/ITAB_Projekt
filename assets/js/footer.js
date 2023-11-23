document.addEventListener('DOMContentLoaded', function() {
    var themeStatusElement = document.getElementById('themeStatus');
    var currentTheme = themeStatusElement.getAttribute('data-theme');
    var link = document.getElementById('accessibilityThemeLink');

    if (currentTheme === 'accessible-colors') {
        link.textContent = 'Barrierefreies Theme deaktivieren';
    } else {
        link.textContent = 'Barrierefreies Theme aktivieren';
    }

    link.addEventListener('click', function(event) {
        event.preventDefault();
        toggleTheme();
    });
});

function toggleTheme() {
    var link = document.getElementById('accessibilityThemeLink');
    var currentTheme = link.textContent.includes('deaktivieren') ? 'light-colors' : 'accessible-colors';

    changeTheme(currentTheme);
    saveThemePreference(currentTheme);

    link.textContent = currentTheme === 'accessible-colors' ? 'Barrierefreies Theme deaktivieren' : 'Barrierefreies Theme aktivieren';

    var themeSwitch = document.getElementById('switch');
    if (themeSwitch !== null) { // Stellen Sie sicher, dass themeSwitch nicht null ist
        themeSwitch.checked = (currentTheme === 'accessible-colors');
    }
}



function changeTheme(theme) {
    var themePath = theme === 'accessible-colors' ? 'assets/css/accessible-colors.css' : 'assets/css/light-colors.css';
    document.getElementById('themeStyle').setAttribute('href', themePath);
}

function saveThemePreference(theme) {
    $.ajax({
        url: 'assets/php-backend/profile-page/save-theme.php',
        type: 'POST',
        data: {theme: theme},
        success: function(response) {
        },
        error: function(error) {
        }
    });
}

function showPreloader() {
    document.getElementById('preloader').style.display = 'block';
}

function hidePreloader() {
    document.getElementById('preloader').style.display = 'none';
}

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

    if (currentTheme === 'accessible-colors') {
        document.getElementById('switch').checked = true;
    } else {
        document.getElementById('switch').checked = false;
    }
}


function changeTheme(theme) {
    var themePath = theme === 'accessible-colors' ? 'assets/css/accessible-colors.css' : 'assets/css/light-colors.css';
    document.getElementById('themeStyle').setAttribute('href', themePath);
}

function saveThemePreference(theme) {
    showPreloader();
    $.ajax({
        url: 'assets/php-backend/profile-page/save-theme.php',
        type: 'POST',
        data: {theme: theme},
        success: function(response) {
            hidePreloader();
        },
        error: function(error) {
            hidePreloader();
        }
    });
}

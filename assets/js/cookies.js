function showPreloader() {
    document.getElementById('preloader').style.display = 'block';
}

function hidePreloader() {
    document.getElementById('preloader').style.display = 'none';
}

function isCookieSet(){
    var cookie = getCookie("cookieErlaubt");
    var element = document.getElementById('cookie-popup');

    if (cookie === "ja"){
 //       showPreloader();
        element.style.display = "none";
    } else if (cookie === "nein"){
        console.log("Speichern: verboten");
    } else {
        console.log("Cookie nicht gesetzt");
        element.style.display = "block";
    }
}

function getCookie(cookieName) {
    var name = cookieName + "=";
    var decodedCookie = decodeURIComponent(document.cookie);
    var ca = decodedCookie.split(';');

    for(var i = 0; i < ca.length; i++) {
        var c = ca[i];
        while (c.charAt(0) == ' ') {
            c = c.substring(1);
        }
        if (c.indexOf(name) == 0) {
            return c.substring(name.length, c.length);
        }
    }
    return null;
}

function setCookie(){
    document.cookie= "cookieErlaubt = ja; expires=Fri, 31 Dec 9999 23:59:59 GMT; SameSite=None; secure";
    isCookieSet();
}

isCookieSet();

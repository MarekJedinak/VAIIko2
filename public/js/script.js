const profileBtn = document.getElementById('profileBtn');
const profileDropdown = document.getElementById('profileDropdown');

let variable1 = document.getElementById("demo1");
function getlocation() {
    navigator.geolocation.getCurrentPosition(showLoc);
}
function showLoc(pos) {
    variable1.innerHTML =
        "Latitude: " +
        pos.coords.latitude +
        "<br>Longitude: " +
        pos.coords.longitude;
}

profileBtn.addEventListener('click', () => {
    if (profileDropdown.style.display === 'block') {
        profileDropdown.style.display = 'none';
    } else {
        profileDropdown.style.display = 'block';
    }
});

window.addEventListener('click', (e) => {
    if (!profileBtn.contains(e.target) && !profileDropdown.contains(e.target)) {
        profileDropdown.style.display = 'none';
    }
});
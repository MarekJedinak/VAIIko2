// Získať prvky
const profileBtn = document.getElementById('profileBtn');
const profileDropdown = document.getElementById('profileDropdown');

// Po kliknutí na ikonku zobraz/skry dropdown
profileBtn.addEventListener('click', () => {
    if (profileDropdown.style.display === 'block') {
        profileDropdown.style.display = 'none';
    } else {
        profileDropdown.style.display = 'block';
    }
});

// Ak chceš, aby dropdown zmizol po kliknutí niekde inde na stránke:
window.addEventListener('click', (e) => {
    // ak cieľ nie je samotný button ani dropdown, skry dropdown
    if (!profileBtn.contains(e.target) && !profileDropdown.contains(e.target)) {
        profileDropdown.style.display = 'none';
    }
});
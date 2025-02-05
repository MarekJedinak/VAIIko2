const profileBtn = document.getElementById('profileBtn');
const profileDropdown = document.getElementById('profileDropdown');


function getCityFromCoordinates(lat, lon) {
    const apiUrl = `https://nominatim.openstreetmap.org/reverse?format=json&lat=${lat}&lon=${lon}`;
    let location = "";
    fetch(apiUrl)
        .then(response => response.json())
        .then(data => {
            if (data && data.address) {
                location = data.address.city || data.address.town || data.address.village || data.address.county || data.address.state || "Neznáme miesto";
                console.log("Mesto / miesto:", location);
                console.log(data);
                document.getElementById("city1").textContent = location;


            } else {
                console.log("Mesto sa nenašlo.");
            }
        })
        .catch(error => {
            console.error("Chyba pri načítaní API:", error);
        });
    return location;
}

let variable1 = document.getElementById("demo1");
function getlocation() {
    navigator.geolocation.getCurrentPosition(showLoc);
}
function showLoc(pos) {
    const lat = pos.coords.latitude;
    const long = pos.coords.longitude;
    const apiUrl = `https://api.open-meteo.com/v1/forecast?latitude=${lat}&longitude=${long}&hourly=temperature_2m`;

    fetch(apiUrl)
        .then(response => response.json())
        .then(data => {
            const temperature = data.hourly.temperature_2m[0];
            document.getElementById("temperature").textContent = temperature;
            document.getElementById("lat").textContent = lat;
            document.getElementById("long").textContent = long;
            getCityFromCoordinates(lat, long);

        })
        .catch(error => {
            document.getElementById("temperature").textContent = "Chyba";
            console.error("Chyba pri načítaní dát:", error);
        });

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
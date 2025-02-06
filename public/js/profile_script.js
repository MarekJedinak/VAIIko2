document.getElementById('save-changes').addEventListener('click', async function (event) {
    event.preventDefault();

    const username = document.getElementById("username").value;
    const password = document.getElementById("password").value;
    const file = document.getElementById("uploadImage").files[0];

    let form = document.getElementById('formId');

    if (!file) {
        alert("Prosím, vyberte súbor.");
        return;
    }

    const reader = new FileReader();
    reader.onloadend = async function() {
        const base64String = reader.result;

        let url = "http://127.0.0.1//?c=profile&a=save_photo";
        let body = {
            "photo": base64String,
            "username": username,
        };

        event.preventDefault();

        let response = await fetch(url, {
            method: "POST",
            body: JSON.stringify(body),
            mode: "cors",
            headers: {
                "Content-type": "application/json",
                "Accept": "application/json",
            }
        });

        if (response.ok) {
            const data = await response.json();
            const output = data["output"];
            if (output === 1) {
                alert('Profil sa upravil');
                document.getElementById("profileImage").src = base64String;
            } if (output === 2) {
                alert('Pridala sa profilovka');
                document.getElementById("profileImage").src = base64String;
            }
        }


    };
    reader.readAsDataURL(file);

    reader.onload();
});

document.getElementById('delete-photo-btn').addEventListener('click', async function (event) {
    let url = "http://127.0.0.1//?c=profile&a=delete_photo";
    let body = {

    };

    event.preventDefault();

    let response = await fetch(url, {
        method: "POST",
        body: JSON.stringify(body),
        mode: "cors",
        headers: {
            "Content-type": "application/json",
            "Accept": "application/json",
        }
    });

    if (response.ok) {
        const data = await response.json();
        const output = data["output"];
        if (output === 1) {
            alert('Profilova fotka sa vymazala');
            document.getElementById("profileImage").src = "public/images/profile-default-icon.png";
        }
    }
});

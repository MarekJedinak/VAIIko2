document.getElementById('createCharacter').addEventListener('click', async function (event) {
    event.preventDefault();

    const characterName = document.getElementById("characterName").value;
    const characterClass = document.getElementById("characterClass").value;
    const characterDescription = document.getElementById("characterDescription").value;
    const file = document.getElementById("characterImage").files[0];

    let form = document.getElementById('formId');


    if (!file) {
        alert("Prosím, vyberte súbor.");
        return;
    }

    const reader = new FileReader();
    reader.onloadend = async function() {
        const base64String = reader.result;

        let url = "http://127.0.0.1//?c=character&a=save_character";
        let body = {
            "photo": base64String,
            "name": characterName,
            "class": characterClass,
            "description": characterDescription,
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
                alert('Character sa ulozil');
            } else {
                form.submit();
            }
        }


    };
    reader.readAsDataURL(file);

    reader.onload();
});
//document.getElementById("formId").submit();

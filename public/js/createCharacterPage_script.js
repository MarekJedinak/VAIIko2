document.getElementById('createCharacter').addEventListener('click', async function (event) {
    event.preventDefault();

    const characterName = document.getElementById("characterName").value;
    const characterClass = document.getElementById("characterClass").value;
    const characterDescription = document.getElementById("characterDescription").value;
    const characterId = document.getElementById("characterId").value;
    const fileInput = document.getElementById("characterImage");
    const file = fileInput.files.length > 0 ? fileInput.files[0] : null;

    let form = document.getElementById('formId');

    if (!file && !characterId) {
        alert("Prosím, vyberte súbor alebo zadajte Character ID.");
        return;
    }

    const reader = new FileReader();

    reader.onloadend = async function () {
        let base64String = file ? reader.result : null;

        let url = "http://127.0.0.1//?c=character&a=save_character";
        let body = {
            "photo": base64String,
            "name": characterName,
            "class": characterClass,
            "description": characterDescription,
            "char_id": characterId,
        };

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
            if (data["output"] === 1) {
                alert('Character sa ulozil');
            } else {
                form.submit();
            }
        }
    };

    if (file) {
        reader.readAsDataURL(file);
    } else {
        reader.onloadend();
    }
});
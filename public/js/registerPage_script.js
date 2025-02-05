document.getElementById('register').addEventListener('click', async function (event) {


    let form = document.getElementById('formId');
    let username = document.getElementById('username').value;

    let url = "http://127.0.0.1//?c=auth&a=check_username";
    let body = {
        "username": username,
    };

// Zrušte predvolené odoslanie formulára
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
            alert('Username is already used');
        } else {
            form.submit();
        }
    }


})
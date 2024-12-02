document.getElementById('login').addEventListener('click', function (event) {
    event.preventDefault();

    const username = document.getElementById('username').value;
    const password = document.getElementById('password').value;


    if (!username || username.trim() === '') {
        alert('You forgor to enter Username!');
    }
    if (!password || password.trim() === '') {
        alert('You forgor to enter Password!');
    }
})
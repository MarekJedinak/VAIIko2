document.getElementById('createCharacter').addEventListener('click', function (event) {
    event.preventDefault();

    const characterName = document.getElementById("characterName").value;
    const characterClass = document.getElementById("characterClass").value;
    const characterDescription = document.getElementById("characterDescription").value;
    const characterPhoto = document.getElementById("characterPhoto");

    let specialSymbols = '.,!?@%&$#';
    let hasSpecialSymbols = false;
    let spravaName = '';
    let nameError = false;

    for (let i = 0; i < characterName.length; i++) {
        for (let k = 0; k < specialSymbols.length; k++) {
            if (characterName.charAt(i) === specialSymbols.charAt(k)) {
                hasSpecialSymbols = true;
            }
        }
    }
    if (!characterName || characterName.trim() === '') {
        spravaName = 'You forgor to enter Name of your Character!';
        nameError = true;
    } else if (characterName.length > 15) {
        spravaName = 'Character name is too long!';
        nameError = true;
    } else if (hasSpecialSymbols) {
        spravaName = 'Character name cannot contain special symbols(.,!?@%&$#)!';
        nameError = true;
    }

    if(nameError) {
        alert(spravaName);
    }
    if (!characterClass || characterClass.trim() === '') {
        alert('You forgor to enter Class of your Character!');
    }
    if (!characterDescription || characterDescription.trim() === '') {
        alert('You forgor to enter Description of your Character!');
    }
    if (!characterPhoto.files || characterPhoto.files.length === 0) {
        alert('You forgor to enter Image of your Character!');
    } else {
        const file = characterPhoto.files[0];
        const maxFileSize = 2 * 1024 * 1024;
        if (file.size > maxFileSize) {
            alert('Image file is too LARGE (max 2MB)');
        }
    }
})

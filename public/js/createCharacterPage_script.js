document.getElementById('createCharacter').addEventListener('click', function (event) {
    event.preventDefault();

    const characterName = document.getElementById("characterName").value;
    const characterClass = document.getElementById("characterClass").value;
    const characterDescription = document.getElementById("characterDescription").value;
    const characterPhoto = document.getElementById("characterPhoto").value;

    if (!characterName || characterName.trim() === '') {
        alert('You forgor to enter Name of your Character!');
    }
    if (!characterClass || characterClass.trim() === '') {
        alert('You forgor to enter Class of your Character!');
    }
    if (!characterDescription || characterDescription.trim() === '') {
        alert('You forgor to enter Description of your Character!');
    }
    if (!characterPhoto || characterPhoto.trim() === '') {
        alert('You forgor to enter Image of your Character!');
    }

})

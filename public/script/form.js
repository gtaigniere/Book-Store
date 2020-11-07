const bookForm = document.getElementById('book-form');
const addButton = document.getElementById('add-button');
const modifyButton = document.getElementById('modify-button');
const searchButton = document.getElementById('search-button');

// Au clic sur le bouton "ajouter (plus)", on modifie les attributs "action" et "method" du formulaire
addButton.addEventListener('click', function() {
    bookForm.setAttribute('action', '?target=add');
    bookForm.setAttribute('method', 'POST');
});

// Au clic sur le bouton "modifier (stylo)", on modifie les attributs "action" et "method" du formulaire
modifyButton.addEventListener('click', function() {
    bookForm.setAttribute('action', '?target=modify');
    bookForm.setAttribute('method', 'POST');
});

// Au clic sur le bouton "rechercher (loupe)", on modifie les attributs "action" et "method" du formulaire
searchButton.addEventListener('click', function() {
    bookForm.setAttribute('action', '');
    bookForm.setAttribute('method', 'GET');
});

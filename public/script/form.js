const form = document.querySelector('form');
const add = document.getElementById('add');
const modify = document.getElementById('modify');
const search = document.getElementById('search');

// Au clic sur le bouton "ajouter (plus)", on modifie les attributs "action" et "method" du formulaire
add.addEventListener('click', function() {
    form.setAttribute('action', '?target=add');
    form.setAttribute('method', 'POST');
});

// Au clic sur le bouton "modifier (stylo)", on modifie les attributs "action" et "method" du formulaire
modify.addEventListener('click', function() {
    form.setAttribute('action', '?target=modify');
    form.setAttribute('method', 'POST');
});

// Au clic sur le bouton "rechercher (loupe)", on modifie les attributs "action" et "method" du formulaire
search.addEventListener('click', function() {
    form.setAttribute('action', '');
    form.setAttribute('method', 'GET');
});

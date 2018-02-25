require('../css/app.scss');

var $ = require('jquery');

$('#titleSearchInput').on('input', (e) => {
    const text = $(e.target).val();
    if (text !== '') {
        const titles = document.getElementsByClassName('card-title');
        for (let i = 0; i < titles.length; i++) {
            if (titles[i].innerText.toLowerCase().includes(text.toLowerCase())) {
                $(titles[i]).parent().parent().show();
            } else {
                $(titles[i]).parent().parent().hide();
            }
        }
    } else {
        const cards = document.getElementsByClassName('card');
        for (let i = 0; i < cards.length; i++) {
            $(cards[i]).show();
        }
    }
});
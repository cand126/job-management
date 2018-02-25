require('../css/app.scss');
require('../images/cover1.jpg');
require('../images/cover2.jpg');
require('../images/cover3.jpg');

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
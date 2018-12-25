$(document).ready(() => {

    $('#menuButton').on('click', () => {$('#menuPanel').removeClass('closed')});
    $('#menuCloseButton').on('click', () => {$('#menuPanel').addClass('closed')});
});
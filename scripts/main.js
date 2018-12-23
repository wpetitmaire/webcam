$(document).ready(() => {
    
    $('#menuButton').on('click', () => {$('#menuPanel').removeClass('closed')});
    $('#menuCloseButton').on('click', () => {$('#menuPanel').addClass('closed')});

    $('#btnGetFichiers').on('click', () => {
        $.ajax({
            url: './ajaxExchange/getFichiers.php',
            type: 'GET',
            data: '&_folder=snapshots',
            dataType: 'JSON',
            complete: (resultat, statut) => {
                /* console.log('COMPLETE');
                console.log(resultat);
                console.log(statut); */
            },
        });
    });
});


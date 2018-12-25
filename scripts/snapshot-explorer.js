$(document).ready(() => {

    
    $.ajax({
        url: './ajaxExchange/getFichiers.php',
        type: 'GET',
        data: '&_folder=snapshots',
        dataType: 'JSON',
        complete: (resultat, statut) => {
            
        },
    });
});


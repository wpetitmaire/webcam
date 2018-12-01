$(document).ready(() => {

    // Application des évènements.
    jQuery('#switchButon').on('click', () => {
        switchAction();
    })

    jQuery('#imgLive').on("error", function() {
        alert('ERREUR IMAGE');
    })

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


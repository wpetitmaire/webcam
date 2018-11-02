jQuery(document).ready(() => {

    // Application des évènements.
    jQuery('.switchButton').on('click', () => {
        switchAction();
    })

})

const readingmode = {
    live: { id: 'live', title: 'En Direct' },
    lastimage: { id: 'lastimage', title: 'Dernière capture' },
};

let currentMode = readingmode.live.id;

/**
 * @function switchAction
 * Modifie l'image principale : Caméra live ou dernière image capturée.
 */
function switchAction() {

    switch(currentMode) {

        case readingmode.live.id :
            jQuery('#imgLive').removeClass('display-none');
            jQuery('#imgLastSnap').addClass('display-none');
            currentMode = readingmode.lastimage.id;
            jQuery('#titreCam').html(readingmode.lastimage.title);
            break;

        case readingmode.lastimage.id :
            jQuery('#imgLive').addClass('display-none');
            jQuery('#imgLastSnap').removeClass('display-none');
            currentMode = readingmode.live.id;
            jQuery('#titreCam').html(readingmode.live.title);
            break;
    }
}
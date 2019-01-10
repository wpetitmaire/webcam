class files_explorer {

    constructor() {

        this.arborescence = {};
        // this.typeRecherche = 'annee';
        this.pointDepart = { annee: '', mois: '', jour: '' };

        // document.getElementById('yearButton').className = 'selected';
    }

    /**
     * Récupère l'arborescence des fichiers
     * @returns {boolean} résultat du traitement
     */
    getArboresence() {

        console.log('--getArboresence--');
        

        $.ajax({
            url: './ajaxExchange/getFichiers.php',
            type: 'GET',
            data: '&_folder=snapshots&_type=mois',
            dataType: 'JSON',
            complete: (resultat, statut) => {
                if(statut == 'success') {
                    this.arborescence = resultat.responseJSON.result;
                    this.modelisationArboresence(document.getElementById('snapContainer'));
                    return true
                }
                else {
                    alert(resultat);
                    return false;
                }
            },
        });
    }

    /**
     * 
     * @param {string} type Type de recherche ('annee', 'mois' ou 'jour')
     */
    // changeTypeRecherche(type) {

    //     if(['annee', 'mois', 'jour'].indexOf(type.toLowerCase()) == -1)
    //         return false;

    //     this.typeRecherche = type;
    // }

    /**
     * Modéliser l'arboresence 
     * 
     * @param {HTMLElement} container Conteneur qui reçoit les éléments de l'arborescense 
     */
    modelisationArboresence(container) {

        console.log('--modelisationArboresence--');

        // console.log(this.arborescence);

        while (container.firstChild) {
            container.removeChild(container.firstChild);
        }

        // Affichage de l'arborescene de l'année.
        if(this.pointDepart.annee == '') {

            this.modelisationArboresenceAnnee(container);
        }
        // Affichage de l'arborescence des mois de l'année sélectionnée
        else if(this.pointDepart.annee != '' && this.pointDepart.mois == '') {
            this.modelisationArboresenceMois(container);
        }
        // Affichage de l'arborescence des jours du mois de l'année sélectionnée
        else if(this.pointDepart.annee != '' && this.pointDepart.mois != '' && this.pointDepart.jour == '') {
            this.modelisationArboresenceJours(container);
        }
        // Affichage des photos du jour du moids de l'année sélectionnée
        else {
            this.modelisationArboresenceHeures(container);
        }

        $('#snapContainer article.folder').on('click', (event) => {
            console.log('CLICK');
            

            snapExplorer.setPointDepart(event.target);
            snapExplorer.modelisationArboresence(document.getElementById('snapContainer'));
        });
    }

    /**
     * Modéliser l'arboresence  des années
     * 
     * @param {HTMLElement} container Conteneur qui reçoit les éléments de l'arborescense 
     */
    modelisationArboresenceAnnee(container) {

        this.arborescence.forEach((elem) => {
    
            // console.log(elem.name);

            let articleElement = document.createElement('article');
            articleElement.className = 'flex-container-columns folder';
            articleElement.setAttribute('type', 'year');

            let spanElement = document.createElement('span');
            spanElement.innerHTML = elem.name;

            articleElement.appendChild(spanElement);

            container.appendChild(articleElement);
            
        });
    }

    /**
     * Modéliser l'arboresence  des mois de l'année sélectionnée
     * 
     * @param {HTMLElement} container Conteneur qui reçoit les éléments de l'arborescense 
     */
    modelisationArboresenceMois(container) {

        console.log('--modelisationArboresenceMois--');

        let annee = this.pointDepart.annee;
        let positionAnnee = 0;

        console.log(annee);

        for(let ind=0; ind<this.arborescence.length; ind++) {

            if(this.arborescence[ind].name == annee) {
                positionAnnee = ind;
                break;
            }
        }

        console.log('positionAnnee : ' + positionAnnee);

        let anneeContent = this.arborescence[positionAnnee].content;

        anneeContent.forEach((elem) => {

            console.log(elem);

            let articleElement = document.createElement('article');
            articleElement.className = 'flex-container-columns folder';
            articleElement.setAttribute('type', 'month');

            let spanElement = document.createElement('span');
            spanElement.innerHTML = elem.name;

            articleElement.appendChild(spanElement);

            container.appendChild(articleElement);
            
        });
    }

    /**
     * Modéliser l'arboresence  des jours du moids de l'année sélectionnée
     * 
     * @param {HTMLElement} container Conteneur qui reçoit les éléments de l'arborescense 
     */
    modelisationArboresenceJours(container) {

        console.log('--modelisationArboresenceJours--');

        let annee = this.pointDepart.annee;
        let positionAnnee = 0;
        let mois = this.pointDepart.mois;
        let positionMois = 0;

        // Recherche de la position de l'année
        for(let i=0; i<this.arborescence.length; i++) {

            if(this.arborescence[i].name == annee) {

                positionAnnee = i;

                // Recherche de la position du mois
                for(let j=0; j<this.arborescence[i].content.length; j++) {

                    if(this.arborescence[i].content[j].name == mois) {
                        positionMois = j;
                        break;
                    }
                }

                break;
            }
        }

        console.log('positionAnnee : ' + positionAnnee);
        console.log('positionMois : ' + positionMois);

        let moisContent = this.arborescence[positionAnnee].content[positionMois].content;
        
        moisContent.forEach((elem) => {

            console.log(elem);

            let articleElement = document.createElement('article');
            articleElement.className = 'flex-container-columns folder';
            articleElement.setAttribute('type', 'day');

            let spanElement = document.createElement('span');
            spanElement.innerHTML = elem.name;

            articleElement.appendChild(spanElement);

            container.appendChild(articleElement);
        });
        
    }

    /**
     * Modéliser l'arboresence  des photos des heures du jour du moids de l'année sélectionnée
     * 
     * @param {HTMLElement} container Conteneur qui reçoit les éléments de l'arborescense 
     */
    modelisationArboresenceHeures(container) {

        console.log('--modelisationArboresenceHeures--');
        
        let annee = this.pointDepart.annee;
        let positionAnnee = 0;
        let mois = this.pointDepart.mois;
        let positionMois = 0;
        let jour = this.pointDepart.jour;
        let positionJour = 0;

        // Recherche de la position de l'année
        for(let i=0; i<this.arborescence.length; i++) {

            if(this.arborescence[i].name == annee) {

                positionAnnee = i;

                // Recherche de la position du mois
                for(let j=0; j<this.arborescence[i].content.length; j++) {

                    if(this.arborescence[i].content[j].name == mois) {
                        positionMois = j;

                        for(let k=0; k<this.arborescence[i].content[j].content.length; k++) {

                            if(this.arborescence[i].content[j].content[k].name == jour) {
                                positionJour = k;
                                break;
                            }
                        }

                        break;
                    }
                }

                break;
            }
        }

        console.log('positionAnnee : ' + positionAnnee);
        console.log('positionMois : ' + positionMois);
        console.log('positionJour : ' + positionJour);

        let jourContent = this.arborescence[positionAnnee].content[positionMois].content[positionJour].content;

        /*
            <article class="flex-container-columns">
                <span>Mardi 2 décembre - 15h00</span>
                <div >
                    <img src="./pictures/Tests/3.jpg" class="preview-image" >
                </div> 
            </article> 
        */

        jourContent.forEach((elem) => {

            let articleElement = document.createElement('article');
            articleElement.className = 'flex-container-columns';

            let spanElement = document.createElement('span');
            spanElement.innerHTML = elem.name;

            let divImage = document.createElement('div');
            
            let imgElement = document.createElement('img');
            imgElement.src = './pictures/intervalSnapshots/'+annee+'/'+mois+'/'+jour+'/'+elem.name;
            imgElement.className = 'preview-image';

            // Img dans la Div
            divImage.appendChild(imgElement);

            // Span sur Article
            articleElement.appendChild(spanElement);

            // Div dans Article
            articleElement.appendChild(divImage);

            // Article dans le container
            container.appendChild(articleElement);
        });

    }

    /**
     * Modifie la position de départ pour la création de l'arborescence
     * @param {HTMLElement} originElement Element de l'arborescence
     */
    setPointDepart(originElement) {

        console.log('--setPointDepart--');
        console.log(originElement);        
        
        let type = '';

        if(originElement.nodeName == 'ARTICLE') {
            type = originElement.getAttribute('type');
            originElement = originElement.firstChild;
        }
        else if(originElement.nodeName == 'SPAN') {
            type = originElement.parentNode.getAttribute('type');
        }
        
        console.log(originElement);
        console.log(originElement.innerHTML);
        

        switch(type) {

            case 'year': 
                this.pointDepart.annee = originElement.innerHTML;
                break;

            case 'month':
                this.pointDepart.mois = originElement.innerHTML;
                break;

            case 'day':
                this.pointDepart.jour = originElement.innerHTML;
                break;
        }

        console.log(this.pointDepart);
        
    }

    /**
     * Modéliser l'arboresence 
     * 
     * @param {HTMLElement} container Conteneur qui reçoit les éléments de l'arborescense 
     */
    // modelisationArboresence(container) {

    //     // Suppression de tous les éléments du conteneur.
    //     while (container.firstChild) {
    //         container.removeChild(container.firstChild);
    //     }

    //     modelisationArboresenceAnnees(container);





    //     // let articleElement = document.createElement('article');
    //     // articleElement.className = 'flex-container-columns';

    //     // let spanElement = document.createElement('span');
    //     // spanElement.innerHTML = "[JOUR] XX [MOIS]";

    //     // let divImage = document.createElement('div');
        
    //     // let imgElement = document.createElement('img');
    //     // imgElement.src = './pictures/intervalSnapshots/2018/11/15/170000-snapshot.jpg';
    //     // imgElement.className = 'preview-image';

    //     // // Img dans la Div
    //     // divImage.appendChild(imgElement);

    //     // // Span sur Article
    //     // articleElement.appendChild(spanElement);

    //     // // Div dans Article
    //     // articleElement.appendChild(divImage);

    //     // // Article dans le container
    //     // container.appendChild(articleElement);
        
    // }

}

const snapExplorer = new files_explorer();

$(document).ready(() => {

    snapExplorer.getArboresence();

    
    

});





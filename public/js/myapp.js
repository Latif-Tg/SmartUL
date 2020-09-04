function removeExtraSpace(str)
{
    str = str.replace(/[\s]{2,}/g," "); // Enlève les espaces doubles, triples, etc.
    str = str.replace(/^[\s]/, ""); // Enlève les espaces au début
    str = str.replace(/[\s]$/,""); // Enlève les espaces à la fin
    return str;
    //return str.trim();
}

function getNavTitle(str)
{
    data = str.firstElementChild.firstChild.data;
    return removeExtraSpace(data);
}


function refreshListDocs(link) {
    console.log(link);
    $.get(link, function(data) {
        console.log(data);
        $('#liste_docs').html("");
        let docs = data;
        $.each(docs, function(i,value) {
            console.log(value);
            let div1 = document.createElement('div');
            div1.classList.toggle("row");
            div1.classList.toggle("pl-5");

            let div2 = document.createElement('div');
            div2.classList.toggle("mt-5");

            let div3 = document.createElement('div');
            div3.classList.toggle("row");

            /**corps du document */
            /**icon */
            let img = document.createElement('img');
            img.setAttribute("src",'/images/icons/icon-doc.png');
            img.setAttribute("height","160px");
            img.setAttribute("width","150px");

            /**Description du document */
            let subdiv = document.createElement('div');
            /**Document keyword */
            let keywords = value.keyword;
            words = keywords.split('_');
            /**titre du document */
            let title = document.createElement('span');
            title.classList.toggle("text-dark");
            title.classList.toggle("strong");
            let titlespan = document.createElement('span');
            titlespan.classList.toggle("text-danger");
            titlespan.classList.toggle("h6");
            titlespan.classList.toggle("ml-3");

            let titleText = document.createTextNode("Titre: ");
            let titleValue = document.createTextNode(value.title);

            title.appendChild(titleText);
            titlespan.appendChild(titleValue);
            /**Domaine du document */
            let domaine = document.createElement('span');
            domaine.classList.toggle("text-dark");
            domaine.classList.toggle("strong");
            let domainespan = document.createElement('span');
            domainespan.classList.toggle("text-dark");
            domainespan.classList.toggle("h6");
            domainespan.classList.toggle("ml-3");

            let domaineText = document.createTextNode("Domaine: ");
            let domainespanValue = document.createTextNode(words[2]);

            domaine.appendChild(domaineText);
            domainespan.appendChild(domainespanValue);
            /**Auteur du document */
            let author = document.createElement('span');
            author.classList.toggle("text-dark");
            author.classList.toggle("strong");
            let authorspan = document.createElement('span');
            authorspan.classList.toggle("text-danger");
            authorspan.classList.toggle("h6");
            authorspan.classList.toggle("ml-3");

            let authorText = document.createTextNode("Auteur: ");
            let authorValue = document.createTextNode(value.author);

            author.appendChild(authorText);
            authorspan.appendChild(authorValue);
            /**Type de document */
            let type = document.createElement('span');
            type.classList.toggle("text-dark");
            type.classList.toggle("strong");
            let typespan = document.createElement('span');
            typespan.classList.toggle("text-dark");
            typespan.classList.toggle("h6");
            typespan.classList.toggle("ml-3");

            let typeText = document.createTextNode("Type: ");
            let typespanValue = document.createTextNode(words[1]);

            type.appendChild(typeText);
            typespan.appendChild(typespanValue);
            /**Lien de détails du document */
            linkDetail = document.createElement('a');
            linkDetail.setAttribute("href",'get-document-details/'+value.id)
            linkDetail.classList.toggle("text-primary");
            linkText = document.createTextNode("Détails");
            linkDetail.appendChild(linkText);
            /**construction du dom d'un document */
            //Titre du document
            subdiv.appendChild(title);
            subdiv.appendChild(titlespan);
            subdiv.appendChild(document.createElement('br'));
            //Domaine
            subdiv.appendChild(domaine);
            subdiv.appendChild(domainespan);
            subdiv.appendChild(document.createElement('br'));
            //Auteur
            subdiv.appendChild(author);
            subdiv.appendChild(authorspan);
            subdiv.appendChild(document.createElement('br'));
            //Type
            subdiv.appendChild(type);
            subdiv.appendChild(typespan);
            subdiv.appendChild(document.createElement('br'));
            //Lien de détails
            subdiv.appendChild(linkDetail);
            subdiv.appendChild(document.createElement('hr'));


            div3.appendChild(img);
            div3.appendChild(subdiv);

            /*let div4 = document.createElement('div');
            div4.classList.toggle("col-lg-6");
            div4.classList.toggle("col-xs-9");*/
            let br = document.createElement('br');

            div2.appendChild(div3);
            div2.appendChild(br);

            div1.appendChild(div2);
            console.log(value.title);

            $('#liste_docs').append(div1);
        });
    });
}

function sortByType(data) {
    let nav = document.getElementById('nav-type');
    nav.innerHTML = '';
    let span = document.createElement('span');
    let spanText = document.createTextNode(data);
    span.appendChild(spanText);

    let subspan = document.createElement('span');
    let subspanText = document.createTextNode(' ');
    subspan.appendChild(subspanText);

    let button = document.createElement('button');
    let buttonText = document.createTextNode('x');
    button.appendChild(buttonText);
    button.addEventListener('click', function() {
        span.classList.toggle("hide");
    },false);

    button.className = "badge badge-pill badge-danger pl-1";
    span.className = "badge badge-pill badge-secondary h1";
    span.id = data + "Id";
    span.appendChild(subspan);
    span.appendChild(button);
    nav.appendChild(span);
    let domaine = getNavTitle(document.getElementById('nav-domaine'));
    let year = getNavTitle(document.getElementById('nav-year'));
    link ='get-documents-by-criteria/'+ data +'/'+ domaine +'/'+ year ;

    refreshListDocs(link);

}

function sortByDomaine(data) {
    let nav = document.getElementById('nav-domaine');
    nav.innerHTML = '';
    let span = document.createElement('span');
    let spanText = document.createTextNode(data);
    span.appendChild(spanText);

    let subspan = document.createElement('span');
    let subspanText = document.createTextNode(' ');
    subspan.appendChild(subspanText);

    let button = document.createElement('button');
    let buttonText = document.createTextNode('x');
    button.appendChild(buttonText);
    button.addEventListener('click', function() {
        span.classList.toggle("hide");
    },false);

    button.className = "badge badge-pill badge-danger pl-1";
    span.className = "badge badge-pill badge-secondary h1";
    span.id = data + "Id";
    span.appendChild(subspan);
    span.appendChild(button);
    nav.appendChild(span);
    
    let type = getNavTitle(document.getElementById('nav-type'));
    let year = getNavTitle(document.getElementById('nav-year'));
    link ='get-documents-by-criteria/'+ type +'/'+ data +'/'+ year;

    refreshListDocs(link);
}

function sortByYear(data) {
    let nav = document.getElementById('nav-year');
    nav.innerHTML = '';
    let span = document.createElement('span');
    let spanText = document.createTextNode(data);
    span.appendChild(spanText);

    let subspan = document.createElement('span');
    let subspanText = document.createTextNode(' ');
    subspan.appendChild(subspanText);

    let button = document.createElement('button');
    let buttonText = document.createTextNode('x');
    button.appendChild(buttonText);
    button.addEventListener('click', function() {
        span.classList.toggle("hide");

    },false);

    button.className = "badge badge-pill badge-danger pl-1";
    span.className = "badge badge-pill badge-secondary h1";
    span.id = data + "Id";
    span.appendChild(subspan);
    span.appendChild(button);
    nav.appendChild(span);

    let type = getNavTitle(document.getElementById('nav-type'));
    let domaine = getNavTitle(document.getElementById('nav-domaine'));
    link ='get-documents-by-criteria/'+ type +'/'+ domaine +'/'+ data;

    refreshListDocs(link);
}

function hideAllType() {
    $('#all-type').fadeOut(2000);
}

function hideAllDomaine() {
    $('#all-domaine').fadeOut(2000);
}

function hideAllYear() {
    $('#all-year').fadeOut(2000);
}

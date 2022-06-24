let path = window.location.pathname;
let splitted = path.split("/");
var annee = splitted[3];
var matiere = splitted[5];
console.log(splitted);
var section = splitted[7] + "/" + splitted[8] + "/images";
console.log(section);

//var page = path.split("/").pop().split(".")[0];
var sources = [];
var indice = 0;

let numberOfParents = 6;
let parents = "../".repeat(numberOfParents);
var allFilesInDirectory = parents + "php/allFilesInDirectory.php";

window.onload = function(){

    //var annee = document.body.id;
    var img = document.getElementById("show");
    var right = document.getElementById("right_arrow");
    var left = document.getElementById("left_arrow");
    var bigSun = document.getElementById("more_opacity");
    var littleSun = document.getElementById("less_opacity");
    var parent = document.getElementById("image_container");
    var checkBox = parent.firstElementChild;

    function imageUploader(){
        let form = document.getElementsByTagName("form")[0];
        let inputName = form.firstElementChild.name;
        let formAction = parents + "php/upload.php?annee=" + annee + "&matiere=" + matiere + "&section=" + section + "&inputName=" + inputName;
        form.action = formAction;
    }

    function setSources(){
        new simpleAjax(allFilesInDirectory,
            "post",
            "annee="+annee+"&matiere="+matiere+"&section="+section,
            function(request){
                //console.log(request.responseText);
                sources = JSON.parse(request.responseText);
                console.log(sources);
                setFirstImage();
            },
            function(){}
        )
    }

    function setFirstImage(){
        right.onclick = nextImage;
        left.onclick =  previousImage;
        img.style.opacity = 1;
        if(sources.length!=0){
            img.src = sources[0];
        }
    }

    function nextImage(){
        indice++;
        if(indice>=sources.length){
            indice = 0;
        }
        img.src = sources[indice];
    }

    function previousImage(){
        indice--;
        if(indice<0){
            indice = sources.length - 1;
        }
        img.src = sources[indice];
    }

    function moreLuminosity(){
        let bonus = 0.1;
        if(parseFloat(img.style.opacity) + bonus > 1){
            bonus = 0;
        }
        img.style.opacity = parseFloat(img.style.opacity) + bonus;
        console.log(img.style.opacity);
    }

    function lessLuminosity(){
        let malus = 0.1;
        if(parseFloat(img.style.opacity) - malus < 0.1){
            malus = 0;
        }
        img.style.opacity = parseFloat(img.style.opacity) - malus;
    }

    function resizeParentOnZoom(){
        if(parent.firstElementChild.checked){
            parent.style.marginRight = "30%";
            parent.style.marginLeft = "30%";
            console.log("yo");
        }
        else{
            parent.style.marginRight = "0";
            parent.style.marginLeft = "35%";
        }
    }
    checkBox.onchange = resizeParentOnZoom;
    setSources();
    imageUploader();
    bigSun.onclick = moreLuminosity;
    littleSun.onclick = lessLuminosity;
}
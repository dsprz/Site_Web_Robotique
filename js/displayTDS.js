import {aClick} from "./qol.js";
var path = window.location.pathname;
var splitted = path.split("/");
var matiere = splitted[splitted.length - 2];
var dirs = [];

let numberOfParents = 3;
var parents = "../".repeat(numberOfParents);
var allTDS = parents + "php/allTDS.php";
var getTDPage = parents + "php/getTDPage.php";

window.onload = function(){

    var annee = document.body.id;

    function displayTDS(){
        new simpleAjax(allTDS,
            "post",
            "annee="+annee+"&matiere="+matiere,
            function(request){
                dirs = JSON.parse(request.responseText);
                for(let i = 0; i < dirs.length; i++){
                    createTD(dirs[i]);
                }
            },
            function(){}
        );
    }

    function createTD(url){
        var td = url.split("/").pop();
        console.log(td);
        new simpleAjax(getTDPage,
            "post",
            "matiere="+matiere+"&annee="+annee+"&td="+td,
            function(request){
                let page = JSON.parse(request.responseText)[1].split("/").pop();
                //console.log("../../"+url+"/"+page);
                let TD_Page = "../../" + url + "/" + page;
                let ul = document.getElementsByTagName("ul")[0];
                let li = document.createElement("li");
                let a = document.createElement("a");
                let span = document.createElement("span");
        
                a.setAttribute("href", TD_Page);
                span.innerHTML = td;
                a.appendChild(span);
                li.appendChild(a);
                ul.appendChild(li);

                li.onclick = aClick;
            },
            function(){}
        );
    }
    displayTDS();
    console.log("yo");
}
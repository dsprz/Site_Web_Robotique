import {aClick} from "./qol.js";
var path = window.location.pathname;
var splitted = path.split("/");
var section = splitted.pop().split(".")[0];
var annee = splitted[splitted.length - 3];
var matiere = splitted[splitted.length - 1];
var sources = [];
//parents jusqu'au dossier php
let numberOfParents = 3;
var parents = "../".repeat(numberOfParents);
var allFilesInDirectory = parents + "php/allFilesInDirectory.php";

window.onload = function(){

    function setSources(){
        new simpleAjax(allFilesInDirectory,
            "post",
            "annee="+annee+"&matiere="+matiere+"&section="+section,
            function(request){
                //console.log(request.responseText);
                sources = JSON.parse(request.responseText);
                //console.log(sources);
                for(let i = 0; i < sources.length; i++){
                    displayCourses(sources[i]);
                }

                let lis = document.getElementsByTagName("li");
                for(let i = 0; i < lis.length; i++){
                    lis[i].onclick = aClick;
                }
            },
            function(){}
        );

    }

    function displayCourses(url){
        let name = url.split("/").pop();
        let isPdf = name.split(".").pop() === "pdf";
        let ul = document.getElementsByTagName("ul")[0];
        let li = document.createElement("li");
        let a = document.createElement("a");
        let span = document.createElement("span");

        a.setAttribute("href", url);
        a.setAttribute("target", "_blank");
        span.innerHTML = name;
        a.appendChild(span);
        li.appendChild(a);
        ul.appendChild(li);

        if(isPdf){
            li.setAttribute("class", "pdf");
        }
    }

    setSources();
    //setInterval(function(){console.log(document.getElementsByTagName("form")[0].firstElementChild.value)}, 1000);
}
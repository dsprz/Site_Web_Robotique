//Affiche tous les cours dans la page N-ième_annee

var dirs = [];
import {aClick} from "./qol.js";

window.onload = function(){

    var annee = document.body.id;

    function displayCourses(){
        new simpleAjax("../php/allCourses.php",
            "post",
            "annee="+annee,
            function(request){
                dirs = JSON.parse(request.responseText);
                for(let i = 0; i < dirs.length; i++){
                    createCourse(dirs[i]);
                }
            },
            function(){}
        );
    }

    function createCourse(url){
        var course = url.split("/").pop();
        //console.log(course);
        new simpleAjax("../php/getCoursePage.php",
            "post",
            "course="+course+"&annee="+annee,
            function(request){
                let page = JSON.parse(request.responseText)[0].split("/").pop();
                let coursePage = url+"/page/"+page;
                let ul = document.getElementsByTagName("ul")[0];
                let li = document.createElement("li");
                let a = document.createElement("a");
                let span = document.createElement("span");
        
                a.setAttribute("href", coursePage);
                span.innerHTML = course;
                a.appendChild(span);
                li.appendChild(a);
                ul.appendChild(li);

                li.onclick = aClick;
            }
        )
    }
    displayCourses();
}
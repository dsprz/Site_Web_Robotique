window.onload = function(){

    function clickedLi(){
        this.firstChild.click();
    }

    function underline(){
        let a = this.firstChild
        a.style.textDecoration = "underline";
        a.style.textDecorationColor = "white";
    }

    function noUnderline(){
        let a = this.firstChild;
        a.style.textDecoration = "none";
    }

    var lis = document.getElementsByTagName("li");
    for(let i = 0; i < lis.length; i++){
        lis[i].onclick = clickedLi;
        lis[i].onmouseover = underline;
        lis[i].onmouseout = noUnderline;
    }
}
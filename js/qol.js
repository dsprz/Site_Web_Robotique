export function aClick(){
    this.firstChild.click();
}

window.onload = function(){
    var lis = document.getElementsByTagName("li");
    for(let i = 0; i < lis.length; i++){
        lis[i].onclick = aClick;
    }
}
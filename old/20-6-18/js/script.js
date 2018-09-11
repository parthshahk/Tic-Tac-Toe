function initializeCells(id,type){

    var cellInstances = document.querySelectorAll(".cell");

    if(type == 'creator'){

        var i=0;
        while(cellInstances[i]){
            cellInstances[i].classList.add("hiddenX");
            cellInstances[i].addEventListener("click", revealX);
            i++;
        }

    }else{

        var i=0;
        while(cellInstances[i]){
            cellInstances[i].classList.add("hiddenO");
            cellInstances[i].addEventListener("click", revealO);
            i++;
        }

    }

}

function revealX(){
    this.classList.remove("hiddenX");
    this.classList.add("x");
    sendBoard();
}

function revealO(){
    this.classList.remove("hiddenO");
    this.classList.add("o");
    sendBoard();
}

function sendBoard(){

    var xInstances = document.querySelectorAll(".x");
    var oInstances = document.querySelectorAll(".o");

    var i=0;
    var xStr = '';
    while(xInstances[i]){
        xStr += xInstances[i].id;
        i++
    }

    var j=0;
    var oStr = '';
    while(xInstances[i]){
        oStr += xInstances[i].id;
        i++
    }
    

    
    



}
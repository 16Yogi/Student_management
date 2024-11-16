function datefun(){
    let date = new Date();
    document.getElementById("date").innerHTML=date.getDate()+"/"+date.getMonth()+"/"+date.getFullYear(); 
}
datefun();
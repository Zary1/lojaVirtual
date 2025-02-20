document.addEventListener('DOMContentLoaded',()=>{
   var index=0
   carrosel()
    function carrosel(){
        var x= document.getElementsByClassName('mySlides')
        for(var i=0;i<x.length;i++){
            x[i].style.display="none"

        }
        index ++;
        if(index > x.length){
            index=1
        }
x[index-1].style.display="block"
setTimeout(carrosel,3000)
    }


   
   

})
 // administrador 
document.getElementById("utente").addEventListener("click",()=>{
    document.getElementById('show_users').classList.toggle('hidden')
})
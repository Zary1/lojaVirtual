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


    document.getElementById("colecao").addEventListener("click",()=>{
        var pro_end_new=document.getElementById("pro_end_new")
        pro_end_new.scrollIntoView({behavior:"smooth"})
     
     })
  
     document.getElementById("promocao").addEventListener("click",()=>{
        var pro_end_new=document.getElementById("pro_end_new")
        pro_end_new.scrollIntoView({behavior:"smooth"})
     
     })
   
     document.getElementById("categoria").addEventListener("click",()=>{
        var categorias=document.getElementById("categorias")
        categorias.scrollIntoView({behavior:"smooth"})
     
     })
     document.getElementById("contacto").addEventListener("click",()=>{
        var categorias=document.getElementById("contactos")
        categorias.scrollIntoView({behavior:"smooth"})
     
     })
   
     document.getElementById("enviar").addEventListener("click",(event)=>{
        event.preventDefault();
        var input_send=document.getElementById("send")
        var paragrafo=document.getElementById("paragrafo")
        if(input_send.value.trim()===""){
            paragrafo.innerText = "Insira o email";
    
        }
        else{
     paragrafo.innerText="Obrigada pelo seu email"
     input_send.value="";
        }
       
    })
})
 // administrador 
document.getElementById("utente").addEventListener("click",()=>{
    document.getElementById('show_users').classList.toggle('hidden')
})



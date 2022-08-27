
// const a=document.querySelectorAll('ul li a');

// for (var i = 0; i < a.length; i++) {
//     a[i].addEventListener("click", function() {
//         var current = document.getElementsByClassName("active");
//         current[0].className = current[0].className.replace("active", "");
//         this.className += " active";
//     });
// }

const input=document.querySelectorAll('input')
const butt=document.querySelector('.sub');

input.forEach(element=>{
    element.addEventListener('keyup',()=>{
        
        if (element.value.length === 0) {
            // console.log('===0');
            butt.setAttribute('disabled','disabled')
            butt.style.backgroundColor=' rgb(144, 166, 245)';
        }else{
            // console.log('!==0');
            butt.removeAttribute('disabled');
            butt.style.backgroundColor='rgb(33, 72, 214)';
        }

    })
})

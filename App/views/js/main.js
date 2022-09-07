
// administrateuur
const navLeft=document.querySelectorAll('.dashbord-user .nav-left ul li')
for (var i = 0; i < navLeft.length; i++) {
    navLeft[i].addEventListener("click", function() {
        var current = document.getElementsByClassName("nav-ac");
        current[0].className = current[0].className.replace("nav-ac", "");
        this.className += "nav-ac";
    });
}

setInterval(() => {
    
    const contentprof=document.querySelector('.content-right-profile')
    const contentart=document.querySelector('.content-right-article')
    const current = document.getElementsByClassName("nav-ac");
    // console.log(current[0].textContent);
    if (current[0].textContent=="Article Management") {
        contentart.style.display="block";
        contentprof.style.display="none";
    }else{
        // console.log('false');
        contentart.style.display="none";
        contentprof.style.display="block";
    }
}, 50);

const forms=document.querySelectorAll('form input');
const but=document.querySelector('form .up');
forms.forEach(element => {
    element.addEventListener('keyup',()=>{
        if (element.value !=="") {
            but.removeAttribute('disabled')
            but.style.backgroundColor="green"
        }
        if (element.value ==="") {
            but.setAttribute('disabled',"disabled")
            but.style.backgroundColor="rgb(101, 186, 101)"
        }

    })
});
const formEditePic=document.querySelector('.imgs-name form')
const editPic=document.getElementById('EditePic');
const file=document.getElementById('file');
editPic.addEventListener('click',(e)=>{e.preventDefault();file.click();})
file.addEventListener('change',()=>{formEditePic.submit()})

// addArticle

const ajouter=document.querySelector('.title-ajou a')
const add=document.querySelector('.addArticle')

ajouter.addEventListener('click',()=>{
    add.style.display="block";
    // console.log('clicked');
})

const back=document.querySelector('.addArticle form table tr td i')
back.addEventListener('click',()=>{
    window.history.back();
})


const input=document.querySelectorAll('.addArticle form input')
const butt=document.querySelector('.addArticle form .sub');

input.forEach(element=>{
    element.addEventListener('keyup',()=>{
        
        if (element.value.length === 0) {
            // console.log('===0');
            butt.setAttribute('disabled','disabled')
            butt.style.backgroundColor=' rgb(144, 166, 245)';
        }else{
            // console.log('!==0');
            butt.removeAttribute('disabled');
            butt.style.backgroundColor='blue';
        }

    })
})


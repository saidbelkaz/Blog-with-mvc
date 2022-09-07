// dashbord 
const h1=document.getElementById('h1')
const form=document.querySelector('.users-manag form')

h1.addEventListener('click',()=>{
    form.style.display="block";
    // console.log('clicked');
})
h1.addEventListener('dblclick',()=>{
    form.style.display="none";
    // console.log('clicked');
})

// const Edit=document.querySelectorAll('.btn-edit')
// const formss=document.querySelector('.edit-user form')

// Edit.forEach(element => {
//     element.addEventListener('click',(e)=>{
//     e.preventDefault();
//     formss.style.display="block";
//     console.log('clicked');
//     e.submit();})
// });

// Edit.addEventListener('click',(e)=>{
//     e.preventDefault();
//     formss.style.display="block";
//     console.log('clicked');
//     e.submit();
// })


const naLeft=document.querySelectorAll('.nav-left ul li')
naLeft.forEach(eva =>{
    eva.addEventListener('click',()=>{
    var current = document.getElementsByClassName("nav-act");
    current[0].className = current[0].className.replace("nav-act", "");
    eva.className += "nav-act";
    // console.log('eva clicked');
})});

setInterval(() => {
    
    const current1 = document.getElementsByClassName("nav-act");
    if (current1[0].textContent ==="Article Management") {
        document.querySelector('.article-manag').style.display='block';
        document.querySelector('.users-manag').style.display='none';
        // console.log('==');
    }else{
        // console.log('!==');
        document.querySelector('.article-manag').style.display='none';
        document.querySelector('.users-manag').style.display='block';
    }
}, 50);

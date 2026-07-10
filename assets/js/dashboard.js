// Notification

const bell=document.getElementById("bell-btn");

const notification=document.getElementById("notification-box");

bell.onclick=function(){

if(notification.style.display=="block"){

notification.style.display="none";

}else{

notification.style.display="block";

profile.style.display="none";

}

}


// Profile

const profileBtn=document.getElementById("profile-btn");

const profile=document.getElementById("profile-menu");

profileBtn.onclick=function(){

if(profile.style.display=="block"){

profile.style.display="none";

}else{

profile.style.display="block";

notification.style.display="none";

}

}


window.onclick=function(e){

if(!e.target.matches('#bell-btn')
&& !e.target.matches('#profile-btn')){

notification.style.display="none";

profile.style.display="none";

}

}

const bell = document.getElementById("notificationBtn");
const box = document.getElementById("notificationBox");

bell.onclick = function(){

    if(box.style.display=="block"){

        box.style.display="none";

    }else{

        box.style.display="block";

    }

}

window.onclick=function(e){

    if(!e.target.matches("#notificationBtn")){

        box.style.display="none";

    }

}

const bell=document.getElementById("bell");

const box=document.getElementById("notificationBox");

bell.onclick=function(e){

e.stopPropagation();

if(box.style.display==="block"){

box.style.display="none";

}else{

box.style.display="block";

}

}

document.addEventListener("click",function(){

box.style.display="none";

});
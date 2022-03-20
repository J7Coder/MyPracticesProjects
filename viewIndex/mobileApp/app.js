         /* Rename this file to jetanim.js when uploading to your website! */
         function jetanim(id="mylogo",dt=2000){
            /* Created with JETA.COM Animated Logo Wizard: https://jeta.com/js-animated-logo.php */
            window.addEventListener("load",function(){
            var logo=document.getElementById(id),style=document.createElement("style");style.type="text/css";
            style.innerHTML="@keyframes jetakey{from{opacity:0;transform:translate3d(100%,0,0)}to{opacity:1;transform:translate3d(0,0,0)}}.jetanim{animation-name:jetakey;animation-timing-function:ease-in;animation-duration:1s;animation-fill-mode:both;z-index:1000}";
            document.head.appendChild(style);set();
            function set(){logo.classList.remove("jetanim");setTimeout(function(){logo.classList.add("jetanim");},100);}
            var move=0;logo.addEventListener("mouseover",function(){if(move==0){move=1;set();setTimeout(function(){move=0;},1000);}});
            var time,timer;rtime();["mousedown","mousemove","keypress","scroll","touchstart"].forEach(function(n){document.addEventListener(n,rtime,true);});
            function rtime(g){(g===1)?time+=time:time=dt;clearTimeout(timer);timer=setTimeout(function(){set();rtime(1);},time);}
            });} jetanim();

            function timeOut(){
                window.location="http://192.168.0.5/Grupos/viewIndex/mobileApp/login.php";
            }

            document.querySelector('body').setAttribute('onload',"setTimeout('timeOut()', 5000)")
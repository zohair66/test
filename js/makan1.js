function bodycontentload() {
    submenu = document.getElementsByClassName("submenu");
    menu = document.getElementsByClassName("menu");
    

    for (i = 0; i < menu.length; i++) {
       // menu[i].removeEventListener("mouseenter");
        submenu[i].style.top = "40%";
        submenu[i].style.left = "47%";
        submenu[i].style.transitionDuration = "1s";
    }

  
    k = 0;

    var myVar = setInterval(function () { movemenu() }, 100);
    function movemenu() {
        menurect = menu[k].getBoundingClientRect();
        submenu[k].style.top = (menurect.top + 40) + 'px';
        submenu[k].style.left = (menurect.left + 40) + 'px';
        submenu[k].style.transform = "scale(1,1)"
        k = k + 1;
        if (k == 6) { clearInterval(myVar); }
    }



    text = document.getElementsByClassName("text");
    setTimeout(initializefunction, 1800);

    function initializefunction() {
        for (i = 0; i < menu.length; i++) {
          
            submenu[i].style.position = 'initial';
            submenu[i].style.transitionDuration = "0s";
            submenu[i].style.transform = "translate(-40px,40px)";
            text[i].style.opacity = "1";
            
        }
    }


        //var delay = 1500;//1.5 seconds
        //setTimeout(function () {
        //    $('.submenu').css({position: "initial"});
        //}, delay);
}

    function select1() {
        main = menu[0];
        container = submenu[0];
        continerrect = container.getBoundingClientRect(); // get div coordinate
        main.addEventListener("DOMContentLoaded", movefunction(main, container, continerrect));
    }
    function select2() {
        main = menu[1];
        container = submenu[1];
        continerrect = container.getBoundingClientRect(); // get div coordinate
        main.addEventListener("DOMContentLoaded", movefunction(main, container, continerrect));
    }
    function select3() {
        main = menu[2];
        container = submenu[2];
        continerrect = container.getBoundingClientRect(); // get div coordinate
        main.addEventListener("DOMContentLoaded", movefunction(main, container, continerrect));
    }
    function select4() {
        main = menu[3];
        container = submenu[3];
        continerrect = container.getBoundingClientRect(); // get div coordinate
        main.addEventListener("DOMContentLoaded", movefunction(main, container, continerrect));
    }
    function select5() {
        main = menu[4];
        container = submenu[4];
        continerrect = container.getBoundingClientRect(); // get div coordinate
        main.addEventListener("DOMContentLoaded", movefunction(main, container, continerrect));
    }
    function select6() {
        main = menu[5];
        container = submenu[5];
        continerrect = container.getBoundingClientRect(); // get div coordinate
        main.addEventListener("DOMContentLoaded", movefunction(main, container, continerrect));
    }

    function movefunction() {
        firstabsorb = 80;
        inout = 0;
        i = 0;
        //--------------------------------
        main.onmouseout = function (event) {
            container.style.transitionDuration = "0.3s";
            container.style.transform = "translate(-40px,40px)";
            firstabsorb = 80; //first distance for absorbtion
            i = 0;
            inout = 0;
        }
        //------------------------------------
        main.onmousemove = function (event) {
            mousepositionx = event.pageX - continerrect.left - 60;//100px is (div width/2)
            mousepositiony = event.pageY -window.pageYOffset -continerrect.top - 60;//100px is (div height/2)
            var distance = Math.sqrt(Math.pow(mousepositionx, 2) + Math.pow(mousepositiony, 2));
            if (distance < firstabsorb) {
                container.style.transitionDuration = (0.3 + i) + "s";
                container.style.transform = "translate(" + (mousepositionx - 40) + "px," + (mousepositiony + 40) + "px)";//50 is diference between (main and container width/2)
                firstabsorb = 120;
                inout = 1;
                if (i > -0.3) {
                    i = i - 0.06;
                }
                else {
                    i = -0.3;
                }
            }
            else if ((distance > 80) && (distance < 150) && (inout == 0)) {
                container.style.transitionDuration = "0.0s";
                var ramp = mousepositiony / mousepositionx;
                ramp = 15 * (1 / (1 + Math.exp(-ramp)) - 0.5);

                if (mousepositionx >= 0) {
                    var xtransfer = 300 / distance;
                }
                else if (mousepositionx < 0) {
                    var xtransfer = -(300 / distance);
                }
                var ytransfer = xtransfer * ramp;
                container.style.transform = "translate(" + (-40 + xtransfer) + "px," + (40 + ytransfer) + "px)";
            }
            else {
                container.style.transitionDuration = "0.3s";
                container.style.transform = "translate(-40px,40px)";

            }
        }
    }
   





function bodycontentload() {
    submenu = document.getElementsByClassName("submenu");
    menu = document.getElementsByClassName("menu");

    menurect6 = menu[6].getBoundingClientRect();
    menurect7 = menu[7].getBoundingClientRect();
    menurect8 = menu[8].getBoundingClientRect();
    menurect9 = menu[9].getBoundingClientRect();
    menurect10 = menu[10].getBoundingClientRect();
    menurect11 = menu[11].getBoundingClientRect();



    $('#subhome').css({ top: (menurect6.top) + 'px', left: (menurect6.left + 80) });
    $('#subaboutus').css({ top: (menurect7.top) + 'px', left: (menurect7.left + 80) });
    $('#subservice').css({ top: (menurect8.top) + 'px', left: (menurect8.left + 80) });
    $('#subproducts').css({ top: (menurect9.top) + 'px', left: (menurect9.left + 80) });
    $('#subblog').css({ top: (menurect10.top) + 'px', left: (menurect10.left + 80) });
    $('#submail').css({ top: (menurect11.top) + 'px', left: (menurect11.left + 80) });

    menurect0 = menu[0].getBoundingClientRect();
    menurect1 = menu[1].getBoundingClientRect();
    menurect2 = menu[2].getBoundingClientRect();
    menurect3 = menu[3].getBoundingClientRect();
    menurect4 = menu[4].getBoundingClientRect();
    menurect5 = menu[5].getBoundingClientRect();

    $('#subhome').animate({ top: (menurect0.top) + 'px', left: (menurect0.left + 80), width: "120px", height: "120px" }, 400);
    $('#subaboutus').animate({ top: (menurect1.top) + 'px', left: (menurect1.left + 80) + 'px', width: "120px", height: "120px" }, 500);
    $('#subservice').animate({ top: (menurect2.top) + 'px', left: (menurect2.left + 80) + 'px', width: "120px", height: "120px" }, 600);
    $('#subproducts').animate({ top: (menurect3.top) + 'px', left: (menurect3.left + 80) + 'px', width: "120px", height: "120px" }, 700);
    $('#subblog').animate({ top: (menurect4.top) + 'px', left: (menurect4.left + 80) + 'px', width: "120px", height: "120px" }, 800);
    $('#submail').animate({ top: (menurect5.top) + 'px', left: (menurect5.left + 80) + 'px', width: "120px", height: "120px" }, 1000);

    $('#main p').animate({ opacity: "1" }, 2200);

    $('#content').css({ position:"fix",right:"0%" });
    $('#content').animate({ transform: "translate(400px,0px)" }, 2200);

    var delay = 1500;//1.5 seconds
    setTimeout(function () {
        $('.submenu').css({ position: "initial" });
        $('#beforepagemain').css({ display:"none" });
    }, delay);
    content = document.getElementById("content");
    content.style.transform = "translate(0px,0px)";
    content.style.transitionDuration = "2s";
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
        mousepositiony = event.pageY -window.pageYOffset - continerrect.top - 60;//100px is (div height/2)
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






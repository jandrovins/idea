//for zoom detection
let px_ratio = window.devicePixelRatio || window.screen.availWidth / document.documentElement.clientWidth;

window.onresize = isZooming;

$(document).ready(moveFooter);

function isZooming(){
    let newPx_ratio = window.devicePixelRatio || window.screen.availWidth / document.documentElement.clientWidth;
    if(newPx_ratio !== px_ratio){
        px_ratio = newPx_ratio;

        moveFooter();

        return true;
    }else{
        return false;
    }
}

function moveFooter() {
    let rectMain = document.getElementById('main').getBoundingClientRect();
    let rectFoot = document.getElementById('footer').getBoundingClientRect();

    if (rectMain.bottom < rectFoot.top) {
        document.getElementById("footer-pos").classList.remove('rel-bottom');
        document.getElementById("footer-pos").classList.add('sticky-bottom');
    } else {
        document.getElementById("footer-pos").classList.remove('sticky-bottom');
        document.getElementById("footer-pos").classList.add('rel-bottom');
    }
}


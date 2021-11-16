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

// Dom observer, looks for changes in attributes in given element and executes a callback
var observeDOM = (function(){
  var MutationObserver = window.MutationObserver || window.WebKitMutationObserver;

  return function( obj, callback ){
    if( !obj || obj.nodeType !== 1 ) return; 

    if( MutationObserver ){
      // define a new observer
      var mutationObserver = new MutationObserver(callback);

      // have the observer observe foo for changes in children
      mutationObserver.observe( obj, { attributes: true });
      return mutationObserver;
    }
    
    // browser support fallback
    else if( window.addEventListener ){
      obj.addEventListener('DOMNodeInserted', callback, false)
      obj.addEventListener('DOMNodeRemoved', callback, false)
    }
  }
})();

// Move footer on details open
observeDOM(document.querySelector('details.details-example'), moveFooter);

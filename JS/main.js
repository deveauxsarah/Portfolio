function disableRightClick() {
    if (window.location.hostname !== 'localhost') {
        document.addEventListener('contextmenu', function(e) {
            e.preventDefault();
        }, false);
    }
}

window.addEventListener('load', disableRightClick);


// remove draggable attribute from all elements
function removeDraggable() {
    let elements = document.querySelectorAll('*');
    for (let i = 0; i < elements.length; i++) {
        elements[i].removeAttribute('draggable');
    }
}

// disable F12 key if not localhost
function disableF12() {
    // if (window.location.hostname !== 'localhost') {
        document.addEventListener('keydown', function(e) {  // keydown event
            if (e.keyCode === 123) { // if F12
                e.preventDefault();
                alert('F12 is disabled');
            }   // prevent default action
        } , false);
    // }
}

window.addEventListener('load', disableF12);

// disable copy paste
function disableCopyPaste() {
    document.addEventListener('copy', function(e) {
        e.preventDefault();
    } , false);
}

window.addEventListener('load', disableCopyPaste);

const boxes = document.querySelectorAll('.section__container');
window.addEventListener('scroll', checkBoxes);

function checkBoxes() {
    const triggerBottom = window.innerHeight / 5 * 4;
    boxes.forEach(function(box) {
        const boxTop = box.getBoundingClientRect().top;
        if (boxTop < triggerBottom) {
            box.classList.add('show');
        } else {
            box.classList.remove('show');
        }
    });
}
const images = document.querySelectorAll('.photos__card img');
const interval = 2000; 
const agrandissementDuree = 200; 


function agrandirImage(imageIndex) {
  if (imageIndex < images.length) {
    images[imageIndex].style.transition = 'transform 0.5s';
    images[imageIndex].style.transform = 'scale(1.2)';
    setTimeout(() => {
      images[imageIndex].style.transform = 'scale(1)'; 
    }, agrandissementDuree); 

    setTimeout(() => {
      agrandirImage(imageIndex + 1); 
    }, interval); 
  }
  if (imageIndex==3){

    agrandirImage(0);
  }
}

agrandirImage(0); 


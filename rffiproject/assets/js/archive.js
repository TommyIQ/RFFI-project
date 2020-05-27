const toggleArchiveElement = (containerSel, elementSel, triggerSel, triggerAdditionalClass, changedElemSel, changedElemAdditionalClass) => {
  // getting the nearest parent node that has the same selector
  const getClosest =  (elem, selector) => {
    for ( ; elem && elem !== document; elem = elem.parentNode ) {
      if ( elem.matches( selector ) ) return elem;
    }
    return null;
  };

  // container element
  const container = document.querySelector(containerSel);

  // if container is not null
  if(container) {

    container.addEventListener('click', (e) => {
      // if target is not trigger
      if(!e.target.closest(triggerSel)) return;
      
      // certain clicked target-item
      const clickedTarget = getClosest(e.target, elementSel);
      // children of item
      const elems = clickedTarget.children;    
      
      // all items in container
      const items = container.children;
  
      // removing additional classess from each item except clicked item
      for(let i = 0; i < items.length; i++) {
        if(items[i] !== clickedTarget) {
          for(let j = 0; j < items[i].children.length; j++) {
            items[i].children[j].classList.remove(triggerAdditionalClass);
            items[i].children[j].classList.remove(changedElemAdditionalClass);
          }
        }
      }
  
      // searching for clicked item in container children and toggle additional classes for child nodes
      for(let i = 0; i < elems.length; i++) {
        if (elems[i].classList.contains(triggerSel.slice(1))) {
          elems[i].classList.toggle(triggerAdditionalClass);
        }
        
        else if(elems[i].classList.contains(changedElemSel.slice(1))) {
          elems[i].classList.toggle(changedElemAdditionalClass);
        }
      }
  
    });

  }

};

toggleArchiveElement('.archive__lection', '.archive__item', '.archive__preview', 'archive__preview-active', '.archive__content', 'archive__content-active');
toggleArchiveElement('.archive__research', '.archive__item', '.archive__preview', 'archive__preview-active', '.archive__content', 'archive__content-active');
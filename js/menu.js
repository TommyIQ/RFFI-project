const toggleMenu = (triggerSel, menuSel, menuElemSel, additionalMenuClass, additionalTriggerClass, additionalTriggerElemClass) => {

  function setClasses() {
    menu.classList.toggle(additionalMenuClass);
    trigger.classList.toggle(additionalTriggerClass);

    const triggerElements = trigger.children;
    
    for(let i = 0; i < triggerElements.length; i++) {
      triggerElements[i].classList.toggle(additionalTriggerElemClass);
    }
  }

  const trigger = document.querySelector(triggerSel);
  const menu = document.querySelector(menuSel);

  trigger.addEventListener('click', (e) => {
    setClasses();
  });

  menu.addEventListener('click', (e) => {
    if(!e.target.closest(menuElemSel)) return;

    setClasses();
  });
};


toggleMenu('.header__burger', '.header__menu', '.header__menu-item', 'header__menu-active', 'header__burger-active', 'header__burger-elem-active');
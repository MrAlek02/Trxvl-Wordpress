const accordion = () => {
  const accordions = document.querySelectorAll(".js-accordion");

  accordions.forEach((accordion) => {
    const accordionHeader = accordion.querySelector(".js-accordion-header")! as HTMLElement;
    const accordionBody = accordion.querySelector(".js-accordion-body")! as HTMLElement;
    const accordionBodyInner = accordion.querySelector(".js-accordion-body-inner")! as HTMLElement;

    accordionHeader.addEventListener("click", () => {
      if (accordion.classList.contains("active")) {
        accordion.classList.remove("active");
        accordionBody.style.height = "0px";
      } else {
        accordion.classList.add("active");
        const accordionBodyInnerBounds = accordionBodyInner.getBoundingClientRect();
        const accordionBodyInnerHeight = accordionBodyInnerBounds.height;
        accordionBody.style.height = `${accordionBodyInnerHeight}px`;
      }
    });
  });
};

export default accordion;

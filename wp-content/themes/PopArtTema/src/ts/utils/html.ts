// @ts-nocheck
export const getParents = (elem) => {
  let parents = [];

  for (; elem && elem !== document; elem = elem.parentNode) {
    parents.push(elem);
  }

  return parents;
};

export const queryClosestParent = (elem, selector) => {
  if (!Element.prototype.matches) {
    Element.prototype.matches =
      Element.prototype.matchesSelector ||
      Element.prototype.mozMatchesSelector ||
      Element.prototype.msMatchesSelector ||
      Element.prototype.oMatchesSelector ||
      Element.prototype.webkitMatchesSelector ||
      function (s) {
        var matches = (this.document || this.ownerDocument).querySelectorAll(s),
          i = matches.length;
        while (--i >= 0 && matches.item(i) !== this) {}
        return i > -1;
      };
  }

  for (; elem && elem !== document; elem = elem.parentNode) {
    if (elem.matches(selector)) return elem;
  }
  return null;
};

export const setActiveClassToItemFromArray = (items, index) => {
  items.forEach((item, itemIndex) => {
    if (itemIndex === index) {
      item.classList.add('active');
    } else {
      item.classList.remove('active');
    }
  });
};

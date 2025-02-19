//@ts-nocheck

const navigation = () => {
	const btn = document.querySelector(".js-hamburger");
	const header = document.querySelector(".js-header");
	const navigationWrapper = document.querySelector(".js-navigation-wrapper");

	if (!header || !btn || !navigationWrapper) return;

	btn.addEventListener("click", () => {
		header.classList.toggle("open");
		document.documentElement.classList.toggle("open");
	});

	document.addEventListener("click", (e) => {
		if (!navigationWrapper.contains(e.target) && e.target !== btn) {
			header.classList.remove("open");
			document.documentElement.classList.remove("open");
		}
	});

  let prevPosY = window.scrollY;
  if (window.scrollY > 10) {
    header.classList.add("not-top");
  }

  addEventListener("scroll", () => {
    const posY = window.scrollY;
    if (posY < 10) {
      header.classList.remove("not-top");
    } else {
      header.classList.add("not-top");
    }
    if (posY <= prevPosY || posY <= 0) {
      header.classList.remove("hide");
    } else {
      header.classList.add("hide");
    }
    prevPosY = posY;
  });
};

export default navigation;
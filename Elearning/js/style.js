window.onscroll = function () {
  const nav = document.querySelector(".navbar");
  nav.classList.toggle("sticky", scrollY > 0);
};



///////////////////////////////////////////////////////////
// Set current year
const yearEl = document.querySelector(".year");
const currentYear = new Date().getFullYear();
yearEl.textContent = currentYear;

///////////////////////////////////////////////////////////
// Make mobile navigation work

const btnNavEl = document.querySelector(".btn-mobile-nav");
const headerEl = document.querySelector(".header");

btnNavEl.addEventListener("click", function () {
  headerEl.classList.toggle("nav-open");
});

///////////////////////////////////////////////////////////
// Smooth scrolling animation

document.querySelector(".hero").addEventListener("click", function (e) {
  e.preventDefault();
  // Matching strategy
  if (e.target.classList.contains("btn")) {
    /* HTML:  <a class="nav__link" href="#section--1">Features</a> */
    const id = e.target.getAttribute("href");
    document.querySelector(id).scrollIntoView({ behavior: "smooth" });
  }
});

document.querySelector(".nav__links").addEventListener("click", function (e) {
  e.preventDefault();
  // Matching strategy
  if (e.target.classList.contains("nav__link")) {
    /* HTML:  <a class="nav__link" href="#section--1">Features</a> */
    const id = e.target.getAttribute("href");
    document.querySelector(id).scrollIntoView({ behavior: "smooth" });
    // Close mobile navigation
    headerEl.classList.toggle("nav-open");
  }
});

///////////////////////////////////////////////////////////
// Sticky navigation

const section_hero = document.querySelector(".section-hero");
const nav = document.querySelector(".nav");
const navHeight = nav.getBoundingClientRect().height;

const stickyNav = function (entries) {
  const [entry] = entries;
  // console.log(entry);

  if (!entry.isIntersecting) document.body.classList.add("sticky");
  else document.body.classList.remove("sticky");
};

const headerObserver = new IntersectionObserver(stickyNav, {
  root: null,
  threshold: 0,
  rootMargin: `-${navHeight}px`,
});

headerObserver.observe(section_hero);

///////////////////////////////////////
// Slider
const slider = function () {
  const slides = document.querySelectorAll(".slide");
  const btnLeft = document.querySelector(".slider__btn--left");
  const btnRight = document.querySelector(".slider__btn--right");
  const dotContainer = document.querySelector(".dots");

  let curSlide = 0;
  const maxSlide = slides.length;

  // Functions
  const createDots = function () {
    slides.forEach(function (_, i) {
      dotContainer.insertAdjacentHTML(
        "beforeend",
        `<button class="dots__dot" data-slide="${i}"></button>`
      );
    });
  };

  const activateDot = function (slide) {
    document
      .querySelectorAll(".dots__dot")
      .forEach((dot) => dot.classList.remove("dots__dot--active"));

    document
      .querySelector(`.dots__dot[data-slide="${slide}"]`)
      .classList.add("dots__dot--active");
  };

  const goToSlide = function (slide) {
    slides.forEach(
      (s, i) => (s.style.transform = `translateX(${100 * (i - slide)}%)`)
    );
  };

  // Next slide
  const nextSlide = function () {
    if (curSlide === maxSlide - 1) {
      curSlide = 0;
    } else {
      curSlide++;
    }

    goToSlide(curSlide);
    activateDot(curSlide);
  };

  const prevSlide = function () {
    if (curSlide === 0) {
      curSlide = maxSlide - 1;
    } else {
      curSlide--;
    }
    goToSlide(curSlide);
    activateDot(curSlide);
  };

  const init = function () {
    goToSlide(0);
    createDots();

    activateDot(0);
  };
  init();

  // Event handlers
  btnRight.addEventListener("click", nextSlide);
  btnLeft.addEventListener("click", prevSlide);

  document.addEventListener("keydown", function (e) {
    if (e.key === "ArrowLeft") prevSlide();
    e.key === "ArrowRight" && nextSlide();
  });

  dotContainer.addEventListener("click", function (e) {
    if (e.target.classList.contains("dots__dot")) {
      // BUG in v2: This way, we're not keeping track of the current slide
      // when clicking on a slide
      // const { slide } = e.target.dataset;

      curSlide = Number(e.target.dataset.slide);
      goToSlide(curSlide);
      activateDot(curSlide);
    }
  });
};
slider();

///////////////////////////////// SUBMIT FORM ////////////////////////////////////////////
const btn_submit = document.querySelector("#btn_submit");
const message = document.querySelector(".form__message");

const handleSubmit = async (e) => {
  e.preventDefault();

  message.classList.remove("success");
  message.classList.remove("error");
  const form_name = document.querySelector("#full-name");
  const form_email = document.querySelector("#email");
  const form_body = document.querySelector("#body");
  // const captcha_response = grecaptcha.getResponse();
  try {
    /*  if (!captcha_response) {
      throw new Error(
        "Παρακαλούμε επιβεβαιώστε ότι δεν είστε κακόβουλος χρήστης!"
      );
    }
    */
    const response = await fetch("/mail", {
      method: "POST",
      body: JSON.stringify({
        name: form_name.value,
        email: form_email.value,
        body: form_body.value,
      }),
    });

    if (!response.ok)
      throw new Error("Κάτι δεν πήγε καλά... Παρακαλούμε δοκιμάστε ξανά!");

    message.textContent = `Σας ευχαριστούμε! Το μήνυμά σας εστάλη!`;
    message.classList.add("success");
    form_name.value = "";
    form_email.value = "";
    form_body.value = "";
  } catch (err) {
    message.classList.add("error");
    message.textContent = err.message;
  }
};
btn_submit.addEventListener("click", handleSubmit);

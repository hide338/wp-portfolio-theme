const NAV_BTN = document.getElementById('navbtn');
const bars = document.getElementById('bars');
const xmark = document.getElementById('xmark');
const menu = document.getElementById('menu');
const mask = document.getElementById('mask');
const hamburger = document.getElementById('hamburger');
navbtn.addEventListener('click', e => {
  menu.classList.toggle('translate-x-full');
  mask.classList.toggle('hidden');
  hamburger.classList.toggle('active');
});
mask.addEventListener('click', e => {
  menu.classList.toggle('translate-x-full');
  mask.classList.toggle('hidden');
  hamburger.classList.toggle('active');
});
document.querySelectorAll('.sp-gnav__link').forEach(item => {
  item.addEventListener('click', () => {
    menu.classList.toggle('translate-x-full');
    mask.classList.toggle('hidden');
    hamburger.classList.toggle('active');
  });
});

// スライドインする要素を取得
const slideInElements = document.querySelectorAll('.js__slide-in');
const rotateElements = document.querySelectorAll('.js__rotate');

// IntersectionObserverのコールバック関数
const callback = (entries, observer) => {
  entries.forEach(entry => {
    if (entry.isIntersecting) {
      // 可視範囲に入った要素にクラスを追加
      if (entry.target.classList.contains('js__slide-in')) {
        entry.target.classList.add('slide-in');
      }
      if (entry.target.classList.contains('js__rotate')) {
        entry.target.classList.add('rotate-in');
      }
      // 観察を停止
      observer.unobserve(entry.target);
    }
  });
};

// IntersectionObserverのオプション
const options = {
  threshold: 0.2
};

// IntersectionObserverのインスタンスを作成
const observer = new IntersectionObserver(callback, options);

// スライドインする要素を観察
slideInElements.forEach(element => {
  observer.observe(element);
});

rotateElements.forEach(element => {
  observer.observe(element);
});
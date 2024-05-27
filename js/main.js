/* ============================================================================================
SPメニュー制御
============================================================================================ */
/* 必要な要素の取得(hanburger, mask, menu) 
*************************************************************************************** */
const HAMBURGER = document.querySelector('.js-hamburger');
const MASK = document.querySelector('.js-mask');
const MENU = document.querySelector('.js-navList');
const LINKS = document.querySelectorAll('.js-navLink');

/* ハンバーガーメニューをクリックした時の処理
*************************************************************************************** */
HAMBURGER.addEventListener('click', () => {
  HAMBURGER.classList.toggle('is-active');
  MASK.classList.toggle('is-active');
  MENU.classList.toggle('is-active');
});

/* メニューのリンクをクリックした時の処理
*************************************************************************************** */
LINKS.forEach(link => {
  link.addEventListener('click', () => {
    HAMBURGER.classList.remove('is-active');
    MASK.classList.remove('is-active');
    MENU.classList.remove('is-active');
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
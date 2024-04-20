const NAV_BTN = document.getElementById('navbtn');
navbtn.addEventListener('click', e => {
  console.log(e);
  bars.classList.toggle('hidden')
  xmark.classList.toggle('hidden')
  menu.classList.toggle('translate-x-full')
});
document.querySelectorAll('.nav-link').forEach(item => {
  item.addEventListener('click', () => {
    menu.classList.toggle('translate-x-full');
    bars.classList.toggle('hidden');
    xmark.classList.toggle('hidden');
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
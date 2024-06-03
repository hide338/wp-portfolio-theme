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

/* マスクをクリックした時の処理
*************************************************************************************** */
MASK.addEventListener('click', () => {
  HAMBURGER.classList.remove('is-active');
  MASK.classList.remove('is-active');
  MENU.classList.remove('is-active');
});

/* ============================================================================================
ファーストビュー幾何学模様アニメーション
============================================================================================ */
particlesJS("particles-js",{
	"particles":{
		"number":{
			"value":38,//この数値を変更すると幾何学模様の数が増減できる
			"density":{
				"enable":true,
				"value_area":800
			}
		},
		"color":{
			"value":"#1C75BC"//色
		},
		"shape":{
			"type":"polygon",//形状はpolygonを指定
			"stroke":{
				"width":0,
			},
	"polygon":{
		"nb_sides":5//多角形の角の数
	},
	"image":{
		"width":190,
		"height":100
	}
	},
		"opacity":{
		"value":0.664994832269074,
		"random":false,
		"anim":{
			"enable":true,
			"speed":2.2722661797524872,
			"opacity_min":0.08115236356258881,
			"sync":false
		}
		},
		"size":{
			"value":3,
			"random":true,
			"anim":{
				"enable":false,
				"speed":40,
				"size_min":0.1,
				"sync":false
			}
		},
		"line_linked":{
			"enable":true,
			"distance":150,
			"color":"#1C75BC",
			"opacity":0.6,
			"width":1
		},
		"move":{
			"enable":true,
			"speed":3,//この数値を小さくするとゆっくりな動きになる
			"direction":"none",//方向指定なし
			"random":false,//動きはランダムにしない
			"straight":false,//動きをとどめない
			"out_mode":"out",//画面の外に出るように描写
			"bounce":false,//跳ね返りなし
			"attract":{
				"enable":false,
				"rotateX":600,
				"rotateY":961.4383117143238
			}
		}
	},
	"interactivity":{
		"detect_on":"canvas",
		"events":{
			"onhover":{
				"enable":false,
				"mode":"repulse"
			},
	"onclick":{
		"enable":false
	},
	"resize":true
		}
	},
	"retina_detect":true
});

/* ============================================================================================
スワイパーアニメーション
============================================================================================ */
// function slideVisibleToggle(sWrap) {
//   sWrap.forEach(function(slideItem) {
//       if ( slideItem.classList.contains('swiper-slide-visible') == true ){
//           if ( slideItem.classList.contains('slide-invisible') == true ){
//               slideItem.classList.remove('slide-invisible');
//           }
//       } else {
//           if ( slideItem.classList.contains('slide-invisible') == false ){
//               slideItem.classList.add('slide-invisible');
//           }
//       }
//   });
// }
// var swiper = new Swiper(".swiper", {
//   /* スライド自動切り替え */
//   autoplay: {
//       /* スライド自動切り替え永続 */
//       disableOnInteraction: false,
//       /* スライド自動切り替え方向 */
//       reverseDirection: false,
//       /* マウスホバーでスライド自動切り替え停止 */
//       pauseOnMouseEnter: true,
//   },
//   grabCursor: true,
//   /* カバフロー構成 */
//   effect: "coverflow",
//   /* 最初の画像(img1.jpeg)をスライドの先頭にする */
//   centeredSlides: true,
//   /* スライドの枚数(モバイル) */
//   slidesPerView: 3,
//   /* レスポンシブ */
//   breakpoints: {
//       601: {
//           /* スライドの枚数(タブレット) */
//           slidesPerView: 6,
//       },
//       1200: {
//           /* スライドの枚数(PC) */
//           slidesPerView: 6,
//       }
//   },
//   /* スライドを切り返す */
//   loop: true,
//   /* カバーフローの効果 */
//   coverflowEffect: {
//       /* スライドの角度 */
//       rotate: 10,
//       /* スライドの影非表示 */
//       slideShadows: false,
//   },
//   /* ページネーション表示 */
//   pagination: {
//       el: ".swiper-pagination",
//   },
//   /* スライドの切り替えボタン表示 */
//   navigation: {
//       nextEl: '.swiper-button-next',
//       prevEl: '.swiper-button-prev',
//   },
//   /* イベント */
//   on: {
//       /* スライドが切り替わったとき */
//       slideChange: function () {
//           slideVisibleToggle(document.querySelectorAll('.swiper-slide'));
//       },
//   },
// });

const swiper = new Swiper('.swiper', {
  effect: 'coverflow',
  grabCursor: true,
  centeredSlides: true,
  slidesPerView: "auto",
  // coverflowEffect: {
  //   rotate: 50,
  //   stretch: 0,
  //   depth: 100,
  //   modifier: 1,
  //   slideShadows: true,
  // },
  coverflowEffect: {
    /* スライドの角度 */
    rotate: 10,
    /* スライドの影非表示 */
    slideShadows: false,
  },
  autoplay: {
    delay: 3000,
    // disableOnInteraction: false
  },
  // followFinger: true,
  // pagination: {
  //   el: ".swiper-pagination"
  // },
  navigation: {
    nextEl: ".swiper-button-next",
    prevEl: ".swiper-button-prev"
  },
  loop: true,
  speed: 1000,
  // creativeEffect: {
  //   prev: {
  //     shadow: true,
  //     // translate: ["-150%", 0, -500]
  //   },
  //   next: {
  //     shadow: true,
  //     // translate: ["150%", 0, -500]
  //   }
  // },
  // loopAdditionalSlides: 5
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
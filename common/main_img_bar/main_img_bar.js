'use strict'

// 객체 가져오기
let currentIndex = 0;
let slideshowSlides = document.querySelector('div.slideshow_slides');

// 가져온 요소들을 배열로 저장한다.
let slides = document.querySelectorAll('div.slideshow_slides a');

// 그 배열의 길이를 저장
let slidesCount = slides.length;
let prev = document.querySelector('.prev');
let next = document.querySelector('.next');
let timer;

// 다음 슬라이드로 이동시키는 함수
function gotoSlide(index){

    currentIndex = index;
    let newLeft=-(currentIndex*100)+'%';
    slideshowSlides.style.left=newLeft;

}   // end of gotoSlide

// 슬라이드 초기화 설정
gotoSlide(0);

function slide_func(){

    // 이미지를 가로로 정렬
    for(let i = 0; i < slidesCount; i++){
        let newLeft = i*100+'%';
        slides[i].style.left = newLeft;
    }

    // prev 이미지 클릭 이벤트
    prev.addEventListener('click',(e)=>{
        e.preventDefault();
        let index = currentIndex;

        // 첫 번째 이미지라면 prev를 눌렀을 때 마지막 slide로 이동
        index = (index ===0) ? slidesCount - 1 : index - 1;
        gotoSlide(index);
    });

    next.addEventListener('click',(e)=>{
        e.preventDefault();
        let index = currentIndex;

        // 마지막 이미지라면 next를 눌렀을 때 첫 번째 slide로 이동
        index = (index ===(slidesCount - 1)) ? 0 : index + 1;
        gotoSlide(index);
    });

    startTimer();

    playImageFlowControl();


}   // end of slide_func

function startTimer(){
    // 2.5초마다 함수가 호출됨
    timer = setInterval(()=>{
        let index = (currentIndex+1) % slidesCount;
        gotoSlide(index);
    },2500);
}   // end of startTimer

function playImageFlowControl(){
    slideshowSlides.addEventListener('mouseenter',()=>{
        clearInterval(timer);
    });
    slideshowSlides.addEventListener('mouseleave',()=>{
        startTimer(timer);
    });
    prev.addEventListener('mouseenter',()=>{
        clearInterval(timer);
    });
    prev.addEventListener('mouseleave',()=>{
        startTimer(timer);
    });
    next.addEventListener('mouseenter',()=>{
        clearInterval(timer);
    });
    next.addEventListener('mouseleave',()=>{
        startTimer(timer);
    });
}   // end of playImageFlowControl
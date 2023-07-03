const splide = new Splide( '#image-carousel' );
splide.mount();

// ロード後にモーダル表示
window.addEventListener('DOMContentLoaded', function() {
    let modal = document.getElementById('modal');
    modal.style.display = 'block';
  });
const splide = new Splide( '#image-carousel' );
splide.mount();

function openModalPost() {
  const modal = document.getElementById("modalPost");
  modal.style.display = "block";
}

// ページの読み込み完了時にモーダルを非表示にする
document.addEventListener("DOMContentLoaded", function() {
  const modal = document.getElementById("modalPost");
  modal.style.display = "none";
});



function closeModalPost() {
  const modal = document.getElementById("modalPost");
  modal.style.display = "none";
}
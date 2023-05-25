let navigationLinks = document.querySelectorAll('.list-link');
let originalImages = [];

 	// 初期画像の保存
navigationLinks.forEach((link) => {
	let imgElement = link.querySelector('img');
	originalImages.push(imgElement.src);
  });
  
  function changeImage(element, page) {
	let imgElement = element.querySelector('img');
	let index = Array.from(navigationLinks).indexOf(element);
  
	// すべての要素の画像を元に戻す
	navigationLinks.forEach((link, i) => {
	  let linkImgElement = link.querySelector('img');
	  linkImgElement.src = originalImages[i];
	});
  
	// クリックされた要素の画像を変更
	imgElement.src = '../svg/time2.svg';  // 別の画像のパスを指定


	// time.htmlに遷移
	window.location.href = page;

  }

  navigationLinks.forEach((link) => {
	let imgElement = link.querySelector('img');
	originalImages.push(imgElement.src);
  });
  
  function changeImage2(element, page) {
	let imgElement = element.querySelector('img');
  
	// すべての要素の画像を元に戻す
	navigationLinks.forEach((link, index) => {
	  let linkImgElement = link.querySelector('img');
	  linkImgElement.src = originalImages[index];
	});
  
	// クリックされた要素の画像を変更
	imgElement.src = '../svg/forum2.svg';  // 別の画像のパスを指定

	window.location.href = page;

  }
  navigationLinks.forEach((link) => {
	let imgElement = link.querySelector('img');
	originalImages.push(imgElement.src);
  });
  
  function changeImage3(element) {
	let imgElement = element.querySelector('img');
  
	// すべての要素の画像を元に戻す
	navigationLinks.forEach((link, index) => {
	  let linkImgElement = link.querySelector('img');
	  linkImgElement.src = originalImages[index];
	});
  
	// クリックされた要素の画像を変更
	imgElement.src = '../svg/post2.svg';  // 別の画像のパスを指定
  }
  navigationLinks.forEach((link) => {
	let imgElement = link.querySelector('img');
	originalImages.push(imgElement.src);
  });
  
  function changeImage4(element) {
	let imgElement = element.querySelector('img');
  
	// すべての要素の画像を元に戻す
	navigationLinks.forEach((link, index) => {
	  let linkImgElement = link.querySelector('img');
	  linkImgElement.src = originalImages[index];
	});
  
	// クリックされた要素の画像を変更
	imgElement.src = '../svg/profile2.svg';  // 別の画像のパスを指定
  }
  
	// クリックされた要素のインデックスを先頭に移動
	navigationLinks = Array.from(navigationLinks);
	navigationLinks.splice(index, 1);
	navigationLinks.unshift(element);
	navigationLinks.forEach((link, i) => {
	link.setAttribute('onclick', `changeImage(navigationLinks[${i}])`);
	});

	navigationLinks.forEach((link, i) => {
	link.setAttribute('onclick', `changeImage(navigationLinks[${i}])`);
	});
export function isWebp() {
  // Проверка поддержки webp
  function testWebp(callback) {
    let webp = new Image()
    webp.onload = webp.onerror = function () {
      callback(webp.height == 2)
    }
    webp.src =
      'data:image/webp;base64,UklGRjoAAABXRUJQVlA4IC4AAACyAgCdASoCAAIALmk0mk0iIiIiIgBoSygABc6WWgAA/veff/0PP8bA//LwYAAA'
  }
  // Добавление класса _webp или _no-webp для HTML
  testWebp(function (support) {
    if (support == true) {
      document.querySelector('body').classList.add('webp')
    } else {
      document.querySelector('body').classList.add('no-webp')
    }
  })
}

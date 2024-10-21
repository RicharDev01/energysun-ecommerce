
// PARA ABREVIAR document.getElementById 
const id = document.getElementById.bind(document)

const hamMenu = id('hamburger-menu'),
      iconMenu = id('icon-menu')
const menuContainer = id('menu-container')
const fullYear = id('fullyear')

let protocolo = location.protocol // http:
let hostname = location.hostname // localhost
const __DIR__ = `${protocolo}//${hostname}`
 

hamMenu.addEventListener('click', () => {
  
  menuContainer.classList.toggle('menu-container--offcanvas')
  if ( menuContainer.classList.contains("menu-container--offcanvas") )
    iconMenu.setAttribute("src", `${__DIR__}/resources/images/icons/close-icon.svg`)
  else 
  iconMenu.setAttribute("src", `${__DIR__}/resources/images/icons/menu-icon.svg`)
})

addEventListener("DOMContentLoaded", () => {

  /* Para colocar activo en la página en la que estoy */

  // Obtenemos la ruta actual de la página completa (sin parámetros de consulta)
  const currentUrl = location.href;

  // Seleccionamos todos los elementos con la clase 'menu__link'
  const menuLinks = document.querySelectorAll('.menu__link');

  // Iteramos sobre cada elemento del menú
  menuLinks.forEach(link => {
    // Obtenemos el atributo href del enlace actual
    const href = link.href;

    // Normalizamos las rutas para comparar sin la barra final
    const cleanHref = href.replace(/\/$/, ''); // Eliminar cualquier barra al final
    const cleanCurrentUrl = currentUrl.replace(/\/$/, ''); // Lo mismo para la URL actual

    // Comprobamos si la URL actual coincide con el href del enlace
    if (cleanHref === cleanCurrentUrl) {
      link.classList.add('menu__link--active');
    }
  });
});


/* si el footer existe */
if (fullYear) { fullYear.innerText = new Date().getFullYear() }
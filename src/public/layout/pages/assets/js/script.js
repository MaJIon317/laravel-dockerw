const clientWidth = document.documentElement.clientWidth,
      header = document.getElementById('header'),
      menuopens = document.querySelectorAll('[data-menu-open]'),
      search = document.getElementById('search'), 
      searchresult = document.getElementById('searchresult'),
      faqs = document.querySelectorAll('.faq__title'),
      popupInitialize = document.querySelectorAll('[data-popup-initialize]'),
      viewCatalog = document.querySelectorAll('input[type=radio][name="view"]'),
      copy = document.querySelectorAll('[data-copy]');
      
document.addEventListener('DOMContentLoaded', (event) => {

    scrollHeader(),
    webdementInitializeSwiper(),
    webdementProductCardImageHover(),
    webdementProductCardCount();
    webdementToast();

    setTimeout(function() {
      var elem = document.createElement('script');
      elem.type = 'text/javascript';
      elem.src = '//api-maps.yandex.ru/2.1/?key=43216ccf-98f1-4d88-bf04-a885a0dac461&load=package.standard&lang=ru-RU&onload=getYaMap';
      document.getElementsByTagName('body')[0].appendChild(elem);
    }, 3000);
 
});

window.addEventListener('scroll', (event) => {

    scrollHeader();
});


 
document.addEventListener('click', event => {
    var isClickSearch = search.contains(event.target),
        isClickSearchresult = searchresult.contains(event.target);
 
    if (!isClickSearch && !isClickSearchresult) {
        searchresult.style.display = 'none';

        closeBtnView(false);
    }
})

search.addEventListener('click', (event) => {
    let search_term = event.target.value.toLowerCase();

    console.log(search_term);

    searchrResult(),
    closeBtnView();
});

search.addEventListener('input', (event) => {
    let search_term = event.target.value.toLowerCase();

    console.log(search_term);

    searchrResult(),
    closeBtnView();
});


if (menuopens) {
    menuopens.forEach((menuopen) => {
        var key = menuopen.getAttribute('data-menu-open')
            menu = document.getElementById(key);
           
        if (menu) {
            menuopen.onclick = function(event) {
                menu.classList.toggle('active')
        
                menuopens.forEach((menuopen2) => {
                    menuopen2.classList.toggle('active')
                })
          
                if (key === 'menucatalog') {
                    webdementMenucatalog(menu);
                }
            }

             
        }
    });
}

if (faqs) {
    faqs.forEach((faq) => {
        faq.onclick = function(event) {
            event.target.parentNode.classList.toggle('active')
        }
    });
}


if (popupInitialize) {
    popupInitialize.forEach((item) => {
        item.onclick = function(event) {
            webdementPopup(event.target.getAttribute('data-popup-initialize'))
        }
    });
}
if (viewCatalog) {
  viewCatalog.forEach((item) => {
      item.onclick = function(event) {
          var categorypage = document.querySelectorAll('.categorypage');

          for (var i = 0; i < categorypage.length; i++) {
              for (var iv = 0; iv < viewCatalog.length; iv++) {
                categorypage.item(i).classList.remove('categorypage--' + viewCatalog.item(i).value)
              }
              
              categorypage.item(i).classList.add('categorypage--' + event.target.value)
          }

         
      }
  });
}

if (copy) {
    copy.forEach((item) => {
        item.ondblclick = function(event) {
            var text = event.target.getAttribute('data-copy'),
                message = event.target.getAttribute('data-message');

            if (text) {
                navigator.clipboard.writeText(text)
                
                if (message) {
                    webdementToast(message)
                }
            }
        }
    });
}
 
function webdementMenucatalog(menu, click = false) {
    var items = menu.querySelectorAll('[data-menucatalog-general]'),
        back = menu.querySelectorAll('[data-menucatalog-back]');
   
    for (var i = 0; i < items.length; i++) {
 
      if (clientWidth > 768) {
        items.item(i).onmouseover = function(item) {
          menucatalog(items, item);
        }
      } else {

        items.item(i).onclick = function(item) {
          item.preventDefault();
          menucatalog(items, item);
        }
      }
    }

    for (var i = 0; i < back.length; i++) {
      back.item(i).onclick = function(item) {
        document.querySelector('[data-menucatalog-general="' + item.target.getAttribute('data-menucatalog-back') + '"').classList.remove('active');
        document.getElementById('menucatalog__children-' + item.target.getAttribute('data-menucatalog-back')).classList.remove('active');
      }
  }
}
function menucatalog(items, item) { 
    for (var i2 = 0; i2 < items.length; i2++) {
        items.item(i2).classList.remove('active'),

        document.getElementById('menucatalog__children-' + items.item(i2).getAttribute('data-menucatalog-general')).classList.remove('active');
    }

    item.target.classList.add('active'),
    document.getElementById('menucatalog__children-' + item.target.getAttribute('data-menucatalog-general')).classList.add('active');
}



function scrollHeader() {
    var header = document.getElementById('header'),
        main = document.getElementById('main'),
        header_data = (clientWidth > 768) ? header.querySelector('.header__data') : header.querySelector('.header__data-item--search'),
        menucatalog = document.getElementById('menucatalog'),
        searchresult = (clientWidth <= 768) ? document.getElementById('searchresult').querySelector('.searchresult__block') : false;

    if (window.scrollY > (parseInt(header.offsetHeight) - parseInt(header_data.offsetHeight))) {
        header.classList.add('header--fixed'),
        main.style.paddingTop = parseInt(header.offsetHeight) + 'px',
        header.style.top = '-' + (parseInt(header.offsetHeight) - parseInt(header_data.offsetHeight)) + 'px',
        header.style.position = 'fixed';

        menucatalog.style.top = parseInt(header_data.offsetHeight) + 'px';
        searchresult ? (searchresult.style.top = parseInt(header_data.offsetHeight) + 'px') : false;
    } else {
        header.classList.remove('header--fixed'),
        main.style.paddingTop = '0px',
        header.style.top = '0px',
        header.style.position = 'relative';

        menucatalog.style.top = (parseInt(header.offsetHeight) - parseInt(window.scrollY)) + 'px';
        searchresult ? (searchresult.style.top = (parseInt(header.offsetHeight) - parseInt(window.scrollY)) + 'px') : false;
    }
}


function searchrResult() {
    searchresult.style.display = 'block';
}


function webdementProductCardImageHover(element = '.productcard__image-span') {
    var images = document.querySelectorAll(element);

    if (images) {
        images.forEach(image => {
            var img = image.nextElementSibling;
          
            if (img.getAttribute('src')) {
                image.onmouseover = function(item) {
                    var items = item.target.parentNode.children;

                    for (var i = 0; i < items.length; i++) {
                        items.item(i).classList.remove('active')
                    }
                     
                    img.setAttribute('src', item.target.getAttribute('data-productcard-image')),
                    item.target.classList.add('active')
                     
                }
            }
        });
    }
}

function webdementProductCardCount(element = '.productcard__count') {
    var items = document.querySelectorAll(element);

    if (items) {
        items.forEach(item => {
            var buttons = item.querySelectorAll('[data-type]')
                item.input = item.querySelector('input');
               
            if (buttons && item.input) {
                for (var i = 0; i < buttons.length; i++) {
                    buttons.item(i).addEventListener('click', (button) => {
                        var type = button.target.getAttribute('data-type'),
                            value = parseInt(item.input.value),
                            step = parseInt(item.input.getAttribute('step'));
 
                        item.input.value = type === '+' ? (value + step) : (value - step)
                        item.input.setAttribute('value', item.input.value)
                        item.input.dispatchEvent(new Event('change'));
                    });
                }

                item.input.addEventListener('change', (input) => {
                    var step = parseInt(input.target.getAttribute('step')),
                        min = parseInt(input.target.getAttribute('min')),
                        max = parseInt(input.target.getAttribute('max')),
                        value = parseInt(input.target.value);


                    if (min > value) {
                        input.target.value = min;
                        input.target.setAttribute('value', min);
                    }

                    if (max < value) {
                        input.target.value = max;
                        input.target.setAttribute('value', max);
                    }
                });
            }
        });
    }
}

function closeBtnView(add = true) {
    var closes = document.querySelectorAll('[data-close]');

    closes.forEach((close) => {
        add ? close.classList.add('active') : close.classList.remove('active')
    })
}

function webdementInitializeSwiper() {
    var swipers = document.querySelectorAll('.swiper'),
        swiper = false;

    if (swipers) {
        swipers.forEach(el => {
            const sliderDesign = el.getAttribute('data-slider-design'),
                slider_id = el.getAttribute('data-slider-id'),
                sliderOption = {
                    lazy: true,
                    grabCursor: true,
                    preventClicks: false,
                    touchStartPreventDefault: false,
                    keyboard: true,
                    pagination: {
                        el: el.parentNode.querySelector('.swiper-pagination') ?? document.querySelector('[data-slider-pagination="' + slider_id + '"]'),
                        clickable: true
                    },
                    navigation: {
                        nextEl: el.parentNode.querySelector('.swiper-button-next') ?? document.querySelector('[data-slider-next="' + slider_id + '"]'),
                        prevEl: el.parentNode.querySelector('.swiper-button-prev') ?? document.querySelector('[data-slider-prev="' + slider_id + '"]')
                    },
                };
                 
                if (el.getAttribute('data-swiper-children') && swiper) {
                    sliderOption['thumbs'] = {
                        swiper: swiper,
                    }
                }

            if (sliderDesign === 'sectionproduct') {
                sliderOption['breakpoints'] = {
                    0: {
                        slidesPerView: 'auto',
                        spaceBetween: 0,
                    },
                    768: {
                      slidesPerView: 2,
                      spaceBetween: 15,
                    },
                    860: {
                        slidesPerView: 3,
                        spaceBetween: 15,
                    },
                    1200: {
                        slidesPerView: 4,
                        spaceBetween: 20,
                    },
                    1720: {
                        slidesPerView: 5,
                        spaceBetween: 20,
                    }
                }
                
            } else if (sliderDesign === 'holiday') {
                sliderOption['breakpoints'] = {
                    0: {
                        slidesPerView: 'auto',
                        spaceBetween: 0,
                    },
                    768: {
                      slidesPerView: 3,
                      spaceBetween: 15,
                    },
                    800: {
                        slidesPerView: 4,
                        spaceBetween: 15,
                    },
                    1024: {
                        slidesPerView: 5,
                        spaceBetween: 20,
                    },
                    1360: {
                        slidesPerView: 6,
                        spaceBetween: 20,
                    }
                }
            } else if (sliderDesign === 'promotion') {
                sliderOption['breakpoints'] = {
                  0: {
                    slidesPerView: 'auto',
                    spaceBetween: 0,
                    },
                    768: {
                      slidesPerView: 3,
                      spaceBetween: 15,
                    },
                    800: {
                        slidesPerView: 4,
                        spaceBetween: 15,
                    },
                    1024: {
                      slidesPerView: 4,
                      spaceBetween: 20,
                    },
                    1360: {
                        slidesPerView: 5,
                        spaceBetween: 20,
                    }
                }
            } else if (sliderDesign === 'news') {
                sliderOption['breakpoints'] = {
                  0: {
                      slidesPerView: 'auto',
                      spaceBetween: 15,
                      grid: {
                        rows: 3,
                        fill: 'row',
                      },
                   },
                    600: {
                        slidesPerView: 2,
                        spaceBetween: 15,
                        grid: {
                          rows: 2,
                          fill: 'row',
                        },
                    },
                    768: {
                        slidesPerView: 2,
                        spaceBetween: 20,
                        grid: {
                          rows: 2,
                          fill: 'row',
                        },
                    },
                    1024: {
                        slidesPerView: 1,
                        spaceBetween: 20,
                        grid: {
                          rows: 2,
                          fill: 'row',
                        },
                    },
                    1360: {
                        slidesPerView: 2,
                        spaceBetween: 20,
                        grid: {
                          rows: 2,
                          fill: 'row',
                        },
                    }
                }
              } else if (sliderDesign === 'productpage') {
                sliderOption['direction'] = 'vertical';
   
                sliderOption['slidesPerView'] = 'auto';
                sliderOption['spaceBetween'] = 10;
 
            }
  
            swiper = new Swiper(el, sliderOption);
        });
    }
}



 

function webdementPopup(key) {
    var popup = document.querySelector('[data-popup="' + key + '"]'),
        popup_close = popup.querySelectorAll('[data-popup-close]'),
        buttons = document.querySelectorAll('[onclick*="webdementPopup(\'' + key + '\'"]'),
        popups = document.querySelectorAll('[data-popup]');

    if (popup) {
        webdementPopupClose();
       
        for (var i = 0; i < buttons.length; i++) {
            buttons.item(i).classList.add('active')
        }

        popup.classList.add('active')

        for (var i = 0; i < popup_close.length; i++) {
            popup_close.item(i).onclick = function(item) {
                webdementPopupClose(item.target.getAttribute('data-popup-close'))
            }
        }
    }
}

function webdementPopupClose(key = false) {
    var buttons = document.querySelectorAll('[onclick*="webdementPopup"]'),
        popups = document.querySelectorAll('[data-popup]');

    for (var i = 0; i < buttons.length; i++) {
        buttons.item(i).classList.remove('active')
    }

    for (var i = 0; i < popups.length; i++) {
        popups.item(i).classList.remove('active')
    }
}



function webdementSort(_this) {
    var inputs = _this.querySelectorAll('input[type="radio"]:checked') ?? _this.querySelectorAll('input[type="checkbox"]:checked'),
        text = _this.querySelector('.sort__item-text'),
        values = [];

    for (var i = 0; i < inputs.length; i++) {
        values.push(inputs.item(i).getAttribute('data-value'))
    }

    if (values && text) {
        text.innerHTML = values.join(', ')
    }
}




function webdementToast(message = '', type = 'success', autoClose = 5000) {
    if (message === '') { return }

    let toastContainer = document.getElementById('toast');

    if (!toastContainer) {
        toastContainer = document.createElement('div'), toastContainer.setAttribute('id', 'toast'), toastContainer.classList.add('toast'), document.body.appendChild(toastContainer);
    }

    let alert = `<div class="toast__alert toast__alert--${type}">
                    <div class="toast__alert-message">${message}</div>
                    <span class="toast__alert-close"></span>
                </div>`

    toastContainer.insertAdjacentHTML('afterbegin', alert)

    setTimeout(() => {
        var isAlert = document.querySelector('.toast__alert')
        if (typeof (isAlert) != 'undefined' && isAlert != null) isAlert.classList.add('toast__alert--in')
    }, 100)

    setTimeout(() => {
        var isAlert = document.querySelector('.toast__alert')
        if (typeof (isAlert) != 'undefined' && isAlert != null) isAlert.classList.remove('toast__alert--in')
        setTimeout(() => {
            document.querySelector('.toast__alert').remove()
        }, 100)
    }, autoClose)

    let closeBtn = document.querySelector('.toast__alert-close')
    closeBtn.addEventListener('click', () => {
        document.querySelector('.toast__alert').classList.remove('toast__alert--in')
        setTimeout(() => {
            document.querySelector('.toast__alert').remove()
        }, 100)
    })
}

 

function autocomplete(autocomplete_input, suggestions) {
    if (!autocomplete_input) { return; }

    var currentOption;
    var total_autocomplete = document.getElementsByClassName('autocomplete-input').length
 
    autocomplete_input.classList.add('autocomplete-input');
    autocomplete_input.setAttribute('data-autocomplete-list-id', "autocomplete-list-" + (total_autocomplete + 1));
    autocomplete_input.setAttribute('autocomplete', "off");

    autocomplete_input.addEventListener('click', autocompleteInput, false);
    autocomplete_input.addEventListener('input', autocompleteInput, false);

    function autocompleteInput(e) {
      var $this = this;
      var string_to_match = $this.value.toLowerCase();
      var autocomplete_list_id = $this.getAttribute('data-autocomplete-list-id');

      removeLists();

      if (string_to_match) {
          currentOption = -1;
          var regex = new RegExp( '(' + string_to_match + ')', 'gi' );

          var autocomplete_list = document.createElement("DIV");
        autocomplete_list.setAttribute("id", autocomplete_list_id);
        autocomplete_list.setAttribute("class", "autocomplete-list");

        var autocomplete_items = document.createElement("DIV");
        autocomplete_items.setAttribute("class", "autocomplete-items");
   
        suggestions.forEach(function(suggestion) {
          if (suggestion.toLowerCase().includes(string_to_match)) {
            var autocomplete_item = document.createElement("DIV");
                autocomplete_item.setAttribute('class', 'autocomplete-item');
            autocomplete_item.setAttribute("data-autocomplete-text", suggestion);
                autocomplete_item.innerHTML = suggestion.replace(regex, "<b>$1</b>" );

                autocomplete_item.addEventListener("click", function(e) {
                    autocomplete_input.value = this.getAttribute("data-autocomplete-text");
                    autocomplete_items.remove();
                });

                autocomplete_items.appendChild(autocomplete_item);
          }
        });

        autocomplete_list.appendChild(autocomplete_items);
        $this.parentNode.appendChild(autocomplete_list);
      }
    }
 
    autocomplete_input.addEventListener("keydown", function(e) {
        var autocomplete_list_id = this.getAttribute('data-autocomplete-list-id');
    	var autocomplete_list = document.getElementById(autocomplete_list_id);

    	if ( autocomplete_list ) {
    		var autocomplete_items = autocomplete_list.querySelector('.autocomplete-items').getElementsByTagName("div");
    		
    		if (e.keyCode == 40) {
	            currentOption++;
	            selectItem(autocomplete_items);
	        } else if (e.keyCode == 38) {
	            currentOption--;
	            selectItem(autocomplete_items);
	        } else if (e.keyCode == 13) {
	            e.preventDefault();
	            if (currentOption > -1) {
	                if (autocomplete_items) {
	                	autocomplete_items[currentOption].click();
	                }
	            }
	        }
    	}
    });

    function selectItem(autocomplete_items) {
        if (autocomplete_items) {
		    Array.from(autocomplete_items).forEach(autocomplete_item => {
		    	autocomplete_item.classList.remove("active");
			});
		    
		    currentOption = currentOption >= autocomplete_items.length ? 0 : currentOption;
		    currentOption = currentOption < 0 ? autocomplete_items.length - 1 : currentOption;

	        autocomplete_items[currentOption].classList.add("active");
        }
    }

    function removeLists(element) {
        var autocomplete_lists = document.getElementsByClassName("autocomplete-list");
        Array.from(autocomplete_lists).forEach(autocomplete_list => {
            if (element != autocomplete_list && element != autocomplete_input) {
    			autocomplete_list.remove();
            }
		});
    }

    document.addEventListener("click", function(e) {
        removeLists(e.target);
    });
}

autocomplete(document.querySelector('input[name="autocomplete"]'), ["Ada", "APL", "Assembly language", "BASIC", "C", "C#", "C++", "Cobol", "Dart", "Delphi", "Forth", "Fortran", "FoxPro", "Golang (Go)", "Groovy", "Haskell", "Java", "JavaScript", "Kotlin", "Lisp", "Lua", "MATLAB", "Objective C", "Pascal", "Perl", "PHP", "PowerShell", "Python", "Qbasic", "R", "Ruby", "Rust", "Scala", "Shell", "Smalltalk", "SQL", "Swift", "TypeScript", "Visual Basic", "Visual Basic .NET"]);
 


/* */
 
function getYaMap() {
    if (document.getElementById('ordermap')) {
      var geoMap = new ymaps.Map('ordermap', {
        center: [60, 90],
        type: "yandex#map",
        zoom: 3
      });
      geoMap.controls.add('zoomControl');
    
      var lastCollection = 0,
        lastActiveRegion = 0;
    
      var lng = 'ru',
        contr = 'RU',
        level = '0';
      if (lastCollection) {
        geoMap.geoObjects.remove(lastCollection);
      }
      ymaps.regions.load(contr, {
        lang: lng,
        quality: level
      }).then(function(result) {
        lastCollection = result.geoObjects;
    
        lastCollection.each(function(reg) {
    
          switch (reg.properties.get('osmId')) {
            /* begin Северо-Кавказский федеральный округ*/
            case '108081': {
              reg.options.set('fillColor', '#ff001a');
              break;
            }
            case '109877': {
              reg.options.set('fillColor', '#ff001a');
              break;
            }
            case '110032': {
              reg.options.set('fillColor', '#ff001a');
              break;
            }
            case '109878': {
              reg.options.set('fillColor', '#ff001a');
              break;
            }
            case '109879': {
              reg.options.set('fillColor', '#ff001a');
              break;
            }
            case '253252': {
              reg.options.set('fillColor', '#ff001a');
              break;
            }
            case '109876': {
              reg.options.set('fillColor', '#ff001a');
              break;
            }
            /* end Северо-Кавказский федеральный округ*/
    
            /* begin Приволжский федеральный округ*/
            case '109876': {
              reg.options.set('fillColor', '#52ac62');
              break;
            }
            case '77677': {
              reg.options.set('fillColor', '#52ac62');
              break;
            }
            case '115114': {
              reg.options.set('fillColor', '#52ac62');
              break;
            }
            case '72196': {
              reg.options.set('fillColor', '#52ac62');
              break;
            }
            case '79374': {
              reg.options.set('fillColor', '#52ac62');
              break;
            }
            case '115134': {
              reg.options.set('fillColor', '#52ac62');
              break;
            }
            case '80513': {
              reg.options.set('fillColor', '#52ac62');
              break;
            }
            case '115100': {
              reg.options.set('fillColor', '#52ac62');
              break;
            }
            case '72195': {
              reg.options.set('fillColor', '#52ac62');
              break;
            }
            case '77669': {
              reg.options.set('fillColor', '#52ac62');
              break;
            }
            case '72182': {
              reg.options.set('fillColor', '#52ac62');
              break;
            }
            case '72192': {
              reg.options.set('fillColor', '#52ac62');
              break;
            }
            case '72194': {
              reg.options.set('fillColor', '#52ac62');
              break;
            }
            case '72193': {
              reg.options.set('fillColor', '#52ac62');
              break;
            }
            case '115135': {
              reg.options.set('fillColor', '#52ac62');
              break;
            }
            /* end Приволжский федеральный округ*/
    
            /* begin Уральский федеральный округ*/
            case '140290': {
              reg.options.set('fillColor', '#ffff00');
              break;
            }
            case '79379': {
              reg.options.set('fillColor', '#ffff00');
              break;
            }
            case '140291': {
              reg.options.set('fillColor', '#ffff00');
              break;
            }
            case '77687': {
              reg.options.set('fillColor', '#ffff00');
              break;
            }
            case '140296': {
              reg.options.set('fillColor', '#ffff00');
              break;
            }
            case '191706': {
              reg.options.set('fillColor', '#ffff00');
              break;
            }
            /* end Уральский федеральный округ*/
    
            /* begin Сибирский федеральный округ*/
            case '145194': {
              reg.options.set('fillColor', '#0000ff');
              break;
            }
            case '145729': {
              reg.options.set('fillColor', '#0000ff');
              break;
            }
            case '145195': {
              reg.options.set('fillColor', '#0000ff');
              break;
            }
            case '190911': {
              reg.options.set('fillColor', '#0000ff');
              break;
            }
            case '144764': {
              reg.options.set('fillColor', '#0000ff');
              break;
            }
            case '145730': {
              reg.options.set('fillColor', '#0000ff');
              break;
            }
            case '190090': {
              reg.options.set('fillColor', '#0000ff');
              break;
            }
            case '145454': {
              reg.options.set('fillColor', '#0000ff');
              break;
            }
            case '144763': {
              reg.options.set('fillColor', '#0000ff');
              break;
            }
            case '140294': {
              reg.options.set('fillColor', '#0000ff');
              break;
            }
            case '140292': {
              reg.options.set('fillColor', '#0000ff');
              break;
            }
            case '140295': {
              reg.options.set('fillColor', '#0000ff');
              break;
            }
            /* end Сибирский федеральный округ*/
    
            /* begin Дальневосточный федеральный округ*/
            case '151234': {
              reg.options.set('fillColor', '#8b00ff');
              break;
            }
            case '151233': {
              reg.options.set('fillColor', '#8b00ff');
              break;
            }
            case '151225': {
              reg.options.set('fillColor', '#8b00ff');
              break;
            }
            case '151223': {
              reg.options.set('fillColor', '#8b00ff');
              break;
            }
            case '147166': {
              reg.options.set('fillColor', '#8b00ff');
              break;
            }
            case '151228': {
              reg.options.set('fillColor', '#8b00ff');
              break;
            }
            case '394235': {
              reg.options.set('fillColor', '#8b00ff');
              break;
            }
            case '147167': {
              reg.options.set('fillColor', '#8b00ff');
              break;
            }
            case '151231': {
              reg.options.set('fillColor', '#8b00ff');
              break;
            }
            /* end Дальневосточный федеральный округ*/
    
            /* begin Северо-Западный федеральный округ*/
            case '393980': {
              reg.options.set('fillColor', '#ffa500');
              break;
            }
            case '115136': {
              reg.options.set('fillColor', '#ffa500');
              break;
            }
            case '140337': {
              reg.options.set('fillColor', '#ffa500');
              break;
            }
            case '115106': {
              reg.options.set('fillColor', '#ffa500');
              break;
            }
            case '103906': {
              reg.options.set('fillColor', '#ffa500');
              break;
            }
            case '176095': {
              reg.options.set('fillColor', '#ffa500');
              break;
            }
            case '2099216': {
              reg.options.set('fillColor', '#ffa500');
              break;
            }
            case '89331': {
              reg.options.set('fillColor', '#ffa500');
              break;
            }
            case '155262': {
              reg.options.set('fillColor', '#ffa500');
              break;
            }
            case '337422': {
              reg.options.set('fillColor', '#ffa500');
              break;
            }
            case '274048': {
              reg.options.set('fillColor', '#ffa500');
              break;
            }
            /* end Северо-Западный федеральный округ*/
    
            /* begin Южный федеральный округ*/
            case '253256': {
              reg.options.set('fillColor', '#ffffff');
              break;
            }
            case '108083': {
              reg.options.set('fillColor', '#ffffff');
              break;
            }
            case '108082': {
              reg.options.set('fillColor', '#ffffff');
              break;
            }
            case '112819': {
              reg.options.set('fillColor', '#ffffff');
              break;
            }
            case '77665': {
              reg.options.set('fillColor', '#ffffff');
              break;
            }
            case '85606': {
              reg.options.set('fillColor', '#ffffff');
              break;
            }
            /* end Южный федеральный округ*/
    
            /* begin Центральный федеральный округ*/
            case '83184': {
              reg.options.set('fillColor', '#7b3f00');
              break;
            }
            case '81997': {
              reg.options.set('fillColor', '#7b3f00');
              break;
            }
            case '72197': {
              reg.options.set('fillColor', '#7b3f00');
              break;
            }
            case '72181': {
              reg.options.set('fillColor', '#7b3f00');
              break;
            }
            case '85617': {
              reg.options.set('fillColor', '#7b3f00');
              break;
            }
            case '81995': {
              reg.options.set('fillColor', '#7b3f00');
              break;
            }
            case '85963': {
              reg.options.set('fillColor', '#7b3f00');
              break;
            }
            case '72223': {
              reg.options.set('fillColor', '#7b3f00');
              break;
            }
            case '72169': {
              reg.options.set('fillColor', '#7b3f00');
              break;
            }
            case '51490': {
              reg.options.set('fillColor', '#7b3f00');
              break;
            }
            case '72224': {
              reg.options.set('fillColor', '#7b3f00');
              break;
            }
            case '71950': {
              reg.options.set('fillColor', '#7b3f00');
              break;
            }
            case '81996': {
              reg.options.set('fillColor', '#7b3f00');
              break;
            }
            case '72180': {
              reg.options.set('fillColor', '#7b3f00');
              break;
            }
            case '2095259': {
              reg.options.set('fillColor', '#7b3f00');
              break;
            }
            case '81993': {
              reg.options.set('fillColor', '#7b3f00');
              break;
            }
            case '81994': {
              reg.options.set('fillColor', '#7b3f00');
              break;
            }
            case '102269': {
              reg.options.set('fillColor', '#7b3f00');
              break;
            }
            /* end Центральный федеральный округ*/
    
          }
        });
    
    
        lastCollection.options.set({
          zIndex: 1,
          zIndexHover: 1,
          draggable: false
        });
    
    
        lastCollection.events.add('click', function(event) {
          //var region = event.get('target');
          //console.log(region.properties.get('name') + ' -> ' + region.properties.get('osmId'));
    
          var target = event.get('target');
          if (lastActiveRegion) {
            lastActiveRegion.options.set('preset', '')
          }
          lastActiveRegion = target;
          lastActiveRegion.options.set('preset', {
            strokeWidth: 3,
            fillColor: 'F99',
            strokeColor: '9f9'
          });
        });
    
    
        var myPlacemark = new ymaps.GeoObject({
          geometry: {
            type: "Point",
            coordinates: [44.128040, 44.736990]
          },
          // Описываем данные геообъекта.
          properties: {
            hintContent: "Северо-Кавказский федеральный округ",
            balloonContentHeader: "Северо-Кавказский федеральный округ",
            balloonContentBody: "Россия"
          }
        });
    
        var myPlacemark1 = new ymaps.GeoObject({
          geometry: {
            type: "Point",
            coordinates: [49.041646, 43.254042]
          },
          // Описываем данные геообъекта.
          properties: {
            hintContent: "Южный федеральный округ",
            balloonContentHeader: "Южный федеральный округ",
            balloonContentBody: "Россия"
          }
        });
    
        var myPlacemark2 = new ymaps.GeoObject({
          geometry: {
            type: "Point",
            coordinates: [55.424665, 38.240499]
          },
          // Описываем данные геообъекта.
          properties: {
            hintContent: "Центральный федеральный округ",
            balloonContentHeader: "Центральный федеральный округ",
            balloonContentBody: "Россия"
          }
        });
    
        var myPlacemark3 = new ymaps.GeoObject({
          geometry: {
            type: "Point",
            coordinates: [56.248661, 51.963736]
          },
          // Описываем данные геообъекта.
          properties: {
            hintContent: "Приволжский федеральный округ",
            balloonContentHeader: "Приволжский федеральный округ",
            balloonContentBody: "Россия"
          }
        });
    
        var myPlacemark4 = new ymaps.GeoObject({
          geometry: {
            type: "Point",
            coordinates: [63.335770, 36.146574]
          },
          // Описываем данные геообъекта.
          properties: {
            hintContent: "Северо-Западный федеральный округ",
            balloonContentHeader: "Северо-Западный федеральный округ",
            balloonContentBody: "Россия"
          }
        });
    
        var myPlacemark5 = new ymaps.GeoObject({
          geometry: {
            type: "Point",
            coordinates: [61.830704, 64.789900]
          },
          // Описываем данные геообъекта.
          properties: {
            hintContent: "Уральский федеральный округ",
            balloonContentHeader: "Уральский федеральный округ",
            balloonContentBody: "Россия"
          }
        });
    
        var myPlacemark6 = new ymaps.GeoObject({
          geometry: {
            type: "Point",
            coordinates: [64.218118, 98.192932]
          },
          // Описываем данные геообъекта.
          properties: {
            hintContent: "Сибирский федеральный округ",
            balloonContentHeader: "Сибирский федеральный округ",
            balloonContentBody: "Россия"
          }
        });
    
        var myPlacemark7 = new ymaps.GeoObject({
          geometry: {
            type: "Point",
            coordinates: [67.127115, 124.131856]
          },
          // Описываем данные геообъекта.
          properties: {
            hintContent: "Дальневосточный федеральный округ",
            balloonContentHeader: "Дальневосточный федеральный округ",
            balloonContentBody: "Россия"
          }
        });
    
        geoMap.geoObjects.add(myPlacemark);
        geoMap.geoObjects.add(myPlacemark1);
        geoMap.geoObjects.add(myPlacemark2);
        geoMap.geoObjects.add(myPlacemark3);
        geoMap.geoObjects.add(myPlacemark4);
        geoMap.geoObjects.add(myPlacemark5);
        geoMap.geoObjects.add(myPlacemark6);
        geoMap.geoObjects.add(myPlacemark7);
        geoMap.geoObjects.add(lastCollection);
    
    
      }, function() {
        //alert('no response');
      });
    }

    if (document.getElementById('contactpagemap')) {
          var myMap = new ymaps.Map("contactpagemap", {
              center: [54.83, 37.11],
              zoom: 5
          }, {
              searchControlProvider: 'yandex#search'
          }),
          myPlacemark = new ymaps.Placemark([55.907228, 31.260503], {
              // Чтобы балун и хинт открывались на метке, необходимо задать ей определенные свойства.
              balloonContentHeader: "Балун метки",
              balloonContentBody: "Содержимое <em>балуна</em> метки",
              balloonContentFooter: "Подвал",
              hintContent: "Хинт метки"
          });

        myMap.geoObjects.add(myPlacemark);
  
    }
}
 
















import Swiper from 'swiper/bundle';
window.Swiper = Swiper;

window.scrollHeader = function() {
    var header = document.getElementById('header'),
        main = document.getElementById('main'),
        clientWidth = document.documentElement.clientWidth,
        header_data = (clientWidth > 768) ? header.querySelector('.header__data') : header.querySelector('.header__data-item--search'),
        menucatalog = document.getElementById('menucatalog'),
        searchresult = (clientWidth <= 768) ? document.querySelector('header .searchresult__block') : false;

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

window.toast = function(message = '', type = 'success', autoClose = 5000) {
    if (message === '') { return }

    let toastContainer = document.getElementById('toast'),
        random = Math.ceil(Math.random()*1000000);
  
    if (!toastContainer) {
        toastContainer = document.createElement('div'), toastContainer.setAttribute('id', 'toast'), toastContainer.classList.add('toast'), document.body.appendChild(toastContainer);
    }

    const alert = `<div class="toast__alert toast__alert--${type}" id="toast__alert-${random}">
                    <div class="toast__alert-message">${message}</div>
                    <span class="toast__alert-close"></span>
                </div>`

    toastContainer.insertAdjacentHTML('afterbegin', alert)
  
    setTimeout(() => {
        const isAlert = document.getElementById(`toast__alert-${random}`)
      
        if (typeof (isAlert) != 'undefined' && isAlert != null) isAlert.classList.add('toast__alert--in')
    }, 100)

    setTimeout(() => {
        const isAlert = document.getElementById(`toast__alert-${random}`)
        if (typeof (isAlert) != 'undefined' && isAlert != null) isAlert.classList.remove('toast__alert--in')
        setTimeout(() => {
            const isAlert = document.getElementById(`toast__alert-${random}`)

            if (isAlert) {
                isAlert.remove()
            }
        }, 100)
    }, autoClose)

    const closeBtn = document.querySelector('.toast__alert-close')
    closeBtn.addEventListener('click', () => {
        const isAlert = document.getElementById(`toast__alert-${random}`)
 
        if (isAlert) {
            isAlert.classList.remove('toast__alert--in')
        }

        setTimeout(() => {
            const isAlert = document.getElementById(`toast__alert-${random}`)

            if (isAlert) {
                isAlert.remove()
            }
        }, 100)
    })
}

window.slider = function() {
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

window.productCardImageHover = function(element = '.productcard__image-span') {
    var images = document.querySelectorAll(element);

    if (images) {
        images.forEach(image => {
            var img = image.nextElementSibling;
       
            if (img.getAttribute('src') && image) {
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

window.productCardCount = function(element = '.productcard__count') {
    var items = document.querySelectorAll(element);

    if (items) {
        items.forEach(item => {
            var buttons = item.querySelectorAll('[data-type]'),
                input = item.querySelector('input'),
                initialized = item.classList.contains('initialized');
     
            if (!initialized && buttons && input) {
                for (var i = 0; i < buttons.length; i++) {
                    buttons.item(i).addEventListener('click', (button) => {
                        var type = button.target.getAttribute('data-type'),
                            value = parseInt(input.value),
                            step = parseInt(input.getAttribute('step'));

                        input.value = type === '+' ? (parseInt(value) + parseInt(step)) : (parseInt(value) - parseInt(step))
                        input.setAttribute('value', input.value)
                        input.dispatchEvent(new Event('change'));
                    });
                }

                input.addEventListener('change', (input) => {
                    var step = parseInt(input.target.getAttribute('step')),
                        min = parseInt(input.target.getAttribute('min')),
                        max = parseInt(input.target.getAttribute('max')),
                        value = parseInt(input.target.value);


                    if (min > value) {
                        value = min;
                    }

                    if (max < value) {
                        value = max;
                    }

                    input.target.value = value;
                    input.target.setAttribute('value', input.target.value);

                    input.target.dispatchEvent(new Event('input'));
                });

                item.classList.add('initialized')
            }
        });
    }
}

window.autocomplete = function(autocomplete_input, suggestions, target = true) {
    if (!autocomplete_input) { return; }

    var currentOption;
    var total_autocomplete = document.getElementsByClassName('autocomplete-input').length
 
    autocomplete_input.classList.add('autocomplete-input');
    autocomplete_input.setAttribute('data-autocomplete-list-id', "autocomplete-list-" + (total_autocomplete + 1));
    autocomplete_input.setAttribute('autocomplete', "off");

    if (target) {
        autocomplete_input.addEventListener('click', autocompleteInput, false);
        autocomplete_input.addEventListener('input', autocompleteInput, false);
    } else {
        autocompleteInput(autocomplete_input)
    }

    function autocompleteInput(e) {
        var $this = autocomplete_input;
        var string_to_match = $this.value.toLowerCase();
        var autocomplete_list_id = $this.getAttribute('data-autocomplete-list-id');

        autocompleteRemoveLists();

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

            if (suggestions.length !== 0) {
                autocomplete_list.appendChild(autocomplete_items);

                $this.parentNode.appendChild(autocomplete_list);
            }
        }
    }
 
    autocomplete_input.addEventListener("keydown", function(e) {
        var autocomplete_list_id = this.getAttribute('data-autocomplete-list-id');
    	var autocomplete_list = document.getElementById(autocomplete_list_id);

    	if ( autocomplete_list ) {
    		var autocomplete_items = autocomplete_list.querySelector('.autocomplete-items');
    		    
            if (autocomplete_items) {
                autocomplete_items = autocomplete_items.getElementsByTagName("div");

                if (e.keyCode == 40) {
                    currentOption++;
                    autocompleteSelectItem(autocomplete_items);
                } else if (e.keyCode == 38) {
                    currentOption--;
                    autocompleteSelectItem(autocomplete_items);
                } else if (e.keyCode == 13) {
                    e.preventDefault();
                    if (currentOption > -1) {
                        if (autocomplete_items) {
                            autocomplete_items[currentOption].click();
                        }
                    }
                }
            }
    	}
    });

    function autocompleteSelectItem(autocomplete_items) {
        if (autocomplete_items) {
		    Array.from(autocomplete_items).forEach(autocomplete_item => {
		    	autocomplete_item.classList.remove("active");
			});
		    
		    currentOption = currentOption >= autocomplete_items.length ? 0 : currentOption;
		    currentOption = currentOption < 0 ? autocomplete_items.length - 1 : currentOption;

	        autocomplete_items[currentOption].classList.add("active");
        }
    }

    function autocompleteRemoveLists(element) {
        var autocomplete_lists = document.getElementsByClassName("autocomplete-list");

        Array.from(autocomplete_lists).forEach(autocomplete_list => {
            if (element != autocomplete_list && element != autocomplete_input) {
    			autocomplete_list.remove();
            }
		});
    }

    document.addEventListener("click", function(e) {
        autocompleteRemoveLists(e.target);
    });
}

window.maskTelephone = function() {
    var keyCode,
        telephones = document.querySelectorAll('input[name=phone]');

    if (telephones) {
        telephones.forEach(telephone => {
            telephone.addEventListener('input', maskTelephoneInput, false);
            telephone.addEventListener('focus', maskTelephoneInput, false);
            telephone.addEventListener('blur', maskTelephoneInput, false);
            telephone.addEventListener('keydown', maskTelephoneInput, false);
        });

        function maskTelephoneInput(event)
        {
            event.keyCode && (keyCode = event.keyCode);
            var pos = this.selectionStart;
            if (pos < 3) event.preventDefault();
            var matrix = "+7 (___) ___ __ __",
                i = 0,
                def = matrix.replace(/\D/g, ""),
                val = this.value.replace(/\D/g, ""),
                new_value = matrix.replace(/[_\d]/g, function(a) {
                    return i < val.length ? val.charAt(i++) : a
                });
            i = new_value.indexOf("_");
            if (i != -1) {
                i < 5 && (i = 3);
                new_value = new_value.slice(0, i)
            }
            var reg = matrix.substr(0, this.value.length).replace(/_+/g,
                function(a) {
                    return "\\d{1," + a.length + "}"
                }).replace(/[+()]/g, "\\$&");
            reg = new RegExp("^" + reg + "$");
            if (!reg.test(this.value) || this.value.length < 5 || keyCode > 47 && keyCode < 58) {
              this.value = new_value;
            }
            if (event.type == "blur" && this.value.length < 5) {
              this.value = "";
            }
        }
    }
}

  
window.enumerateDevices = async function() {
    try {
        const devices = sessionStorage.getItem('user_media_devices')
            ? JSON.parse(sessionStorage.getItem('user_media_devices'))
            : await navigator.mediaDevices.enumerateDevices()

        if (!sessionStorage.getItem('user_media_devices')) {
            sessionStorage.setItem('user_media_devices', JSON.stringify(devices))
        }

        return { devices }
    } catch (error) {
        return { error }
    }
}

import './bootstrap';

import './global';

import './livewire';

window.axios.defaults.headers.common['X-CSRF-TOKEN'] = document.head.querySelector('meta[name="csrf-token"]').content ?? null;

const search = document.getElementById('search'),
      viewCatalog = document.querySelectorAll('input[type=radio][name="view"]'),
      copy = document.querySelectorAll('[data-copy]');

window.addEventListener('scroll', (event) => {

    scrollHeader()
});

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

 

window.youtubeButton = function(youtube)
{
    const iframe = document.createElement("iframe");
    iframe.setAttribute("width", "100%");
    iframe.setAttribute("height", youtube.offsetHeight);
    iframe.setAttribute("src", "https://www.youtube.com/embed/" + youtube.getAttribute('data-youtube-button') + '?enablejsapi=1&showinfo=0&controls=0&loop=1&playlist=' + youtube.getAttribute('data-youtube-button') + '&disablekb=1&rel=0&modestbranding=1&mute=1');
    iframe.setAttribute("frameborder", "0");
    iframe.setAttribute("allow", "accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share");
    iframe.setAttribute("allowfullscreen", "");
    youtube.parentNode.appendChild(iframe);

    youtube.remove()
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
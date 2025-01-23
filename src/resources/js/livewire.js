Livewire.on('toast', (options) => {
    toast(options['message'], options['type'] ?? 'success')
})

Livewire.on('navigate', (url) => {
    Livewire.navigate(url)
})

Livewire.on('urlChange', (url) => {
    history.pushState(null, null, url);
});

Livewire.on('slider', (options) => {
    setTimeout(() => {
        slider()
    }, 1);
});

Livewire.on('menu', (key) => {
    var items = document.querySelectorAll('[data-menu-open]'),
        menu = document.getElementById(key);
 
    items.forEach((item) => {
        var itemKey = item.getAttribute('data-menu-open')

        if (itemKey != key) {
            item.classList.remove('active')

            var itemMenu = document.getElementById(itemKey);

            if (itemMenu) {
                itemMenu.classList.remove('active')
            }
        }
    })

    if (menu) {
        if (menu.classList.contains('active')) {
            menu.classList.remove('active')

            items.forEach((item) => {
                var itemKey = item.getAttribute('data-menu-open')
        
                if (itemKey) {
                    item.classList.remove('active')
        
                    var itemMenu = document.getElementById(itemKey);
        
                    if (itemMenu) {
                        itemMenu.classList.remove('active')
                    }
                }
            })
        } else {
            menu.classList.add('active')

            items.forEach((item) => {
                var itemKey = item.getAttribute('data-menu-open')
        
                if (itemKey == key) {
                    item.classList.add('active')
                }
            })
        }
    }
})

Livewire.on('showModal', (key) => {
    Livewire.dispatch('resetModal');
})

Livewire.on('showModalLoad', () => {
    setTimeout(() => {
        let modal = document.getElementById('popup-webdement')
    
        if (modal.children[0]) {
            modal.children[0].classList.add('active')
        }
    }, 10);
})

Livewire.on('resetModal', () => {
    let modal = document.getElementById('popup-webdement')
    
    if (modal.children[0]) {
        modal.children[0].classList.remove('active')
    }
})

const unsecuredCopyToClipboard = (text) => { const textArea = document.createElement("textarea"); textArea.value=text; document.body.appendChild(textArea); textArea.select(); try{document.execCommand('copy')}catch(err){console.error('Unable to copy to clipboard',err)}document.body.removeChild(textArea)};

Livewire.on('copyText', (options) => {
    if (options['text']) {
        if (window.isSecureContext && navigator.clipboard) {
            navigator.clipboard.writeText(options['text']);
        } else {
            unsecuredCopyToClipboard(options['text']);
        }

        toast(options['message'] ?? 'Successfully copied', 'success')
    }
})

Livewire.on('updateToWishlist', (options) => {
    const totals = document.querySelectorAll('[data-total-wishlist]');

    totals.forEach((element) => {
        element.innerHTML = options.total ? options.total : '';

        if (options.total != 0) {
            element.parentNode.parentNode.classList.add('notnull')
        } else {
            element.parentNode.parentNode.classList.remove('notnull')
        }
    })
})

Livewire.on('updateToCart', (options) => {
    const totals = document.querySelectorAll('[data-total-cart]');

    totals.forEach((element) => {
        element.innerHTML = options.total ? options.total : '';

        if (options.total != 0) {
            element.parentNode.parentNode.classList.add('notnull')
        } else {
            element.parentNode.parentNode.classList.remove('notnull')
        }
    })
})

Livewire.on('autocomplete', (options) => {
    let params = {};

    params['query'] = options.this.value;

    if (options.code == 'inn') {
        fetch('https://suggestions.dadata.ru/suggestions/api/4_1/rs/suggest/party', {
            method: "POST",
            mode: "cors",
            headers: {
                "Content-Type": "application/json",
                "Accept": "application/json",
                "Authorization": "Token " + import.meta.env.VITE_DADATA_API_KEY,
                'X-Secret': import.meta.env.VITE_DADATA_API_KEY
            },
            body: JSON.stringify(params)
        })
        .then(response => response.json())
        .then(result => {
            var values = [];
       
            if (result.suggestions) {
                result.suggestions.forEach(suggestion => {
                    if (suggestion.data.inn && suggestion.value) {
                        values.push(suggestion.data.inn + ' (' + suggestion.value + ')')
                    }
                });

                values = Array.from(new Set(values));
            }

            autocomplete(options.this, values, false);
        })
        .catch(error => console.log("error", error));
    }

    if (options.code == 'email') {
        fetch('https://suggestions.dadata.ru/suggestions/api/4_1/rs/suggest/email', {
            method: "POST",
            mode: "cors",
            headers: {
                "Content-Type": "application/json",
                "Accept": "application/json",
                "Authorization": "Token " + import.meta.env.VITE_DADATA_API_KEY,
                'X-Secret': import.meta.env.VITE_DADATA_API_KEY
            },
            body: JSON.stringify(params)
        })
        .then(response => response.json())
        .then(result => {
            var values = [];
       
            if (result.suggestions) {
                result.suggestions.forEach(suggestion => {
                    if (suggestion.value) {
                        values.push(suggestion.value)
                    }
                });

                values = Array.from(new Set(values));
            }

            autocomplete(options.this, values, false);
        })
        .catch(error => console.log("error", error));
    }

    if (options.code == 'name') {
        fetch('https://suggestions.dadata.ru/suggestions/api/4_1/rs/suggest/fio', {
            method: "POST",
            mode: "cors",
            headers: {
                "Content-Type": "application/json",
                "Accept": "application/json",
                "Authorization": "Token " + import.meta.env.VITE_DADATA_API_KEY,
                'X-Secret': import.meta.env.VITE_DADATA_API_KEY
            },
            body: JSON.stringify({query: options.this.value})
        })
        .then(response => response.json())
        .then(result => {
            var values = [];
       
            if (result.suggestions) {
                result.suggestions.forEach(suggestion => {
                    if (suggestion.value) {
                        values.push(suggestion.value)
                    }
                });

                values = Array.from(new Set(values));
            }

            autocomplete(options.this, values, false);
        })
        .catch(error => console.log("error", error));
    }

    if (options.code == 'city') {
        fetch('https://suggestions.dadata.ru/suggestions/api/4_1/rs/suggest/address', {
            method: "POST",
            mode: "cors",
            headers: {
                "Content-Type": "application/json",
                "Accept": "application/json",
                "Authorization": "Token " + import.meta.env.VITE_DADATA_API_KEY,
                'X-Secret': import.meta.env.VITE_DADATA_API_KEY
            },
            body: JSON.stringify({
                query: options.this.value,
                from_bound: {value: 'city'},
                to_bound: {value: 'city'}
            })
        })
        .then(response => response.json())
        .then(result => {
            var values = [];
       
            if (result.suggestions) {
                result.suggestions.forEach(suggestion => {
                    if (suggestion.data.city) {
                        values.push(suggestion.data.city)
                    }
                });

                values = Array.from(new Set(values));
            }

            autocomplete(options.this, values, false);
        })
        .catch(error => console.log("error", error));
    }

    if (options.code == 'address') {
        var cityName = document.querySelector('input[name="city"]')

        if (cityName && cityName.value != '') {
            params['locations'] = {region: cityName.value};
        }

        params['restrict_value'] = true;

        fetch('https://suggestions.dadata.ru/suggestions/api/4_1/rs/suggest/address', {
            method: "POST",
            mode: "cors",
            headers: {
                "Content-Type": "application/json",
                "Accept": "application/json",
                "Authorization": "Token " + import.meta.env.VITE_DADATA_API_KEY,
                'X-Secret': import.meta.env.VITE_DADATA_API_KEY
            },
            body: JSON.stringify(params)
        })
        .then(response => response.json())
        .then(result => {
            var values = [];
       
            if (result.suggestions) {
                result.suggestions.forEach(suggestion => {
                    if (suggestion.value) {
                        values.push(suggestion.value)
                    }
                });

                values = Array.from(new Set(values));
            }

            autocomplete(options.this, values, false);
        })
        .catch(error => console.log("error", error));
    }

})

document.addEventListener('livewire:init', () => {
   
})

document.addEventListener('livewire:initialized', () => {
    
})

document.addEventListener('livewire:navigating', () => {
    // Запускается, когда новый HTML-код собирается переместиться на страницу...
 
    // Это хорошее место для изменения любого HTML-кода перед удалением страницы
    //...
})
 
document.addEventListener('livewire:navigated', () => {
    // Запускается как заключительный шаг навигации по любой странице...
 
    // Также запускается при загрузке страницы вместо "DOMContentLoaded"...

    slider()
    scrollHeader()
})
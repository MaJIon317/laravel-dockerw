 
Element.prototype.webdementAutocomplete = function(option) {
    return {
 
        input: function() {
            console.log(222222222222222);
          },
        source: function() {
          console.log(222222222222222);
        }
    }

    /*
    <div id="autocomplete-list-2" class="autocomplete-list">
    <div class="autocomplete-items">
    
    <div class="autocomplete-item" data-autocomplete-text="7811512098 (ООО &quot;МИЛЛИОН ОТКРЫТОК И ПОЗДРАВЛЕНИЙ&quot;)">7811512098 (ООО "МИЛЛИОН ОТКРЫТОК И ПОЗДРАВЛЕНИЙ")</div></div></div>
    */
    var _this = this;
    var dropdown = document.createElement("div")

    dropdown.className = "autocomplete-list";
        _this.parentNode.insertBefore(dropdown, _this.nextSibling);
 
    this.timer = null;
    this.items = [];
   
    _this.setAttribute('autocomplete', 'off');

    // Blur
    _this.onblur = function() {
        setTimeout(function(object) {
            object.hide();
        }, 200, this);
    }

    // Focus
    _this.onfocus = function() {
        this.request();
    }


    // Keydown
    _this.onkeydown = function(event) {
        switch(event.keyCode) {
            case 27: // escape
                this.hide();
                break;
            default:
                this.request();
                break;
        }
    }

    // Click
    this.onclick = function(event) {
        event.preventDefault();

        var value = event.target.parentNode.getAttribute('data-value');

        if (value && this.items[value]) {
            this.select(this.items[value]);
        }
    }

    // Show
    this.show = function() {
        var pos = _this.position();

        dropdown.css({
            top: pos.top + _this.outerHeight(),
            left: pos.left
        });

        dropdown.classList.remove('d-none');
    }

    // Hide
    this.hide = function() {
        dropdown.classList.add('d-none');
    }

    // Request
    this.request = function() {
        clearTimeout(this.timer);
        console.log(this.source([], 5454))
        this.timer = setTimeout(function(object) {
            console.log(new Proxy(object.response, object))
            
            //object.source(object.value, new Proxy(object.response, object));
        }, 200, this);
    }

    
 
    // Response
    this.response = function(json) {
        console.log(444444)

        var html = '';
        var category = {};
        var name;
        var i = 0, j = 0;
 
        if (json.length) {
            for (i = 0; i < json.length; i++) {
                // update element items
                this.items[json[i]['value']] = json[i];

                if (!json[i]['category']) {
                    // ungrouped items
                    html += '<li data-value="' + json[i]['value'] + '"><a href="#">' + json[i]['label'] + '</a></li>';
                } else {
                    // grouped items
                    name = json[i]['category'];
                    if (!category[name]) {
                        category[name] = [];
                    }

                    category[name].push(json[i]);
                }
            }

            for (name in category) {
                html += '<li class="dropdown-header">' + name + '</li>';

                for (j = 0; j < category[name].length; j++) {
                    html += '<li data-value="' + category[name][j]['value'] + '"><a href="#">&nbsp;&nbsp;&nbsp;' + category[name][j]['label'] + '</a></li>';
                }
            }
        }

        if (html) {
            this.show();
        } else {
            this.hide();
        }

        dropdown.innerHTML = html;
    }

   // dropdown.on('click', '> li > a', $.proxy(this.click, this));
 
};

document.getElementById('input-product').webdementAutocomplete({
    source: function(request, response) {
        var json = [[], []]

        console.log(request)

        response(new Map(json, function(item) {
            console.log(item)
            return {
                label: 222,
                value: 3433
            }
        }));
    },
    select: function(item) {
        console.log(item)
    }
})
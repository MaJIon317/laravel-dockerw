const unlayerContainer = document.getElementById('editor-container')

if (unlayerContainer) {
    const oHead = document.getElementsByTagName("head")[0];
    const oScript = document.createElement('script');
    oScript.type = 'text/javascript';
    oScript.src = "https://editor.unlayer.com/embed.js?onload=unlayer";
    oHead.appendChild(oScript);
    oScript.onload = function() {
        const unlayerInputHtml = document.getElementById('input-html'),
                unlayerInputJson = document.getElementById('input-json'),
                projectId = unlayerContainer.getAttribute('data-projectId'),
                templateId = unlayerContainer.getAttribute('data-templateId');

        unlayer.init({
            id: unlayerContainer.id,
            projectId: projectId,
            displayMode: 'email',
            devices: [],
            //designMode: 'edit',
            features: {
                pageAnchors: true,
                audit: true,
                blocks: true,
                textEditor: {
                    spellChecker: true,
                    //customButtons: [],
                }
            },
            locale: 'ru-RU',
            appearance: {
                loader: {
                    html: '<div class="spinner-border" role="status"><span class="visually-hidden">Loading...</span></div>',
                },
            },
            mergeTags: JSON.parse(unlayerContainer.getAttribute('data-mergetags')),
        })
    
        //  Грузим текущие данные
        if (unlayerInputJson.value != '') {
            unlayer.loadDesign(unlayerInputJson.value != '' ? JSON.parse(unlayerInputJson.value) : null);
        } else {
            unlayer.loadTemplate(templateId);
        }

        // Сохраняем при каждом изменении
        unlayer.addEventListener('design:updated', function(updates) {
            console.log('design:updated')
            exportHtml()
        });

        unlayer.addEventListener('editor:ready', function () {
            unlayerContainer.style.height = '900px';
        });

        unlayer.addEventListener('design:loaded', function(data) {
            console.log('design:loaded')
            exportHtml()
        })

        function exportHtml()
        {
            unlayer.exportHtml(function(data) { 
                unlayerInputJson.value = JSON.stringify(data.design);
                unlayerInputHtml.value = data.html;
            }, {
                minify: true
            })
        }

        unlayer.registerCallback('image', function (file, done) {
            const formData = new FormData();

            formData.append('file', file.attachments[0]);

            formData.append('path', 'constructor-email');

            fetch(document.querySelector('base').href + '/image/upload', {
                method: 'POST',
                body: formData,
                headers: {
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
                }
            })
            .then(response => {
                return response.json();
            })
            .then(data => {
                if (data.error) {
                    toast(data.error, 'error')
                }
                
                if (data.success) {
                    done({ progress: 100, url: data.success.default });
                }
            })
            .catch(function(error) {
                toast(error, 'error')
                console.log('Error:', error);
            });

        });
    }
}
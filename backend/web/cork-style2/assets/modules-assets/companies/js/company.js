function initImageUpload(box) {
    let uploadField = box.querySelector('.image-upload');

    uploadField.addEventListener('change', getFile);

    function getFile(e){
        let file = e.currentTarget.files[0];
        checkType(file);
    }

    function previewImage(file){
        let thumb = box.querySelector('.js--image-preview'),
            reader = new FileReader();

        reader.onload = function() {
            thumb.style.backgroundImage = 'url(' + reader.result + ')';
        }
        reader.readAsDataURL(file);
        thumb.className += ' js--no-default';
    }

    function checkType(file){
        let imageType = /image.*/;
        if (!file.type.match(imageType)) {
            throw 'Datei ist kein Bild';
        } else if (!file){
            throw 'Kein Bild gewählt';
        } else {
            previewImage(file);
        }
    }

}

// initialize box-scope
var boxes = document.querySelectorAll('.box');

for (let i = 0; i < boxes.length; i++) {
    let box = boxes[i];
    initDropEffect(box);
    initImageUpload(box);
}



/// drop-effect
function initDropEffect(box){
    let area, drop, areaWidth, areaHeight, maxDistance, dropWidth, dropHeight, x, y;

    // get clickable area for drop effect
    area = box.querySelector('.js--image-preview');
    area.addEventListener('click', fireRipple);

    function fireRipple(e){
        area = e.currentTarget
        // create drop
        if(!drop){
            drop = document.createElement('span');
            drop.className = 'drop';
            this.appendChild(drop);
        }
        // reset animate class
        drop.className = 'drop';

        // calculate dimensions of area (longest side)
        areaWidth = getComputedStyle(this, null).getPropertyValue("width");
        areaHeight = getComputedStyle(this, null).getPropertyValue("height");
        maxDistance = Math.max(parseInt(areaWidth, 10), parseInt(areaHeight, 10));

        // set drop dimensions to fill area
        drop.style.width = maxDistance + 'px';
        drop.style.height = maxDistance + 'px';

        // calculate dimensions of drop
        dropWidth = getComputedStyle(this, null).getPropertyValue("width");
        dropHeight = getComputedStyle(this, null).getPropertyValue("height");

        // calculate relative coordinates of click
        // logic: click coordinates relative to page - parent's position relative to page - half of self height/width to make it controllable from the center
        x = e.pageX - this.offsetLeft - (parseInt(dropWidth, 10)/2);
        y = e.pageY - this.offsetTop - (parseInt(dropHeight, 10)/2) - 30;

        // position drop and animate
        drop.style.top = y + 'px';
        drop.style.left = x + 'px';
        drop.className += ' animate';
        e.stopPropagation();

    }
}

// Функция ymaps.ready() будет вызвана, когда
// загрузятся все компоненты API, а также когда будет готово DOM-дерево.
ymaps.ready(init);

function init() {
    var myPlacemark,
        myMap = new ymaps.Map('map', {
            center: [41.302933, 69.248274],
            zoom: 6,
            controls: ['zoomControl', 'searchControl', 'typeSelector',  'fullscreenControl','geolocationControl']
        });

    // Слушаем клик на карте.
    myMap.events.add('click', function (e) {
        var coords = e.get('coords');

        // Если метка уже создана – просто передвигаем ее.
        if (myPlacemark) {
            myPlacemark.geometry.setCoordinates(coords);
            $('#companies-latitude').val(myPlacemark.geometry.getCoordinates()[0]);
            $('#companies-longitude').val(myPlacemark.geometry.getCoordinates()[1]);
        }
        // Если нет – создаем.
        else {
            myPlacemark = createPlacemark(coords);
            $('#companies-latitude').val(myPlacemark.geometry.getCoordinates()[0]);
            $('#companies-longitude').val(myPlacemark.geometry.getCoordinates()[1]);
            myMap.geoObjects.add(myPlacemark);
            // Слушаем событие окончания перетаскивания на метке.
            myPlacemark.events.add('dragend', function () {
                getAddress(myPlacemark.geometry.getCoordinates());
                $('#companies-latitude').val(myPlacemark.geometry.getCoordinates()[0]);
                $('#companies-longitude').val(myPlacemark.geometry.getCoordinates()[1]);
            });
        }
        getAddress(coords);
    });

    // Создание метки.
    function createPlacemark(coords) {
        return new ymaps.Placemark(coords, {
            iconCaption: 'поиск...'
        }, {
            preset: 'islands#violetDotIconWithCaption',
            draggable: true
        });
    }

    // Определяем адрес по координатам (обратное геокодирование).
    function getAddress(coords) {
        myPlacemark.properties.set('iconCaption', 'поиск...');
        ymaps.geocode(coords).then(function (res) {
            var firstGeoObject = res.geoObjects.get(0);

            myPlacemark.properties
                .set({
                    // Формируем строку с данными об объекте.
                    iconCaption: [
                        // Название населенного пункта или вышестоящее административно-территориальное образование.
                        firstGeoObject.getLocalities().length ? firstGeoObject.getLocalities() : firstGeoObject.getAdministrativeAreas(),
                        // Получаем путь до топонима, если метод вернул null, запрашиваем наименование здания.
                        firstGeoObject.getThoroughfare() || firstGeoObject.getPremise()
                    ].filter(Boolean).join(', '),
                    // В качестве контента балуна задаем строку с адресом объекта.
                    balloonContent: firstGeoObject.getAddressLine()
                });
        });
    }
    myMap.behaviors.disable('scrollZoom');

    var ctrlKey = false;
    var ctrlMessVisible = false;
    var timer;

// Отслеживаем скролл мыши на карте, чтобы показывать уведомление
    myMap.events.add(['wheel', 'mousedown'], function(e) {
        if (e.get('type') == 'wheel') {
            if (!ctrlKey) { // Ctrl не нажат, показываем уведомление
                $('#ymap_ctrl_display').fadeIn(300);
                ctrlMessVisible = true;
                clearTimeout(timer); // Очищаем таймер, чтобы продолжать показывать уведомление
                timer = setTimeout(function() {
                    $('#ymap_ctrl_display').fadeOut(300);
                    ctrlMessVisible = false;
                }, 1500);
            }
            else { // Ctrl нажат, скрываем сообщение
                $('#ymap_ctrl_display').fadeOut(100);
            }
        }
        if (e.get('type') == 'mousedown' && ctrlMessVisible) { // Скрываем уведомление при клике на карте
            $('#ymap_ctrl_display').fadeOut(100);
        }
    });

// Обрабатываем нажатие на Ctrl
    $(document).keydown(function(e) {
        if (e.which === 17 && !ctrlKey) { // Ctrl нажат: включаем масштабирование мышью
            ctrlKey = true;
            myMap.behaviors.enable('scrollZoom');
        }
    });
    $(document).keyup(function(e) { // Ctrl не нажат: выключаем масштабирование мышью
        if (e.which === 17) {
            ctrlKey = false;
            myMap.behaviors.disable('scrollZoom');
        }
    });
}
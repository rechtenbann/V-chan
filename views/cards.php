<style>
    .container {
        width: 704px;
        height: 460px;
        position: absolute;
        top: 50%;
        background-color: white;
        left: 50%;
        transform: translate(-50%, -50%);
    }

    .cov {
        display: inline-block;
        height: 400px;
        width: 300px;
        margin: 15px;
        border-radius: 8px;
    }

    @media screen and (max-width: 700px) {
        .container {
            width: 100%;
            position: relative;
            transform: translate(0%, 0%);
            top: 0;
            left: 0;
        }

        .cov {
            display: block;
            height: 400px;
            width: 300px;
            margin: 15px auto;
        }
    }

    .atvImg {
        border-radius: 8px;
        transform-style: preserve-3d;
        -webkit-tap-highlight-color: rgba(#000, 0);
    }

    .atvImg img {
        border-radius: 8px;
        box-shadow: 0 2px 8px rgba(14, 21, 47, 0.25);
    }

    .atvImg-container {
        position: relative;
        width: 100%;
        height: 100%;
        border-radius: 8px;
        transition: all 0.2s ease-out;
    }

    .atvImg-container.over .atvImg-shadow {
        box-shadow: 0 45px 100px rgba(14, 21, 47, 0.4), 0 16px 40px rgba(14, 21, 47, 0.4);
    }

    .atvImg-layers {
        position: relative;
        width: 100%;
        height: 100%;
        border-radius: 8px;
        overflow: hidden;
        transform-style: preserve-3d;
    }

    .atvImg-rendered-layer {
        position: absolute;
        width: 100%;
        height: 100%;
        top: 0%;
        left: 0%;
        background-repeat: no-repeat;
        background-position: center;
        background-color: transparent;
        background-size: cover;
        transition: all 0.1s ease-out;
        overflow: hidden;
        border-radius: 8px;
    }

    .atvImg-shadow {
        position: absolute;
        top: 5%;
        left: 5%;
        width: 90%;
        height: 90%;
        transition: all 0.2s ease-out;
        box-shadow: 0 8px 30px rgba(14, 21, 47, 0.6);
    }

    .atvImg-shine {
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        border-radius: 8px;
        background: linear-gradient(135deg, rgba(255, 255, 255, .25) 0%, rgba(255, 255, 255, 0) 60%);
    }
</style>
<div style="text-align:center">
    <a href="miperfil.php">
    <div class="cov atvImg">
        <div class="atvImg-layer" data-img="img/bg.jfif" data-img-width="50px"></div>
        <div class="atvImg-layer" data-img="img/users/default1.png" data-img-width="50px"></div>
    </div>
    </a>
    <a href="miperfil.php">
    <div class="cov atvImg">
    <div class="atvImg-layer" data-img="img/bg.jfif" data-img-width="50px"></div>
        <div class="atvImg-layer" data-img="img/users/default2.png" data-img-width="50px"></div>
    </div>
    </a>
    <a href="miperfil.php">
    <div class="cov atvImg">
    <div class="atvImg-layer" data-img="img/bg.jfif" data-img-width="50px"></div>
        <div class="atvImg-layer" data-img="img/users/default3.png" data-img-width="50px"></div>
    </div>
    </a>

    <a href="miperfil.php">
    <div class="cov atvImg">
        <div class="atvImg-layer" data-img="img/bg.jfif" data-img-width="50px"></div>
        <div class="atvImg-layer" data-img="img/users/default4.png" data-img-width="50px"></div>
    </div>
    </a>
    <a href="miperfil.php">
    <div class="cov atvImg">
    <div class="atvImg-layer" data-img="img/bg.jfif" data-img-width="50px"></div>
        <div class="atvImg-layer" data-img="img/users/default5.png" data-img-width="50px"></div>
    </div>
    </a>
    <a href="miperfil.php">
    <div class="cov atvImg">
    <div class="atvImg-layer" data-img="img/bg.jfif" data-img-width="50px"></div>
        <div class="atvImg-layer" data-img="img/users/default6.png" data-img-width="50px"></div>
    </div>
    </a>
    </a>
    <!-- <a href="miperfil.php">
    <div class="cov atvImg">
    <div class="atvImg-layer" data-img="img/bg.jfif" data-img-width="50px"></div>
        <div class="atvImg-layer" data-img="img/users/default-secret.png" data-img-width="50px"></div>
    </div>
    </a> -->
</div>
<script>
    function atvImg() {
        var d = document,
            de = d.documentElement,
            bd = d.getElementsByTagName('body')[0],
            htm = d.getElementsByTagName('html')[0],
            win = window,
            imgs = d.querySelectorAll('.atvImg'),
            totalImgs = imgs.length,
            supportsTouch = 'ontouchstart' in win || navigator.msMaxTouchPoints;

        if (totalImgs <= 0) {
            return;
        }

        for (var l = 0; l < totalImgs; l++) {

            var thisImg = imgs[l],
                layerElems = thisImg.querySelectorAll('.atvImg-layer'),
                totalLayerElems = layerElems.length;

            if (totalLayerElems <= 0) {
                continue;
            }

            while (thisImg.firstChild) {
                thisImg.removeChild(thisImg.firstChild);
            }

            var containerHTML = d.createElement('div'),
                shineHTML = d.createElement('div'),
                shadowHTML = d.createElement('div'),
                layersHTML = d.createElement('div'),
                layers = [];

            thisImg.id = 'atvImg__' + l;
            containerHTML.className = 'atvImg-container';
            shineHTML.className = 'atvImg-shine';
            shadowHTML.className = 'atvImg-shadow';
            layersHTML.className = 'atvImg-layers';

            for (var i = 0; i < totalLayerElems; i++) {
                var layer = d.createElement('div'),
                    imgSrc = layerElems[i].getAttribute('data-img');

                layer.className = 'atvImg-rendered-layer';
                layer.setAttribute('data-layer', i);
                layer.style.backgroundImage = 'url(' + imgSrc + ')';
                layersHTML.appendChild(layer);

                layers.push(layer);
            }

            containerHTML.appendChild(shadowHTML);
            containerHTML.appendChild(layersHTML);
            containerHTML.appendChild(shineHTML);
            thisImg.appendChild(containerHTML);

            var w = thisImg.clientWidth || thisImg.offsetWidth || thisImg.scrollWidth;
            thisImg.style.transform = 'perspective(' + w * 3 + 'px)';

            if (supportsTouch) {
                win.preventScroll = false;

                (function(_thisImg, _layers, _totalLayers, _shine) {
                    thisImg.addEventListener('touchmove', function(e) {
                        if (win.preventScroll) {
                            e.preventDefault();
                        }
                        processMovement(e, true, _thisImg, _layers, _totalLayers, _shine);
                    });
                    thisImg.addEventListener('touchstart', function(e) {
                        win.preventScroll = true;
                        processEnter(e, _thisImg);
                    });
                    thisImg.addEventListener('touchend', function(e) {
                        win.preventScroll = false;
                        processExit(e, _thisImg, _layers, _totalLayers, _shine);
                    });
                })(thisImg, layers, totalLayerElems, shineHTML);
            } else {
                (function(_thisImg, _layers, _totalLayers, _shine) {
                    thisImg.addEventListener('mousemove', function(e) {
                        processMovement(e, false, _thisImg, _layers, _totalLayers, _shine);
                    });
                    thisImg.addEventListener('mouseenter', function(e) {
                        processEnter(e, _thisImg);
                    });
                    thisImg.addEventListener('mouseleave', function(e) {
                        processExit(e, _thisImg, _layers, _totalLayers, _shine);
                    });
                })(thisImg, layers, totalLayerElems, shineHTML);
            }
        }

        function processMovement(e, touchEnabled, elem, layers, totalLayers, shine) {

            var bdst = bd.scrollTop || htm.scrollTop,
                bdsl = bd.scrollLeft,
                pageX = (touchEnabled) ? e.touches[0].pageX : e.pageX,
                pageY = (touchEnabled) ? e.touches[0].pageY : e.pageY,
                offsets = elem.getBoundingClientRect(),
                w = elem.clientWidth || elem.offsetWidth || elem.scrollWidth,
                h = elem.clientHeight || elem.offsetHeight || elem.scrollHeight,
                wMultiple = 320 / w,
                offsetX = 0.52 - (pageX - offsets.left - bdsl) / w,
                offsetY = 0.52 - (pageY - offsets.top - bdst) / h,
                dy = (pageY - offsets.top - bdst) - h / 2,
                dx = (pageX - offsets.left - bdsl) - w / 2,
                yRotate = (offsetX - dx) * (0.07 * wMultiple),
                xRotate = (dy - offsetY) * (0.1 * wMultiple),
                imgCSS = 'rotateX(' + xRotate + 'deg) rotateY(' + yRotate + 'deg)',
                arad = Math.atan2(dy, dx),
                angle = arad * 180 / Math.PI - 90;

            if (angle < 0) {
                angle = angle + 360;
            }

            if (elem.firstChild.className.indexOf(' over') != -1) {
                imgCSS += ' scale3d(1.07,1.07,1.07)';
            }
            elem.firstChild.style.transform = imgCSS;

            shine.style.background = 'linear-gradient(' + angle + 'deg, rgba(255,255,255,' + (pageY - offsets.top - bdst) / h * 0.4 + ') 0%,rgba(255,255,255,0) 80%)';
            shine.style.transform = 'translateX(' + (offsetX * totalLayers) - 0.1 + 'px) translateY(' + (offsetY * totalLayers) - 0.1 + 'px)';

            var revNum = totalLayers;
            for (var ly = 0; ly < totalLayers; ly++) {
                layers[ly].style.transform = 'translateX(' + (offsetX * revNum) * ((ly * 2.5) / wMultiple) + 'px) translateY(' + (offsetY * totalLayers) * ((ly * 2.5) / wMultiple) + 'px)';
                revNum--;
            }
        }

        function processEnter(e, elem) {
            elem.firstChild.className += ' over';
        }

        function processExit(e, elem, layers, totalLayers, shine) {

            var container = elem.firstChild;

            container.className = container.className.replace(' over', '');
            container.style.transform = '';
            shine.style.cssText = '';

            for (var ly = 0; ly < totalLayers; ly++) {
                layers[ly].style.transform = '';
            }

        }

    }

    atvImg();
</script>
let timer, start, stamptool, rbtn, lbtn, cbtn
let homeLocation = [x = 0, y = 0]
let duration = 250;

function initAnimation() {
    stamptool = document.querySelector('.stamptool');

    homeLocation[0] = document.querySelector('.stampHome').getBoundingClientRect().right
    homeLocation[1] = document.querySelector('.stampHome').getBoundingClientRect().top

    console.log(document.querySelector('.stampHome').getBoundingClientRect())

    rbtn = document.querySelector('.rbtn');
    lbtn = document.querySelector('.lbtn');
    try {
        rbtn.addEventListener('mouseover', (event) => rbtnHover())
        rbtn.addEventListener('mouseout', (event) => returnhome())
    } catch (e) {
        console.log(e)
    }

    try {
        lbtn.addEventListener('mouseover', (event) => lbtnHover())
        lbtn.addEventListener('mouseout', (event) => returnhome())
    } catch (e) {
        console.log(e)
    }
};

function rbtnHover() {
    console.log("Hello rbtn here!")
    clearInterval(timer);
    start = Date.now();
    timer = setInterval(moverbtn, duration / 1000);
}

function lbtnHover() {
    console.log("Hello lbtn here!")
    clearInterval(timer);
    start = Date.now();
    timer = setInterval(movelbtn, duration / 1000);
}
function returnhome() {
    console.log("home!")
    clearInterval(timer);
    start = Date.now();
    timer = setInterval(home, duration / 1000);
}

function home() {
    let timepassed = Date.now() - start;

    if (timepassed >= duration) {
        clearInterval(timer)
        return
    } else {
        stamptool.style = ''
        stamptool.classList.add('home')
    }
}

function moverbtn() {
    let timepassed = Date.now() - start;

    if (timepassed >= duration) {
        clearInterval(timer);
        cbtn = rbtn;
        start = Date.now()
        timer = setInterval(update, duration / 1000);
        return;
    } else {
        drawposition(rbtn, timepassed);
    }
}

function movelbtn() {
    let timepassed = Date.now() - start;

    if (timepassed >= duration) {
        clearInterval(timer);
        cbtn = lbtn;
        start = Date.now()
        timer = setInterval(update, duration / 1000);
        return;
    } else {
        drawposition(lbtn, timepassed);
    }
}

function drawposition(btn, time) {
    let delta = [x, y]
    let alpha = time / duration;

    delta[0] = stamptool.getBoundingClientRect().left - btn.getBoundingClientRect().left;
    delta[1] = stamptool.getBoundingClientRect().top - btn.getBoundingClientRect().top;

    stamptool.style.left = returnX(btn);
    stamptool.style.top = btn.getBoundingClientRect().y - stamptool.getBoundingClientRect().height - 15 + 'px'
    stamptool.classList.remove('home')
}

function update() {
    let timepassed = Date.now() - start;

    if (timepassed >= duration) {
        clearInterval(timer)
        start = Date.now()
        timer = setInterval(update, duration / 1000)
        return;
    }
    stamptool.style.top = cbtn.getBoundingClientRect().y - stamptool.getBoundingClientRect().height - 15 + 'px';
    stamptool.classList.remove('home')
    console.log("update - loop")
}

function returnX(btn) {
    if(window.innerWidth > 800) {
        return btn.getBoundingClientRect().x + window.scrollX + (btn.getBoundingClientRect().width - stamptool.getBoundingClientRect().width) / 2 - ((window.innerWidth-800) / 2)+ 'px'
    } else {
        return btn.getBoundingClientRect().x + window.scrollX + (btn.getBoundingClientRect().width - stamptool.getBoundingClientRect().width) / 2 + 'px'
    }
}
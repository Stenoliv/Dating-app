document.querySelectorAll('.match-chat-btn').forEach((elem) => {
    elem.addEventListener("click", function () {
        const xhttp = new XMLHttpRequest();
        xhttp.onload = function () {
            const box = document.querySelector('.chatbox');
            box.innerHTML = this.responseText;
            scrollDown(document.querySelector('.chat-view'));
        }
        xhttp.open("GET", "../scripts/php/ajax/openChat.php?id=" + elem.dataset.user_id)
        xhttp.send();
    })
})

function loadInFirstChat(elem) {
    const xhttp = new XMLHttpRequest();
    xhttp.onload = function () {
        document.querySelector('.chatbox').innerHTML = this.responseText;
        scrollDown(document.querySelector('.chat-view'));
    }
    xhttp.open("GET", "../scripts/php/ajax/openChat.php?id=" + elem.dataset.user_id)
    xhttp.send();
}
/*
setInterval(function() {
    const xhttp = new XMLHttpRequest
    const id = document.querySelector('.chat-text-field').dataset.other_id
    xhttp.onload = function () {
        const lastHeitght = document.querySelector('.chat-view').scrollTop
        document.querySelector('.chatbox').innerHTML = this.responseText;
        document.querySelector('.chat-view').scrollTop = lastHeitght
    }
    xhttp.open("GET", "../scripts/php/ajax/refreshChat.php?id="+id)
    xhttp.send();
    console.log("RefreshChat()")
}, 3000)*/
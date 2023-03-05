function sendChat() {
    console.log("sendButton()");
    const xhttp = new XMLHttpRequest();
    const msg = document.querySelector('.chat-text-field')
    xhttp.onload = function () {
        addComment(this.response);
    }
    xhttp.open('GET', '../scripts/php/ajax/sendChat.php?msg=' + msg.value + '&otherID=' + msg.dataset.other_id);
    xhttp.send();
}

function checkIfJSON(input) {
    try {
        JSON.parse(input)
    } catch (e) {
        return false;
    }
    return true;
}

function addComment(json) {
    if (checkIfJSON(json)) {
        data = JSON.parse(json)
        const xhttp = new XMLHttpRequest;
        const msg = document.querySelector('.chat-text-field')
        xhttp.onload = function () {
            const box = document.querySelector('.chatbox')
            box.innerHTML = this.responseText;
            box.scrollTop = box.scrollHeight;
            document.querySelector('.chat-text-field').value = ""
            scrollDown(document.querySelector('.chat-view'))
        }
        xhttp.open('GET', '../scripts/php/ajax/openChat.php?id=' + msg.dataset.other_id);
        xhttp.send();
    } else {
        console.log("ERROR")
    }
}

function scrollDown(elem) {
    elem.scroll({top: elem.scrollHeight, behavior: "smooth"})
    console.log("scroll")
}
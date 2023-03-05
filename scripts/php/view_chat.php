<div class="view_chat-match_box">
    <div class="matches">
        <?php include "../scripts/php/view_matches.php" ?>
        <script src="../scripts/js/matched_chat_functions.js"></script>
        <script src="../scripts/js/matched_btns.js"></script>
    </div>
    <div class="chatbox-messagers">
        <div class="chatbox">
        </div>
    </div>
    <script>
        window.addEventListener('load', (event) => {
            console.log("loaded")
            const firstElem = document.querySelector(".matches").children[0];
            const box = document.querySelector(".chat-view")
            loadInFirstChat(firstElem)
        })
    </script>

</div>
<li><a href='./profile.php'><?= $_SESSION['username'] ?>'s profile</a></li>
<li><a href='../scripts/php/model_logout.php'>Logout</a></li>
<li><span id="match-btn">Match</span></li>
<li><a href="./like.php">Likes</a></li>
<li><a href="./chat.php">Chat</a></li>
<script>
    document.querySelector('#match-btn').addEventListener('click', (event) => {
        const xhttp = new XMLHttpRequest;
        xhttp.onload = function() {
            window.location.href = './match.php';
        }
        xhttp.open('GET', '../scripts/php/ajax/emptyMatchCookie.php');
        xhttp.send();
    })
</script>
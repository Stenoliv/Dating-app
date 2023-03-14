document.querySelector(".openfilter").addEventListener("click",displayscript);
var x = document.querySelector(".filter");
var y = document.querySelector(".openfilter")
function displayscript()
{
    if(x.style.display === 'none')
    {
        x.style.display = 'block';
        y.innerHTML = "Close filter";
    }
    else 
    {
        x.style.display = 'none';
        y.innerHTML = "Open filter";
    }
}
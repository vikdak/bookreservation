
const checkbox= document.querySelector('#reserved');
if(checkbox){
    checkbox.addEventListener("click", handleCheckbox);
}
function handleCheckbox(e){
    const article = e.target.closest('form');
    const userSelect = article.querySelector('#user_id');
    if(this.checked){
        userSelect.removeAttribute('disabled');
    }else{
        userSelect.setAttribute('disabled', true);
    }

}


const buttons = document.querySelectorAll('.reserved');

let i;
for(i=0; i<buttons.length; i++){
    buttons[i].addEventListener("click", handleButtonClick)
}
let reservedImg;
function handleButtonClick(e){
    const article =  e.target.closest('article');
    reservedImg = article.querySelector('.reservedImg');
    const bookId=article.dataset.bookId;
    const userId=article.dataset.userId;
    makeRequest(userId, bookId);
    reservedImg.classList.remove('displayNone');
}

let httpRequest;
function makeRequest(userId, bookId) {

    httpRequest = new XMLHttpRequest();
    if (!httpRequest) {
        alert("Giving up :( Cannot create an XMLHTTP instance");
        return false;
    }
    httpRequest.onreadystatechange = alertContents;
    httpRequest.open("GET", `reserveAjax.php?book_id=${bookId}&user_id=${userId}`);
    // httpRequest.setRequestHeader("Content-Type", "application/json");
    httpRequest.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
    // httpRequest.send(JSON.stringify({id:1}));
    httpRequest.send();

}

function alertContents() {
    if (httpRequest.readyState === XMLHttpRequest.DONE) {
        if (httpRequest.status === 200) {
            reservedImg.classList.remove('displayNone');
            console.log(httpRequest.responseText);
        } else {
            alert("There was a problem with the request.");
        }
    }
}
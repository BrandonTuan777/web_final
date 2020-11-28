//Auto picture

function generator() {

    // for (let index = 0; index < 10; index++) {
        var random = Math.floor((Math.random() * 6) + 1);
        document.getElementById('divImage').innerHTML = `
        <img src="./img/pic${random}.jpg" style="width:auto;">
    `;
    // }

}
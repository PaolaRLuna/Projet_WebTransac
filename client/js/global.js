function switchLike() {
    // let listeFavoris = document.getElementsByClassName("etat-like");
    // for (let i=0; i<listeFavoris.length; i++) {
    //     listeFavoris[i].addEventListener("click", () => {
    //         listeFavoris[i].setAttribute("src", 'client/images/general/notlike.png');
    //     })
    // }
    if (src.equals('client/images/general/notlike.png')) {
        this.setAttribute("src", 'client/images/general/like.png');
    } else {
        this.setAttribute("src", 'client/images/general/notlike.png');
    }
    
}
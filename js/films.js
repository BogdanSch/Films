$(document).ready(function() {
    const filmsLinks = document.querySelectorAll(".films__button");
    const filmsItems = document.querySelectorAll(".films__item");

    console.log(filmsLinks, filmsItems);

    function disableAllFilms(isDisable) {
        filmsItems.forEach((el, key) => {
            if(isDisable)
                el.style = "transform: translate(500%, 0);";
            else 
                el.style = "display: block;";
        });
    }

    filmsLinks.forEach((el, key) => {
        el.addEventListener("click", (e) => {
            disableAllFilms(true);
            let elName = el.innerHTML;

            if(elName == "All"){
                disableAllFilms(false);
            }
            else if(elName == "Space opera"){
                let spaceOperaFilms = document.querySelectorAll(".space");
                console.log(spaceOperaFilms);
                spaceOperaFilms.forEach((element) => {
                    element.style = "display: block;";
                });
            }
            else if(elName == "Science fiction"){
                let spaceOperaFilms = document.querySelectorAll(".fiction");
                console.log(spaceOperaFilms);
                spaceOperaFilms.forEach((element) => {
                    element.style = "transform: translate(-100%, -50%);";
                });
            }
            else if(elName == "Superhero film"){
                let spaceOperaFilms = document.querySelectorAll(".superhero");
                console.log(spaceOperaFilms);
                spaceOperaFilms.forEach((element) => {
                    element.style = "transform: translate(-200%, 0);";
                });
            }
        })
    });
})
$(document).ready(function() {
    let path = window.location.pathname;
    let page = path.split("/").pop();

    console.log( page );
    const headerLinks = document.querySelectorAll(".link a");

    if(page == "profile.php"){
        clearAllLinks(headerLinks);
        headerLinks[3].setAttribute("class", "active");
    }

    function clearAllLinks(links) {
        headerLinks.forEach((el, key) => {
            el.removeAttribute("class");
        });
    }

    headerLinks.forEach((el, key) => {
        el.addEventListener("click", (e) => {
            clearAllLinks(headerLinks);
            el.setAttribute("class", "active");
        })
    });
})
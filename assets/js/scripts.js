let btnScrollToTop = document.getElementById("scroll-to-top-btn");
if(btnScrollToTop){
    btnScrollToTop.addEventListener("click", function(){
        window.scrollTo(0, 0);
    });
}

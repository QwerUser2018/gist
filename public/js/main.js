


Event={

    init(){
        addEventListener("click", (e) => {
            if (e.target.matches("addCategorybtn")) {
                //document.querySelector('.addCategory').className="visible";
            alert("hello")
            }
        });
    }
};




    document.addEventListener("DOMContentLoaded",e=>Event.init());

let filters = document.getElementsByClassName("filter");
console.log(filters);
for(let i = 0; i<filters.length; i++) {
    filters[i].addEventListener("click", function() {
        for(let i=0; i<filters.length; i++){
            filters[i].classList.remove("active");
        }
        filters[i].classList.add("active");
        // filter product
        temp = filters[i];
        let buy_hover = document.getElementsByClassName("buy_hover");
        for(let i=0; i<buy_hover.length; i++) {
                if(buy_hover[i].dataset.items != temp.dataset.filter) {
                    buy_hover[i].style.display = "none";
                }else{
                    buy_hover[i].style.display = "block";
                }
        }
    })
}

// 
let filter = (data) => {
    let item = document.getElementsByClassName("page-link");
    let x = "<p style='color: red; margin-bottom:0;'>";
    let y = "</p>";
    item[data-1].innerHTML = x+data+y;
    console.log(item[data]);
}


// active


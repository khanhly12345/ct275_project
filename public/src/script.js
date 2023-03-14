
    // $(".buy_hover").each(function(element){
    //     $(this).hover(function(event){
    //         $('.buy').each(function(index){
    //             if(element==index) {
    //                 $('.buy').css('display','block');
    //             }
    //         })
    //     },function(){
    //         $('.buy').css('display','none');
    //     });
    // })
    
let buy_hover = document.getElementsByClassName("buy_hover");
let buy = document.getElementsByClassName("buy");
let img = document.querySelectorAll(".buy_hover img");
console.log(buy_hover);
console.log(img)
for(let i=0; i<buy_hover.length; i++) {
    buy_hover[i].addEventListener("mouseover", function() {
        buy[i].style.display = "block";
        img[i].style.opacity = "0.5";
    })
    buy_hover[i].addEventListener("mouseout", function() {
        buy[i].style.display = "none";
        img[i].style.opacity = "1";
    })
}

// minus and add
let pre = document.getElementsByClassName("pre")[0];
let next = document.getElementsByClassName("next")[0];
let form_control = document.getElementsByClassName("form-control")[2]; 
console.log(typeof(Number(form_control.value)));
    pre.addEventListener("click", () => {
        if(form_control.value == 1) {
            return;
        }else{
            form_control.value = form_control.value - 1;
        }
    })

    next.addEventListener("click", () => {
        if(form_control.value < 1) {
            return;
        }else{
            form_control.value = Number(form_control.value) + 1;
        }
    })

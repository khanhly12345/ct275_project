// cart
let Plus = (count, id) => {
    console.log("helo");
    let number1 = document.getElementsByClassName("number1")[count];
    number1.innerHTML = number1.value++;
    window.location = 'http://localhost:/ct275-project-Taib2014783/public/src/update_cart.php?id=' + id+'&'+'sluong='+number1.value;
}

let Minus = (count, id) => {
    let number1 = document.getElementsByClassName("number1")[count];
    if(number1.value != 1){
        number1.innerHTML = number1.value--;
        window.location = 'http://localhost:/ct275-project-Taib2014783/public/src/update_cart.php?id=' + id+'&'+'sluong='+number1.value;
    }
}
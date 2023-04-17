// cart
let Plus = (count, id) => {
    console.log("helo");
    let number1 = document.getElementsByClassName("number1")[count];
    number1.innerHTML = number1.value++;
<<<<<<< HEAD
    window.location = 'http://localhost:/Project_ct275/public/src/update_cart.php?id=' + id+'&'+'sluong='+number1.value;
=======
    window.location = 'http://localhost:/ct275-project-Taib2014783/public/src/update_cart.php?id=' + id+'&'+'sluong='+number1.value;
>>>>>>> cd13de17b841c3187a316c414c48aa1b44295431
}

let Minus = (count, id) => {
    let number1 = document.getElementsByClassName("number1")[count];
    if(number1.value != 1){
        number1.innerHTML = number1.value--;
<<<<<<< HEAD
        window.location = 'http://localhost:/Project_ct275/public/src/update_cart.php?id=' + id+'&'+'sluong='+number1.value;
=======
        window.location = 'http://localhost:/ct275-project-Taib2014783/public/src/update_cart.php?id=' + id+'&'+'sluong='+number1.value;
>>>>>>> cd13de17b841c3187a316c414c48aa1b44295431
    }
}
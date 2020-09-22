function start(){
    var tempo = document.querySelector("span")
    var hora = 2
    var minuto = 0
    var segundo = '' + "0"
    var sec = 1000

    var t = setInterval(function(){
        var temp3 = (hora < 10 ? "0" + hora : hora)
        + ":" + (minuto < 10 ? "0" + minuto : minuto)
        + ":" + (segundo < 10 ? "0" + segundo : segundo)
        tempo.innerHTML = temp3

        if(segundo == '' + "0"){
            segundo = 59
        }else{
            segundo -= 1
        }
        if(segundo == 0){
            minuto -= 1
        }
        if(minuto == 0){
            minuto = 59
            hora -= 1
        }
        if(hora == - 1){
            minuto = 0
            hora = 0
        }
        if(minuto == - 1){
            clearInterval(t)
            window.location.href="login.php"
        }


    }, sec)


}
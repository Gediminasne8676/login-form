console.log("Hello world!");

    function lettersOnly(input){//jeigu kazka parasai y "input" lauka, paema mygtuko reiksme
        var regex = /[^0-9a-z]/gi;//regex paema visus simbolius APART - raides nuo a-z ir skaicius nuo 0-9, bei didziasias raides A-Z
        input.value = input.value.replace(regex, "");//jeigu irasytas input atitinka paimta simboliu aibe, istrinta irasyta simboli
    }

    function changeButtonStatusTo(color,id){//si funkcija keicia mygtuko spalva keisdama jo klase, bei dadeda teksto mygtuko value
        switch(color){//jeigu color 
            case "red"://lygu red
                document.getElementById(id).classList.add('btn-danger');//dadedam klase btn-danger
                document.getElementById(id).innerText += " : false";//dadedam teksta false
            break;


            case "green"://lygu green
                document.getElementById(id).classList.add('btn-success');//dadedam klase btn-success
                document.getElementById(id).innerText += " : true";//dadedam teksta true
            break;
        }
    };


$('#login-form-tab').click(function(e){//kuomen paspaudziama korteles navigationo mygtukas su id login-form-tab paemam korteles navigationo mygutka kaip elementa
    $("#login-form").delay(100).fadeIn(100);//atverciam po 1 sekundes delay login korteles turiny
    $("#register-form").fadeOut(100);//paslepiam per ta sekunde register forma
    $('#register-form-tab').removeClass('active');//pakeiciam korteles navigationo mygtuko klase (atspaudziam mygutka)
    $(this).addClass('active');//nuspaudziam korteles kita nav mygtuka
    e.preventDefault();//sustabdom evento vykyma
});

$('#register-form-tab').click(function(e){//kuomen paspaudziama korteles navigationo mygtukas su id register form tab paemam korteles navigationo mygutka kaip elementa
    $("#register-form").delay(100).fadeIn(100);//atverciam po 1 sekundes delay register korteles turiny
    $("#login-form").fadeOut(100);//paslepiam per ta sekunde login forma
    $('#login-form-tab').removeClass('active');//pakeiciam korteles navigationo mygtuko klase (atspaudziam mygutka)
    $(this).addClass('active');//nuspaudziam korteles kita nav mygtuka
    e.preventDefault();//sustabdom evento vykyma
});



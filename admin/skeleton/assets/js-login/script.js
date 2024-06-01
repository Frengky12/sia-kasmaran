function toggleMenu(){
    let toggle = document.querySelector('.toggle');
    let navigation = document.querySelector('.navigation');
    let main = document.querySelector('.main');
    toggle.classList.toggle('active')
    navigation.classList.toggle('active')
    main.classList.toggle('active')
}
function showPassword(){
    var x = document.getElementById("password");
    if (x.type === "password"){
        x.type = "text";
    } else{
        x.type = "password";
    }
}


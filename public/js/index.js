function paises(){
    var monto = $('#monto').val();
    var pais = $('#pais').val();
    if(pais==''){
        alert('Debes de seleccionar el pais');
        return false;
    }
    if(monto==''){
        alert('Debes de seleccionar el monto');
        return false;
    }
}
function selected(){
    let country = document.getElementById('pais').value;
    let monto = document.getElementById('monto').value;
    document.getElementById('country').value = country;
    const dolar = 3836;
    var mount;
    if(country=='CO'){
        document.getElementById('denomination').innerHTML= 'COP';
        mount = dolar * monto;
    }else{
        document.getElementById('denomination').innerHTML= 'USD';
        mount = monto;
    }
    document.getElementById('mount').innerHTML= mount;
    document.getElementById('realmonto').value = mount;
}

function cardFormValidate(){
    var cardValid = 0;
    var cn = $('#card_number').val();
    //card number validation
    var valor = parseInt(cn);
        if(cn!==''){
            if (isNaN(valor)) {
                    $("#card_number").val('').focus();    
            }else{
                cardValid = 1;
            }   
        }else{
            cardValid = 0;
        }
  console.log(String(valor).length);
      
    //card details validation
    var cardName = $("#name_on_card").val();
    var expMonth = $("#expiry_month").val();
    var expYear = $("#expiry_year").val();
    var country = $("#country").val();
    var cvv = $("#cvv").val();
    var regName = /^[a-z ,.'-]+$/i;
    var regMonth = /^01|02|03|04|05|06|07|08|09|10|11|12$/;
    var regYear = /^2021|2022|2023|2024|2025|2026|2027|2028|2029|2030|2031$/;
    var regCVV = /^[0-9]{3,3}$/;
    var regNumber = /^[0-9]{12,12}$/;
    

    if (cardValid == 0) {
        
        alert("Debes de digitar el numero de tarjeta");
        
        $("#card_number").focus();
        return false;
    }else if(String(valor).length < 16){
        alert("Debes de digtar un numero de tarjeta valido");
        $("#card_number").val('').focus();
        return false;
    }else if (!regMonth.test(expMonth)) {
        alert("Debes de digitar el mes");
        $("#expiry_month").val('').focus();
        return false;
    }else if (!regYear.test(expYear)) {
        alert("Debes de digitar el año");
        $("#expiry_year").val('').focus();
        return false;
    }else if (!regCVV.test(cvv)) {
        alert("Debes de digitar el cvv");
        $("#cvv").focus();
        return false;
    }else if (!regName.test(cardName)) {
        alert("Debes de digitar el nombre de la tarjeta");
        $("#name_on_card").val('').focus();
        return false;
    }else{
       
        $('#frmCrear').submit();
    }
}


$(document).ready(function() {

$('#frmCrear').on('submit', function(e){
    e.preventDefault();
    let form = $(this)[0];
    let datos = new FormData(form);
    axios.post(form.action, datos).then((res) => {
        Swal.fire(
            'Good job!',
             res.data.Msj,
            'success'
          )
        location.href = '/recarga/'+res.data.ultimo;
        form.reset();
    }, (err) => {
        if(err.response.status == 422){
            alert(Object.values(err.response.data.errors)[0]);
        }else{

            Swal.fire(
                'Error!',
                 'Error al salvar la recarga',
                'danger'
              )
        }
    });
});


});
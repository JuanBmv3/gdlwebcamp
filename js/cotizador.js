(function () {
    "use strict";

    // MAPA
    if (document.getElementById('mapa')){
        var map = L.map('mapa').setView([20.676595, -103.348037], 19);

        L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
        }).addTo(map);

        L.marker([20.676595, -103.348037]).addTo(map)
        .bindPopup('GDLWebCamp 2020 <br> Boletos ya disponibles')
        .openPopup()
        .bindTooltip('Un Tooltip')
        .openTooltip()

    }

    document.addEventListener('DOMContentLoaded', function () {
        
        //Campos datos usuario
        var nombre = document.getElementById('nombre');
        var apellido = document.getElementById('apellido');
        var email = document.getElementById('email');


        // Campos pases
        var pase_dia = document.getElementById('pase_dia');
        var pase_2dias = document.getElementById('pase_2dias');
        var pase_completo = document.getElementById('pase_completo');

        //Botones y divs

        var calcular = document.getElementById('calcular');
        var errorDiv = document.getElementById('error');
        var btnregistro = document.getElementById('btnRegistro');
        var resultado = document.getElementById('lista_productos');
        var suma = document.getElementById('suma_total');
        var regalo = document.getElementById('regalo');

        btnregistro.disabled=true;

        //Extras
        var camisas = document.getElementById('camisa_evento');
        var etiquetas = document.getElementById('etiquetas');

        if(document.getElementById('calcular')) {
        calcular.addEventListener ('click', calcularMontos); // El boton escucha al ser presionado
        pase_dia.addEventListener ('blur', mostrarDias); 
        pase_2dias.addEventListener('blur',mostrarDias);
        pase_completo.addEventListener ('blur', mostrarDias);
        nombre.addEventListener ('blur', validarCampos); 
        apellido.addEventListener ('blur', validarCampos); 
        email.addEventListener ('blur', validarCampos); 
        email.addEventListener ('blur', validarMail); 
        
        function validarCampos(){
            if(this.value == ''){
                errorDiv.style.display = 'block';
                errorDiv.innerHTML = "Este campo es obligatorio";
                this.style.border = '1px solid red'
                errorDiv.style.border = '2px solid red';
            }else{
                errorDiv.style.display = 'none';
                this.style.border = '1px solid gray';
            }
        }

        function validarMail(){
            if(this.value.indexOf("@") > -1){ // Siempre nos pone un -1 si es que no se encuentra el valor
                errorDiv.style.display = 'none';
                this.style.border = '1px solid gray';
            }else{
                errorDiv.style.display = 'block';
                errorDiv.innerHTML = "Debe tener almenos una @";
                this.style.border = '1px solid red'
                errorDiv.style.border = '2px solid red';
            }
        }
        

        function calcularMontos(event){
            event.preventDefault();
            if(regalo.value === ''){
                alert("Debes elegir un regalo");
                regalo.focus();
            }else{
                var boletosDia = parseInt(pase_dia.value, 10) || 0,
                    boletos2Dias = parseInt(pase_2dias.value, 10) || 0,
                    boletosCompleto = parseInt(pase_completo.value, 10) || 0,
                    cantCamisas = parseInt(camisas.value, 10) || 0,
                    cantEtiquetas = parseInt(etiquetas.value, 10) || 0;

                var totalPagar = (boletosDia * 30) + (boletos2Dias * 45) + (boletosCompleto * 50) +
                ((cantCamisas * 10) * .93) + (cantEtiquetas * 2);

                var listadoProductos = [];
                if(boletosDia >= 1) {
                    listadoProductos.push(boletosDia + ' Pases por día'); 
                }

                if(boletos2Dias >= 1) {
                    listadoProductos.push(boletos2Dias + ' Pases por 2 días');
                }

                if(boletosCompleto >= 1) {
                    listadoProductos.push(boletosCompleto + ' Pases Completos');
                }

                if(cantCamisas >= 1) {
                    listadoProductos.push(cantCamisas+ ' Camisas');
                }

                if(cantEtiquetas >= 1) {
                    listadoProductos.push(cantEtiquetas + ' Etiquetas');
                }
                lista_productos.style.display = "block";
                lista_productos.innerHTML = ''; // crearlo vacio para despues llenarlo

                for (var i =0 ; i < listadoProductos.length ; i++) { // Generacion de productos
                    lista_productos.innerHTML += listadoProductos[i] + '<br/>';
                }
                
                suma.innerHTML= "$ " + totalPagar.toFixed(2); // nos regresa dos decimales

                btnregistro.disabled=false;
                document.getElementById('total_pedido').value = totalPagar;

            }
            
        }
        function mostrarDias(){
            var boletosDia = parseInt(pase_dia.value, 10) || 0,
                boletos2Dias = parseInt(pase_2dias.value, 10) || 0,
                boletosCompleto = parseInt(pase_completo.value, 10) || 0;

                var diasElegidos = [];

                if(boletosDia > 0 ){
                    diasElegidos.push('viernes');
                    
                }
                if(boletos2Dias > 0 ){
                    diasElegidos.push('viernes','sabado');
                    
                }
                if(boletosCompleto > 0 ){
                    diasElegidos.push('viernes','sabado','domingo');
                }

                for( var i = 0; i < diasElegidos.length ; i++){
                    document.getElementById(diasElegidos[i]).style.display = "block";
                }
        }
        
    }

    }); // DOM CONTENT LOAD
})();
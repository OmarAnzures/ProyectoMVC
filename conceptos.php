
<?php
session_start();

// Verificar si el usuario está autenticado
if (!isset($_SESSION["email"])) {
    // Redirigir al usuario a la página de inicio de sesión requerida
    header("Location: /Nolas/vista/error_autenticacion.php");
    exit(); // Asegurar que el resto del código no se ejecute
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="/Nolas/css/styles.css">
   <link rel="stylesheet" href="/Nolas/css/modal.css">
  <link rel="stylesheet" href="/Nolas/css/stylesConceptBasicos.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
  <style>
    .hidden {
      display: none;
    }

    #buton {
      margin: 50px;
      margin-left: 25%;
    }

    #div2 .form-group {
      margin-top: 20px;
    }

    .label {
      position: absolute;
      top: 25px;
      text-align: center;
      font-size: 12px;
    }

    #fraccion {
      top: 40px;
    }

    .point {
      position: absolute;
      width: 10px;
      height: 10px;
      background-color: yellow;
      border-radius: 50%;
      z-index: 1;
    }

    button {
      margin: 10px;
      padding: 10px 20px;
      font-size: 16px;
      cursor: pointer;
      background-color: black;
      color: #fff;
      border: none;
      border-radius: 4px;
    }

    button.btn.btn-danger {
      position: fixed;
      right: 0;
    }
  </style>
  <title>Mostrar/Ocultar Divs</title>
</head>

<body>
<nav>
        <ul>
            <li><a href="/Nolas/vista/contenido.php">contenido</a></li>
            <li><a href="/Nolas/vista/conceptos.php">Inicio</a></li>
            <li><a href="/Nolas/vista/nosotros.php">Nosotros</a></li>
            <li><a href="/Nolas/vista/servicios.php">Servicios</a></li>
            <li><a href="/Nolas/vista/contacto.php">Contacto</a></li>
            <li id="logout"><a href="/Nolas/vista/inicio.php" onclick="logout()">Cerrar Sesión</a></li>
        </ul>
    </nav>

  <div class="container">

    <!-- Button trigger modal -->
    <button type="button" id="ModalAyuda" class="btn btn-danger hidden" data-bs-toggle="modal"
      data-bs-target="#exampleModal">
      Ayuda
    </button>
    <!--Fin Button trigger modal -->

    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" style="max-width: 700px;">
        <div class="modal-content">
          <div class="modal-header">
            <h1 class="modal-title fs-5" id="exampleModalLabel">RECTA NÚMERICA CON FRACCIONES</h1>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <img src="/Nolas/img/ayudaRectaFracciones.jpg" style="width: 650px; height: 400px;">
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
          </div>
        </div>
      </div>
    </div>
    <!--Fin Modal -->

    <div class="row">
      <div class="col-6">
        <button id="buton" onclick="mostrarDiv('div1')">RECTA NÚMERICA CON ENTEROS</button>
      </div>
      <div class="col-6">
        <button id="buton" onclick="mostrarDiv('div2')">RECTA NÚMERICA CON FRACCIONES</button>
      </div>
    </div>

    <div id="div1" class="form-group hidden mt-0">
      <label for="start-input">Inicio del rango:</label>
      <input type="number" class="form-control" id="start-input" placeholder="Ingrese el inicio del rango">

      <label class="mt-3" for="end-input">Fin del rango:</label>
      <input type="number" class="form-control" id="end-input" placeholder="Ingrese el fin del rango">

      <label class="mt-3" for="step-input">Separación de unidades:</label>
      <input type="number" class="form-control" id="step-input" placeholder="Ingrese la separación de unidades">

      <label class="mt-3" for="point-input">Ubicar punto</label>
      <input type="number" class="form-control" id="point-input" placeholder="Ingrese un valor">

      <button class="mt-5" id="button">Crear Recta</button>

      <div id="number-line" class="number-line mt-5"></div>
    </div>

    <div id="div2" class="hidden">
      <div class="form-group mt-0">
        <label class="mt-3" for="start-fraction-input">Inicio del rango:</label>
        <input type="number" class="form-control" id="start-fraction-input" placeholder="Ingrese el inicio del rango">
      </div>

      <label class="mt-3" for="end-fraction-input">Fin del rango:</label>
      <input type="number" class="form-control" id="end-fraction-input" placeholder="Ingrese el fin del rango">

      <label class="mt-3" for="fraction">Fracción a ubicar en el rango:</label>
      <input type="text" class="form-control mt-1" id="fraction" placeholder="Ingrese la fracción a ubicar (ej. 1/2)">

      <label class="mt-3" for="fraction-step-input">Separación de unidades:</label>
      <input type="number" class="form-control" id="fraction-step-input"
        placeholder="Ingrese la separación de unidades">

      <button class="mt-5" id="fraction-button">Ubicar Fracción en el Rango</button>

      <div id="fraction-number-line" class="number-line mt-5"></div>
    </div>
  </div>

  <script>
    function mostrarDiv(divId) {
      // Oculta todos los divs
      document.getElementById('div1').style.display = 'none';
      document.getElementById('div2').style.display = 'none';

      // Muestra el div deseado
      if (divId == 'div2') {
        document.getElementById(divId).style.display = 'block';
        var modalAyuda = document.getElementById('ModalAyuda');
        modalAyuda.classList.remove('hidden');
      } else {
        var modalAyuda = document.getElementById('ModalAyuda');
        modalAyuda.classList.add('hidden');
        document.getElementById(divId).style.display = 'block';
      }
    }

    $(document).ready(function () {
      $('#button').click(function () {
        const startInput = $('#start-input').val();
        const endInput = $('#end-input').val();
        const stepInput = $('#step-input').val();
        const pointInput = $('#point-input').val();

        // Validar que se ingresen números
        if (isNaN(startInput) || isNaN(endInput) || isNaN(stepInput) || isNaN(pointInput)) {
          alert('Por favor, ingrese valores numéricos válidos.');
          return;
        }

        // Convertir a números
        const startValue = parseFloat(startInput);
        const endValue = parseFloat(endInput);
        const stepValue = parseFloat(stepInput);
        const pointValue = parseFloat(pointInput);

        // Validar que el inicio sea menor que el fin
        if (startValue >= endValue) {
          alert('El inicio del rango debe ser menor que el fin del rango.');
          return;
        }

        // Crear la recta numérica con el rango y la separación especificados
        const numberLine = $('#number-line');
        numberLine.empty();

        for (let i = startValue; i <= endValue; i += stepValue) {
          const tick = $('<div class="tick"></div>');
          tick.css('left', ((i - startValue) / (endValue - startValue)) * 100 + '%');
          numberLine.append(tick);

          const label = $('<div class="label" id="numeros">' + i + '</div>');
          label.css('left', ((i - startValue) / (endValue - startValue)) * 100 + '%');
          numberLine.append(label);
        }

        // Ubicar el punto amarillo en la recta de números enteros
        const point = $('<div class="point"></div>');
        const pointPosition = ((pointValue - startValue) / (endValue - startValue)) * 100 + '%';
        point.css('left', pointPosition);
        numberLine.append(point);
      });

      $('#fraction-button').click(function () {
        const fractionInput = $('#fraction').val();
        const startFractionInput = $('#start-fraction-input').val();
        const endFractionInput = $('#end-fraction-input').val();
        const fractionStepInput = $('#fraction-step-input').val();

        // Validar que se ingresó una fracción
        if (!fractionInput.match(/^\d+\/\d+$/)) {
          alert('Por favor, ingrese una fracción válida en el formato "a/b".');
          return;
        }

        const [numerator, denominator] = fractionInput.split('/').map(Number);

        // Validar que el denominador sea diferente de cero
        if (denominator === 0) {
          alert('El denominador no puede ser cero.');
          return;
        }

        // Validar que la fracción esté en el rango de fracciones
        if (isNaN(startFractionInput) || isNaN(endFractionInput) || isNaN(fractionStepInput)) {
          alert('Por favor, ingrese valores numéricos válidos para el rango de fracciones.');
          return;
        }

        const startFractionValue = parseFloat(startFractionInput);
        const endFractionValue = parseFloat(endFractionInput);
        const fractionStepValue = parseFloat(fractionStepInput);

        if (numerator / denominator < startFractionValue || numerator / denominator > endFractionValue) {
          alert('La fracción está fuera del rango de fracciones especificado.');
          return;
        }

        // Crear fracción ubicada en el rango de liena recta
        const fractionNumberLine = $('#fraction-number-line');
        fractionNumberLine.empty();

        const position = ((numerator / denominator - startFractionValue) / (endFractionValue - startFractionValue)) * 100;

        const fractionLabel = $('<div class="label" id="fraccion">' + fractionInput + '</div>');
        fractionLabel.css('left', position + '%');
        fractionNumberLine.append(fractionLabel);

        const tick = $('<div class="tick"></div>');
        tick.css('left', position + '%');
        fractionNumberLine.append(tick);

        // Ubicar el punto amarillo en la recta de fracciones
        const fractionPoint = $('#fraction-point');
        const fractionPointPosition = ((numerator / denominator - startFractionValue) / (endFractionValue - startFractionValue)) * 100 + '%';
        fractionPoint.css('left', fractionPointPosition);

        // Ciclo para crear la linea recta respecto a los rangos ingresados
        for (let i = startFractionValue; i <= endFractionValue; i += fractionStepValue) {
          const tick = $('<div class="tick"></div>');
          tick.css('left', ((i - startFractionValue) / (endFractionValue - startFractionValue)) * 100 + '%');
          fractionNumberLine.append(tick);

          const label = $('<div class="label" id="numeros">' + i + '</div>');
          label.css('left', ((i - startFractionValue) / (endFractionValue - startFractionValue)) * 100 + '%');
          fractionNumberLine.append(label);
        }
      });
    });
  </script>

</body>

</html>
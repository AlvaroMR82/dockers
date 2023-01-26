<?php
/*
## Ejercicio 2

Crea una página en la que el usuario pueda seleccionar su idioma a través de un combo (introducir al menos los idiomas; gallego, castellano e inglés) y muestre la siguiente frase en el idioma correspondiente: Bienvenido a mi página!. 

NOTA: En ninguno de los ejercicios anteriores podemos utilizar campos ocultos.
*/
if (isset($_POST['idioma'])) {
  //array que establece el idioma elegido en el formulario
  $idiomas = [
    1 => 'Bienvenido a mi página!',
    2 => 'Benvido a miña paxina',
    3 => 'Welcome to my page'
  ];
  //se establece la cookie con  la seleccion
  $cookie_name = "idioma";
  $cookie_idioma = $idiomas[$_POST['idioma']];
  setcookie($cookie_name, $cookie_idioma, time() + (86400 * 30), "/");
//se imprime el mensaje seleccionado segun idioma.
  echo $_COOKIE['idioma'];
}

?>


<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Tienda </title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
</head>

<body>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
  <div class="form-group">

    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">

      <label class="my-1 mr-2" for="inlineFormCustomSelectPref">Provincia:</label>
      <select class="custom-select my-1 mr-sm-2" id="inlineFormCustomSelectPref" name="idioma">
        <option selected>Elegir idioma: </option>
        <option value="1">castelan</option>
        <option value="2">galego</option>
        <option value="3">ingles</option>
      </select>
      <input type="submit" name="submit" value="Submit">

    </form>
  </div>
</body>

</html>
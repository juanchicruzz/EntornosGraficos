<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contacto</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

</head>
<body>

    <div class="container">
        <h1>Contacte al WebMaster</h1>

        <form action="enviarForm.php" method="POST" class="was-validated">
            <div class="row">
                <div class="col-md-4 border p-3">
                    <div class="mb-3">
                        <label for="nombre" class="form-label">Nombre</label>
                        <input required type="text" class="form-control" name="nombre" placeholder="Nombre" />
                        <div class="invalid-feedback">Este campo no puede estar vacio.</div>
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input required type="email" class="form-control" name="email" placeholder="name@example.com" />
                        <div class="invalid-feedback">Por favor ingrese un mail valido.</div>
                    </div>
                </div>
                <div class="col-md-6 border p-3">
                    <div class="mb-3">
                        <label for="exampleFormControlTextarea1" class="form-label">Mensaje</label>
                        <textarea required class="form-control" name="mensaje" rows="6" placeholder="Escriba su mensaje.."></textarea>
                        <div class="invalid-feedback">Por favor complete este campo.</div>
                    </div>
                    
                <div class="mb-3">
                    <button class="btn btn-primary" type="submit">Enviar</button>
                </div>
            </div>
        </form>



    </div>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js"
    integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB"
    crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js"
    integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13"
    crossorigin="anonymous"></script>
</body>


</html>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Recomendar sitio</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

</head>
<body>
    <div class="container">
        <h1>Sitio de prueba</h1>
        <hr>
        <h3>Texto random</h3>
        <p>
        Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolore nam repellat quia rem reprehenderit. Qui sequi minima culpa tempore voluptatibus est nihil, ullam harum nostrum ipsam ad distinctio? Molestiae, aliquam.
        </p>
        <p>
        Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolore nam repellat quia rem reprehenderit. Qui sequi minima culpa tempore voluptatibus est nihil, ullam harum nostrum ipsam ad distinctio? Molestiae, aliquam.
        </p>
        <form action="recomendar.php" method="POST" class="was-validated">
                <div class="row">
                    <div class="col-md-4 border p-3">
                        <div class="mb-3">
                            <h4>Recomendar sitio a un amigo</h4> 
                            <label class="form-label">Email</label>
                            <input required type="ema il" class="form-control" name="email" placeholder="Email de tu amigo" />
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Tu nombre</label>
                            <input required type="ema il" class="form-control" name="nombre" placeholder="Nombre" />
                        </div>
                    
                     <div class="mb-3">
                        <button class="btn btn-primary" type="submit">Enviar</button>
                    </div>
                    </div>
                </div>
            </form> 
    </div>
</body>
</html>
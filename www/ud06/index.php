<?php 
require 'flight/Flight.php';
Flight::route('/', function () {
    echo 'hola alvaro!';
});




/*  Tabla Clientes
Se debe permitir las siguientes acciones sobre la tabla clientes y la ruta ```/clientes```: 
- GET: Al acceder a esta ruta se debe mostar todos los datos de los clientes. 
    Optativo. Mostrar la información de un único cliente a través del id.  
- POST: Se debe poder insertar un cliente en la base de datos. 
- DELETE: Dado un id se debe poder eliminar un cliente.
- PUT: Se podrá modificar de un cliente sus apellidos, edad, email y teléfono. 
*/ 

//acceso a la base de datos por PDO
Flight::register('db','PDO',array('mysql:host=db;dbname=tienda','root','test'));

//GET: Al acceder a esta ruta se debe mostar todos los datos de los clientes.
Flight::route('GET /clientes',function(){
    $sql = Flight::db()->prepare("SELECT * FROM clientes");
    $sql->execute();
    $datos = $sql->fetchAll();
    Flight::json($datos);
});

//Optativo. Mostrar la información de un único cliente a través del id.  
Flight::route('POST /cliente',function(){
    $id= Flight::request()->data->id; 
    $sql = Flight::db()->prepare("SELECT * FROM clientes WHERE id=?");
    $sql->bindParam(1, $id);
    $sql->execute();
    $datos = $sql->fetchAll();
    Flight::json($datos);
});

//- POST: Se debe poder insertar un cliente en la base de datos. 
Flight::route('POST /clientes',function(){
    $nombre= Flight::request()->data->nombre; 
    $apellidos= Flight::request()->data->apellidos;
    $edad= Flight::request()->data->edad;
    $email= Flight::request()->data->email;
    $telefono= Flight::request()->data->telefono;

    $sql = Flight::db()->prepare("INSERT INTO clientes(nombre, apellidos, edad, email, telefono) VALUES (?, ?, ?, ?, ?)");

    $sql->bindParam(1, $nombre);
    $sql->bindParam(2, $apellidos);
    $sql->bindParam(3, $edad);
    $sql->bindParam(4, $email);
    $sql->bindParam(5, $telefono);
    
    $sql->execute();
    
    Flight::jsonp('insercion correcta');
});

//DELETE: Dado un id se debe poder eliminar un cliente.
Flight::route('DELETE /clientes',function(){
    $id= Flight::request()->data->id; 
    $sql = ("DELETE FROM clientes WHERE id=?");
    $stsmt = Flight::db()->prepare($sql);
    $stsmt->bindParam(1, $id);
    $stsmt->execute();
   
    Flight::jsonp('Cliente eliminado');
});

//PUT: Se podrá modificar de un cliente sus apellidos, edad, email y teléfono. 
Flight::route('PUT /clientes',function(){
    $id= Flight::request()->data->id;
    $apellidos= Flight::request()->data->apellidos;
    $edad= Flight::request()->data->edad;
    $email= Flight::request()->data->email;
    $telefono= Flight::request()->data->telefono; 
    $sql = ("UPDATE clientes set apellidos=?, edad=?, email=?, telefono=? WHERE id=?");
    $stsmt = Flight::db()->prepare($sql);

    
    $stsmt->bindParam(1, $apellidos);
    $stsmt->bindParam(2, $edad);
    $stsmt->bindParam(3, $email);
    $stsmt->bindParam(4, $telefono);
    $stsmt->bindParam(5, $id);
    
    $stsmt->execute();
   
    Flight::jsonp('Cliente actualizado');

});


/* Tabla Hoteles

Se debe permitir las siguientes acciones sobre la tabla clientes y la ruta ```/hoteles```: 

- GET: Al acceder a esta ruta se debe mostar todos los datos de los hoteles. 
    Optativo. Mostrar la información de un único hotel a través del id.  
- POST: Se debe poder insertar un hotel en la base de datos. 
- DELETE: Dado un id se debe poder eliminar un hotel.
- PUT: Se podrá modificar de un hotel sus direccion, email y teléfono. 
*/
//GET: Al acceder a esta ruta se debe mostar todos los datos de los hoteles. 
Flight::route('GET /hoteles',function(){
    $sql = Flight::db()->prepare("SELECT * FROM hoteles");
    $sql->execute();
    $datos = $sql->fetchAll();
    Flight::json($datos);
});
// Optativo. Mostrar la información de un único hotel a través del id.  
Flight::route('POST /hotel',function(){
    $id= Flight::request()->data->id; 
    $sql = Flight::db()->prepare("SELECT * FROM hoteles WHERE id=?");
    $sql->bindParam(1, $id);
    $sql->execute();
    $datos = $sql->fetchAll();
    Flight::json($datos);

});
//POST: Se debe poder insertar un hotel en la base de datos. 
Flight::route('POST /hoteles',function(){
    $hotel= Flight::request()->data->hotel; 
    $direccion= Flight::request()->data->direccion;
    $telefono= Flight::request()->data->telefono;
    $email= Flight::request()->data->email;
  
    $sql = Flight::db()->prepare("INSERT INTO hoteles(hotel, direccion, telefono, email) VALUES (?, ?, ?, ?)");

    $sql->bindParam(1, $hotel);
    $sql->bindParam(2, $direccion);
    $sql->bindParam(3, $telefono);
    $sql->bindParam(4, $email);
    
    $sql->execute();
    
    Flight::jsonp('insercion correcta');

});

//DELETE: Dado un id se debe poder eliminar un hotel.
Flight::route('DELETE /hoteles',function(){
    $id= Flight::request()->data->id; 
    $sql = ("DELETE FROM hoteles WHERE id=?");
    $stsmt = Flight::db()->prepare($sql);
    $stsmt->bindParam(1, $id);
    $stsmt->execute();
   
    Flight::jsonp('Cliente eliminado');

});

//PUT: Se podrá modificar de un hotel sus direccion, email y teléfono. 
Flight::route('PUT /hoteles',function(){
    $id= Flight::request()->data->id;
    $direccion= Flight::request()->data->direccion;
    $email= Flight::request()->data->email;
    $telefono= Flight::request()->data->telefono; 

    $sql = ("UPDATE hoteles set direccion=?, email=?, telefono=? WHERE id=?");
    $stsmt = Flight::db()->prepare($sql);

    
    $stsmt->bindParam(1, $direccion);   
    $stsmt->bindParam(2, $email);
    $stsmt->bindParam(3, $telefono);
    $stsmt->bindParam(4, $id);
    
    $stsmt->execute();
   
    Flight::jsonp('Cliente actualizado');

});

/* Tabla Reserva

Se debe permitir las siguientes acciones sobre la tabla clientes y la ruta ```/reservas```. Hay que tener en cuenta que esta tabla tiene dependencias con las otras dos tablas. 

- GET: Al acceder a esta ruta se debe mostar todas las reservas realizadas por todos los clientes en todos los hoteles.  
    Optativo. Mostrar la información de un única reserva a través del id.  
- POST: Se debe poder insertar una reserva en la base de datos. Identificar los datos necesarios.  
- DELETE: Dado un id se debe poder eliminar una reserva.
- PUT: Se podrá modificar de una reserva la fecha de entrada y la fecha de salida.
 */

//GET: Al acceder a esta ruta se debe mostar todas las reservas realizadas por todos los clientes en todos los hoteles.  
Flight::route('GET /reservas',function(){
    $sql = Flight::db()->prepare("SELECT * FROM reservas");
    $sql->execute();
    $datos = $sql->fetchAll();
    Flight::json($datos);
});

// Optativo. Mostrar la información de un única reserva a través del id.  
Flight::route('POST /reserva',function(){
    $id= Flight::request()->data->id; 
    $sql = Flight::db()->prepare("SELECT * FROM reservas WHERE id=?");
    $sql->bindParam(1, $id);
    $sql->execute();
    $datos = $sql->fetchAll();
    Flight::json($datos);

});

//POST: Se debe poder insertar una reserva en la base de datos. Identificar los datos necesarios.  
Flight::route('POST /reservas',function(){
    $id_cliente= Flight::request()->data->id_cliente; 
    $id_hotel= Flight::request()->data->id_hotel; 
    $f_reserva= Flight::request()->data->f_reserva;
    $f_entrada= Flight::request()->data->f_entrada;
    $f_salida= Flight::request()->data->f_salida;
  
    $sql = Flight::db()->prepare("INSERT INTO reservas(id_cliente, id_hotel, fecha_reserva, fecha_entrada, fecha_salida) VALUES (?, ?, ?, ?, ?)");

    $sql->bindParam(1, $id_cliente);
    $sql->bindParam(2, $id_hotel);
    $sql->bindParam(3, $f_reserva);
    $sql->bindParam(4, $f_entrada);
    $sql->bindParam(5, $f_salida);
    
    $sql->execute();
    
    Flight::jsonp('Insercion correcta');

});

//DELETE: Dado un id se debe poder eliminar una reserva.
Flight::route('DELETE /reservas',function(){
    $id= Flight::request()->data->id; 
    $sql = ("DELETE FROM reservas WHERE id=?");
    $stsmt = Flight::db()->prepare($sql);
    $stsmt->bindParam(1, $id);
    $stsmt->execute();
   
    Flight::jsonp('Reserva eliminada');

});

//PUT: Se podrá modificar de una reserva la fecha de entrada y la fecha de salida.
Flight::route('PUT /reservas',function(){
    $id= Flight::request()->data->id;
    $f_entrada= Flight::request()->data->f_entrada;
    $f_salida= Flight::request()->data->f_salida;

    $sql = ("UPDATE reservas set fecha_entrada=?, fecha_salida=? WHERE id=?");
    $stsmt = Flight::db()->prepare($sql);

    
    $stsmt->bindParam(1, $f_entrada);   
    $stsmt->bindParam(2, $f_salida);
    $stsmt->bindParam(3, $id);
    
    
    $stsmt->execute();
   
    Flight::jsonp('Reserva actualizada');

});



Flight::start();
?>
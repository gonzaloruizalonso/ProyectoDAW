REPOSITORIO GREATFOOD, PROYECTO DESARROLLO DE APLICACIONES WEB 2DAW IES LEONARDO DA VINCI
Componentes: Álvaro López, Gonzalo Ruiz y José Torres

-------------------------------------------------------------------

CONTENIDO DE LAS CARPETAS (modelo vista controlador):

./ (Raiz): contiene el fichero index.php, desde el cual se accede a la aplicacion web. 
           Ademas contiene el fichero css.css (con todos los estilos de la web)
           y dos ficheros .js con funciones Javascript.

- controllers: contiene los ficheros .php que gestionan las transformaciones y el flujo de la informacion, 
               actuando como intermediarios entre modelos y vistas, tambien contiene el API de redsys.
               
- db: contiene el fichero db.php, el cual inicializa la conexión a la base de datos.

- img: contiene las imagenes que se visualizan en la web, logos, carrusel, fondo y platos.

- models: contiene los ficheros .php que procesan los mecanismos y la logica de negocio de la web mediante funciones.

- recursos: contiene ficheros adicionales, que sirven para ampliar funcionalidades.

- views: contiene ficheros .php que actuan como interfaz de usuario, recibiendo informacion y mostrandola.

-------------------------------------------------------------------

PASOS A SEGUIR PARA EL DESPLIEGUE DE LA APLICACION:

1. Instalar un servidor WAMP/XAMPP/LAMP o similar, hemos utilizado estas versiones:
    -PHP: 7.3.12
    -APACHE: 2.4.41
    -MARIADB: 10.4.10

2. Clonar este repositorio en el lugar correspondiente al servidor previamente instalado.

3. Ejecutar el fichero /recursos/greatfood.sql desde la consola de MariaDB/MySQL

4. Configurar los ficheros (si es necesario)
  -/db/db.php: cambiar la direccion del servidor, el usuario y la contraseña  (lineas 2, 3 y 4)
  -/controllers/tarjeta_intermedio.php: cambiar las variables $url,$urlOK,$urlKO (lineas 46, 47 y 48)
  -/recursos/correo/enviarCorreo.php: cambiar las variables $mail->Username, $mail->Password y $mail->setFrom (lineas 19, 20 y 21)
  
 -------------------------------------------------------------------

  

<?php

namespace App;

use PDO;
use Symfony\Component\Console\Helper\TableRows;
use RecursiveArrayIterator;

class database
{
    public static function connect(){
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "top100";
        $conn = new mysqli($servername, $username, "",$dbname);

        // Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }
        echo "Connected successfully";
        return $conn;
    }

    public static function selectCancionesByGenero($id_genero){
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "top100";

            try {
                $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, "");
                $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                $stmt = $conn->prepare("SELECT cancion.id_cancion, cancion.nom_cancion, cancion.duracion, cancion.link_reprod, cancion.fecha_creac, cancion.posicion, genero.nom_genero, genero.img_genero, cantante.nom_cant
                                                  FROM cancion 
                                                  INNER JOIN genero ON genero.id_genero = cancion.id_genero
                                                  INNER JOIN cantante ON cantante.id_cant = cancion.id_cant
                                                  WHERE cancion.id_genero = $id_genero");
                $stmt->execute();

                $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
            }
            catch(PDOException $e) {
                echo "Error: " . $e->getMessage();
            }

        $conn = null;
        echo "</table>";
        return $result;
    }

    public static function selectCancionesByCant($id_cant){
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "top100";

        try {
            $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, "");
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $stmt = $conn->prepare("SELECT cancion.id_cancion, cancion.nom_cancion, cancion.duracion, cancion.link_reprod, cancion.fecha_creac, cancion.posicion, genero.nom_genero, genero.img_genero, cantante.nom_cant
                                                  FROM cancion 
                                                  INNER JOIN genero ON genero.id_genero = cancion.id_genero
                                                  INNER JOIN cantante ON cantante.id_cant = cancion.id_cant
                                                  WHERE cancion.id_cant = $id_cant");
            $stmt->execute();

            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        }
        catch(PDOException $e) {
            echo "Error: " . $e->getMessage();
        }

        $conn = null;
        echo "</table>";
        return $result;
    }

    public static function selectCancionesTodas(){
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "top100";

        try {
            $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, "");
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $stmt = $conn->prepare("SELECT cancion.id_cancion, cancion.nom_cancion, cancion.duracion, cancion.link_reprod, cancion.fecha_creac, cancion.posicion, genero.nom_genero, genero.img_genero, cantante.nom_cant
                                                  FROM cancion 
                                                  INNER JOIN genero ON genero.id_genero = cancion.id_genero
                                                  INNER JOIN cantante ON cantante.id_cant = cancion.id_cant
                                                  ORDER BY cancion.posicion");
            $stmt->execute();

            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        }
        catch(PDOException $e) {
            echo "Error: " . $e->getMessage();
        }

        $conn = null;
        echo "</table>";
        return $result;
    }

    public static function selectCancion($id_cancion){
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "top100";

        try {
            $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, "");
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $stmt = $conn->prepare("SELECT cancion.id_cancion, cancion.nom_cancion, cancion.duracion, cancion.link_reprod, cancion.fecha_creac, cancion.posicion, genero.nom_genero, genero.img_genero, cantante.nom_cant
                                                  FROM cancion 
                                                  INNER JOIN genero ON genero.id_genero = cancion.id_genero
                                                  INNER JOIN cantante ON cantante.id_cant = cancion.id_cant
                                                  WHERE cancion.id_cancion = $id_cancion");
            $stmt->execute();

            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        }
        catch(PDOException $e) {
            echo "Error: " . $e->getMessage();
        }

        $conn = null;
        echo "</table>";
        return $result;
    }

    public static function selectCant(){
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "top100";

            try {
                $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, "");
                $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                $stmt = $conn->prepare("SELECT * FROM cantante");
                $stmt->execute();

                $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
            }
            catch(PDOException $e) {
                echo "Error: " . $e->getMessage();
            }

        $conn = null;
        echo "</table>";
        return $result;
    }

    public static function selectCantById($id_cant){
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "top100";

        try {
            $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, "");
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $stmt = $conn->prepare("SELECT * FROM cantante WHERE id_cant = $id_cant");
            $stmt->execute();

            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        }
        catch(PDOException $e) {
            echo "Error: " . $e->getMessage();
        }

        $conn = null;
        echo "</table>";
        return $result;
    }

    public static function selectGen(){
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "top100";


            try {
                $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, "");
                $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                $stmt = $conn->prepare("SELECT * FROM genero");
                $stmt->execute();

                $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

            } catch (PDOException $e) {
                echo "Error: " . $e->getMessage();
            }

        $conn = null;
        echo "</table>";
        return $result;
    }

    public static function selectGenById($id_genero){
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "top100";


        try {
            $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, "");
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $stmt = $conn->prepare("SELECT * FROM genero WHERE id_genero = $id_genero");
            $stmt->execute();

            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        }

        $conn = null;
        echo "</table>";
        return $result;
    }

}
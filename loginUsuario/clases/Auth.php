<?php 
    include "Conexion.php";

    class Auth extends Conexion {
        public function nuevoSalon($email, $password, $nombre, $eslogan, $correo, $descripcion, $departamento, $municipio, $telefono, $direccion, $logos, $imagenes, $servicios) {
            $conexion = parent::conectar();
            $sql = "INSERT INTO salones (email, password, nombre, eslogan, correo, descripcion, departamento, municipio, telefono, direccion, logos, imagenes, servicios) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
            $query = $conexion->prepare($sql);
            $query->bind_param("sssssssssssss", $email, $password, $nombre, $eslogan, $correo, $descripcion, $departamento, $municipio, $telefono, $direccion, $logos, $imagenes, $servicios);
            return $query->execute();
        }

        public function completarCita($citaID) {
            $conexion = parent::conectar();
            $sql = "UPDATE citas SET estado = 'completo' WHERE id=?";
            $query = $conexion->prepare($sql);
            $query->bind_param("i", $citaID);
            return $query->execute();
        }

        public function cancelarCita($citaID) {
            $conexion = parent::conectar();
            $sql = "UPDATE citas SET estado = 'cancelado' WHERE id=?";
            $query = $conexion->prepare($sql);
            $query->bind_param("i", $citaID);
            return $query->execute();
        }

        public function retomarCita($citaID) {
            $conexion = parent::conectar();
            $sql = "UPDATE citas SET estado = 'activo' WHERE id=?";
            $query = $conexion->prepare($sql);
            $query->bind_param("i", $citaID);
            return $query->execute();
        }

        public function conseguirCitas($salonID) {
            $conexion = parent::conectar();
            $sql = "SELECT * FROM citas WHERE salon_id = '$salonID'";
            $respuesta = mysqli_query($conexion, $sql);

            $citas = array();

            while ($fila = mysqli_fetch_array($respuesta, MYSQLI_ASSOC)) {
                $citas[] = $fila;
            }
            return $citas;
        }

        public function nuevaCita($salonID, $servicio, $nombre, $telefono, $correo, $fecha, $hora, $mensaje, $timestamp) {
            $conexion = parent::conectar();
            
            $sql = "SELECT * FROM citas WHERE timestamp LIKE ?";
            $query = $conexion->prepare($sql);
            $query->bind_param("s", $timestamp);
            $query->execute();
            $result = $query->get_result();

            if ($result->num_rows > 0) {
                return "exist_timestamp";
            }

            $sql = "SELECT * FROM citas WHERE salon_id = ? AND fecha = ? AND hora = ?";
            $query = $conexion->prepare($sql);
            $query->bind_param("iss", $salonID, $fecha, $hora);
            $query->execute();
            $result = $query->get_result();

            if ($result->num_rows > 0) {
                return "exist_date_time";
            }

            $sql = "INSERT INTO citas (salon_id, servicio, nombre, telefono, correo, fecha, hora, mensaje, timestamp) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)";
            $query = $conexion->prepare($sql);
            $query->bind_param("isssssssi", $salonID, $servicio, $nombre, $telefono, $correo, $fecha, $hora, $mensaje, $timestamp);

            if ($query->execute()) {
                return "success";
            } else {
                return "fail";
            }
        }
        

        public function conseguirServicios($salonID) {
            $conexion = parent::conectar();
            $sql = "SELECT servicios FROM salones WHERE id = ? LIMIT 1";
            $query = $conexion->prepare($sql);
            $query->bind_param("i", $salonID);
            $query->execute();
        
            $result = $query->get_result();
        
            if ($row = $result->fetch_assoc()) {
                $servicios = $row['servicios'];
                $serviciosArray = explode(",", $servicios);
                
                return $serviciosArray;
            } else {
                return array();
            }
        }

        public function actualizarServicio($salonID, $servicio, $servicioAnterior) {
            $conexion = parent::conectar();
            $sql = "SELECT servicios FROM salones WHERE id = ? LIMIT 1";
            $query = $conexion->prepare($sql);
            $query->bind_param("i", $salonID);
            $query->execute();
        
            $result = $query->get_result();

            if ($row = $result->fetch_assoc()) {
                $servicios = $row['servicios'];
                $serviciosArray = explode(",", $servicios);
        
                $posicion = array_search($servicioAnterior, $serviciosArray);
                if ($posicion !== false) {
                    $serviciosArray[$posicion] = $servicio;
        
                    $serviciosActualizados = implode(",", $serviciosArray);
        
                    $sql = "UPDATE salones SET servicios=? WHERE id=?";
                    $query = $conexion->prepare($sql);
                    $query->bind_param("si", $serviciosActualizados, $salonID);
                    return $query->execute();
                }
            }
        
            return false; 
        }

        public function nuevoServicio($salonId, $nombre) {
            $conexion = parent::conectar();

            $sql = "SELECT servicios FROM salones WHERE id = ? LIMIT 1";
            $query = $conexion->prepare($sql);
            $query->bind_param("i", $salonId);
            $query->execute();
            $result = $query->get_result();

            if ($row = $result->fetch_assoc()) {
                $servicios = $row['servicios'];

                $servicios .= "," . $nombre;

                $sql = "UPDATE salones SET servicios=? WHERE id=?";
                $query = $conexion->prepare($sql);
                $query->bind_param("si", $servicios, $salonId);
                return $query->execute();
            }

            return false;
        }

        public function eliminarServicio($salonId, $nombre) {
            $conexion = parent::conectar();
        
            $sql = "SELECT servicios FROM salones WHERE id = ? LIMIT 1";
            $query = $conexion->prepare($sql);
            $query->bind_param("i", $salonId);
            $query->execute();
            $result = $query->get_result();
        
            if ($row = $result->fetch_assoc()) {
                $servicios = $row['servicios'];
        
                $serviciosArray = explode(",", $servicios);
        
                $posicion = array_search($nombre, $serviciosArray);
        
                if ($posicion !== false) {
                    unset($serviciosArray[$posicion]);
        
                    $serviciosActualizados = implode(",", $serviciosArray);
        
                    $sql = "UPDATE salones SET servicios=? WHERE id=?";
                    $query = $conexion->prepare($sql);
                    $query->bind_param("si", $serviciosActualizados, $salonId);
                    return $query->execute();
                }
            }
        
            return false;
        }        

        public function nuevoProducto($salonId, $nombre, $descripcion, $proveedor, $categoria1, $categoria2, $existencias, $fecha, $precio, $imagen) {
            $conexion = parent::conectar();
            $timestamp = date('Y-m-d H:i:s');
            $sql = "INSERT INTO productos (nombre, descripcion, proveedor, categoria1, categoria2, existencias, creacion, precio, imagen, salon_id) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
            $query = $conexion->prepare($sql);
            $query->bind_param("sssssisdsi", $nombre, $descripcion, $proveedor, $categoria1, $categoria2, $existencias, $fecha, $precio, $imagen, $salonId);
            return $query->execute();
        }

        public function actualizarProducto($productID, $nombre, $descripcion, $proveedor, $categoria1, $categoria2, $existencias, $precio, $imagen) {
            $conexion = parent::conectar();
            $sql = "UPDATE productos SET nombre=?, descripcion=?, proveedor=?, categoria1=?, categoria2=?, existencias=?, precio=?, imagen=? WHERE id=?";
            $query = $conexion->prepare($sql);
            $query->bind_param("sssssidsi", $nombre, $descripcion, $proveedor, $categoria1, $categoria2, $existencias, $precio, $imagen, $productID);
            return $query->execute();
        }

        public function eliminarProducto($productID) {
            $conexion = parent::conectar();
            $sql = "DELETE FROM productos WHERE id=?";
            $query = $conexion->prepare($sql);
            $query->bind_param("i", $productID);
            return $query->execute();
        }

        public function conseguirProductos($busqueda = null) {
            $conexion = parent::conectar();
            
            $sql = "SELECT * FROM productos";
            
            if ($busqueda !== null) {
                $sql .= " WHERE nombre LIKE ?";
                $busqueda = '%' . $busqueda . '%';
                $query = $conexion->prepare($sql);
                $query->bind_param("s", $busqueda);
            } else {
                $query = $conexion->prepare($sql);
            }
            
            $query->execute();
            
            $result = $query->get_result();
            $products = array();
            
            while ($row = $result->fetch_assoc()) {
                if ($busqueda !== null) {
                    $timestamp = date('Y-m-d H:i:s');
                    $productId = $row['id'];

                    $updateSql = "UPDATE productos SET ultima_busqueda=?, busquedas_totales=busquedas_totales+1 WHERE id=?";
                    $updateQuery = $conexion->prepare($updateSql);
                    $updateQuery->bind_param("si", $timestamp, $productId);
                    $updateQuery->execute();
                }

                $products[] = $row;
            }
        
            
            return $products;
        }
        

        public function productosPorSalon($salonId) {
            $conexion = parent::conectar();
            $sql = "SELECT * FROM productos WHERE salon_id=?";
            $query = $conexion->prepare($sql);
            $query->bind_param("i", $salonId);
            $query->execute();
            
            $result = $query->get_result();
            $products = array();
            
            while ($row = $result->fetch_assoc()) {
                $products[] = $row;
            }
            
            return $products;
        }

        public function productoPorID($productID) {
            $conexion = parent::conectar();
            $sql = "SELECT * FROM productos WHERE id = ?";
            $query = $conexion->prepare($sql);
            $query->bind_param("i", $productID);
            $query->execute();
        
            $result = $query->get_result();
        
            return $result->fetch_assoc();
        }

        public function masRelevantes() {
            $conexion = parent::conectar();
            $sql = "SELECT * FROM productos ORDER BY creacion DESC LIMIT 10";
            $result = mysqli_query($conexion, $sql);
            
            $products = array();
            
            while ($row = mysqli_fetch_assoc($result)) {
                $products[] = $row;
            }
            
            return $products;
        }

        public function masBuscados() {
            $conexion = parent::conectar();
            
            $minSearchCount = 3;
            $currentTimestamp = time();
            $newTimestamp = $currentTimestamp - 10; // Canbiar el numero por los segundos que se quieren restar
            $newTime = date('Y-m-d H:i:s', $newTimestamp);

            $sql = "SELECT * FROM productos WHERE busquedas_totales >= $minSearchCount AND ultima_busqueda >= '$newTime' ORDER BY ultima_busqueda DESC LIMIT 10";
            $result = mysqli_query($conexion, $sql);
            
            $products = array();
            
            while ($row = mysqli_fetch_assoc($result)) {
                $products[] = $row;
            }
            
            
            return $products;
        }

        public function loginSalon($email, $password) {
            $conexion = parent::conectar();
            $passwordExistente = "";
            $sql = "SELECT * FROM salones WHERE email = '$email'";
            $respuesta = mysqli_query($conexion, $sql);

            if (mysqli_num_rows($respuesta) > 0) {
                $parseRes = mysqli_fetch_array($respuesta);
                $passwordExistente = $parseRes['password'];
                
                if (password_verify($password, $passwordExistente)) {
                    $_SESSION['email'] = $email;
                    $_SESSION['nombre'] = $parseRes['nombre'];
                    $_SESSION['id'] = $parseRes['id'];
                    $_SESSION['direccion'] = $parseRes['direccion'];
                    $logoData = $parseRes['logos'];
                    if (strpos($logoData, ',') !== false) {
                        $logoArray = explode(',', $logoData);
                        $logo = trim($logoArray[0]);
                    } else {
                        $logo = $logoData;
                    }

                    $_SESSION['logo'] = $logo;
                    $_SESSION['imgs'] = $parseRes['imagenes'];
                    return true;
                } else {
                    return false;
                }
            } else {
                return false;
            }
        }

        public function loginInfo($email, $password) {
            $conexion = parent::conectar();
            $passwordExistente = "";
            $sql = "SELECT * FROM salones WHERE email = '$email'";
            $respuesta = mysqli_query($conexion, $sql);
            $parseRes = mysqli_fetch_array($respuesta);
            
            $logoData = $parseRes['logos'];
            if (strpos($logoData, ',') !== false) {
                $logoArray = explode(',', $logoData);
                $logo = trim($logoArray[0]);
            } else {
                $logo = $logoData;
            }
            $name = $parseRes['nombre'];
            
            return [$name, $logo, $_SESSION['id']];
        }

        public function conseguirSalones() {
            $conexion = parent::conectar();
            $sql = "SELECT * FROM salones";
            $respuesta = mysqli_query($conexion, $sql);

            $salones = array();

            while ($fila = mysqli_fetch_array($respuesta, MYSQLI_ASSOC)) {
                $salones[] = $fila;
            }
            return $salones;
        }

        public function conseguirSalonesChat($id) {
            $conexion = parent::conectar();
            $sql = "SELECT * FROM salones WHERE id NOT LIKE '$id'";
            $respuesta = mysqli_query($conexion, $sql);

            $salones = array();

            while ($fila = mysqli_fetch_array($respuesta, MYSQLI_ASSOC)) {
                $salones[] = $fila;
            }
            return $salones;
        }

        public function conseguirSalon($id) {
            $conexion = parent::conectar();
            $sql = "SELECT * FROM salones WHERE id = '$id'";
            $respuesta = mysqli_query($conexion, $sql);

            $parseRes = mysqli_fetch_array($respuesta, MYSQLI_ASSOC);
            return $parseRes;
        }

        public function registrar($nombre, $correo, $telefono, $password, $imagen) {
            $conexion = parent::conectar();
            $sql = "INSERT INTO t_usuarios (nombre, imagen_perfil, telefono, email, password) VALUES (?,?,?,?,?)";
            $query = $conexion->prepare($sql);
            $query->bind_param('sssss', $nombre, $imagen, $telefono, $correo, $password);
            return $query->execute();
        }

        public function logear($email, $password) {
            $conexion = parent::conectar();
            $passwordExistente = "";
            $sql = "SELECT * FROM t_usuarios WHERE email = '$email'";
            $respuesta = mysqli_query($conexion, $sql);

            if (mysqli_num_rows($respuesta) > 0) {
                $parseRes = mysqli_fetch_array($respuesta);
                $passwordExistente = $parseRes['password'];
                
                if (password_verify($password, $passwordExistente)) {
                    $_SESSION['email'] = $email;
                    $_SESSION['nombre'] = $parseRes['nombre'];
                    $_SESSION['id'] = 0;
                    $_SESSION['telefono'] = $parseRes['telefono'];
                    $_SESSION['logo'] = $parseRes['imagen_perfil'];
                    return true;
                } else {
                    return false;
                }
            } else {
                return false;
            }
        }   
    }

?>
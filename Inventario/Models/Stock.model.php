<?php
require_once('../Config/cls_conexion.model.php');
class Clase_Stock
{
    public function todos()
    {
        try {
            $con = new Clase_Conectar_Base_Datos();
            $con = $con->ProcedimientoConectar();
            //$cadena = "SELECT Stocks.StockId, Stocks.Cantidad, Stocks.Precio_Venta, productos.Nombre as productos, proveedores.Nombre as proveedores FROM `Stocks` inner JOIN proveedores on proveedores.ProveedorId = Stocks.ProveedorId ";
            $cadena = "SELECT * FROM `Stocks`";
            $result = mysqli_query($con, $cadena);
            return $result;
        } catch (Throwable $th) {
            return $th->getMessage();
        } finally {
            $con->close();
        }
    }
    public function uno($StockId)
    {
        try {
            $con = new Clase_Conectar_Base_Datos();
            $con = $con->ProcedimientoConectar();
            $cadena = "SELECT * FROM `Stocks` WHERE StockId=$StockId";
            $result = mysqli_query($con, $cadena);
            return $result;
        } catch (Throwable $th) {
            return $th->getMessage();
        } finally {
            $con->close();
        }
    }
    public function insertar($ProductoId, $ProveedorId, $Cantidad, $Precio_Venta)
    {
        try {
            $con = new Clase_Conectar_Base_Datos();
            $con = $con->ProcedimientoConectar();
            $cadena = "INSERT INTO `Stocks`( `ProductoId`, `ProveedorId`, `Cantidad`, `Precio_Venta`) VALUES ('$ProductoId','$ProveedorId','$Cantidad','$Precio_Venta')";
            $result = mysqli_query($con, $cadena);
            return 'ok';
        } catch (Throwable $th) {
            return $th->getMessage();
        } finally {
            $con->close();
        }
    }
    public function actualizar($StockId, $ProductoId, $ProveedorId, $Cantidad, $Precio_Venta)
    {
        try {
            $con = new Clase_Conectar_Base_Datos();
            $con = $con->ProcedimientoConectar();
            $cadena = "UPDATE `Stocks` SET `ProductoId`='$ProductoId',`ProveedorId`='$ProveedorId',`Cantidad`='$Cantidad',`Precio_Venta`='$Precio_Venta' WHERE `StockId`=$StockId";
            $result = mysqli_query($con, $cadena);
            return "ok";
        } catch (Throwable $th) {
            return $th->getMessage();
        } finally {
            $con->close();
        }
    }
    public function eliminar($StockId)
    {
        try {
            $con = new Clase_Conectar_Base_Datos();
            $con = $con->ProcedimientoConectar();
            $cadena = "delete from Stocks where StockId=$StockId";
            $result = mysqli_query($con, $cadena);
            return "ok";
        } catch (Throwable $th) {
            return $th->getMessage();
        } finally {
            $con->close();
        }
    }
}

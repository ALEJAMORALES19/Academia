<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ControladorPrecios extends Controller
{
    public function descuento($precio){
        $totalPagar = $precio;

    if(is_numeric($precio) && $precio <= 0){



        if($precio < 100000){
            return 'Este producto no tiene descuento';
        }

        else if($precio >  100000 && $precio <= 150000){
            return 'El descuento del producto es del 2%, y el total a pagar es de: ' . '$'  . $totalPagar - ($totalPagar * 0.02);
        }

        else if($precio > 150000 && $precio <= 300000){
            return 'El descuento del producto es del 3%, y el total a pagar es de: ' . '$'  . $totalPagar - ($totalPagar * 0.03);
        }

        else if($precio > 300000 && $precio <= 500000){
            return 'El descuento del producto es de 4%, y el total a pagar es de: ' . '$'  . $totalPagar - ($totalPagar * 0.04);
        }

        else if($precio > 500000){
            return 'El descuento del producto es de 5%, y el total a pagar es de: ' . '$'  . $totalPagar - ($totalPagar * 0.05);
        }
    }
        else{
            return 'El valor ingresado es incorrecto. Inténtelo nuevamente';
        }

    }

    public function getIva($nombre, $precio){
        $iva = 0.19 * $precio;
        $totalPrecio = $precio + $iva;

        return 'El articulo ' . $nombre . ' ' . 'sin IVA cuesta: ' . '$' . $precio . ' y el precio del IVA es de: ' . '$' . $iva . '.' . ' ' . 'El total a pagar por el artículo es de: ' . '$' . $totalPrecio;
    }
}
if(is_numeric($price) && $price >= 100){ //if principal

    if($price > 0 && $price < 100000){
        return 'Este producto no tiene descuento';
    }
    else if($price > 100000 && $price <= 150000){
        $desc = 0.02;
        $stringDesc = '2';
    }
    else if($price > 150000 && $price <= 300000){
        $desc = 0.03;
        $stringDesc = '3';
    }
    else if($price > 300000 && $price <= 500000){
        $desc = 0.04;
        $stringDesc = '4';
    }
    else if($price > 500000){
        $desc = 0.05;
        $stringDesc = '5';
    }

    $totalPayable = $price - ($price * $desc);
    return'El descuento del producto es del' . $desc . ', y el total a pagar es: ' . $totalPayable;

} //cierra if principal
else{
    return 'El valor ingresado es incorrecto. Inténtelo nuevamente';
}

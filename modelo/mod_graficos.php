<?php
class grafico
{




    public function estatus($pgconn){
		$query = "select count(*) as cantidad, E.esqui_desc as estatus  from inventario I join estatus_equipo E on E.esqui_cod=I.esqui_cod group by E.esqui_cod";
		$consulta = pg_query($pgconn,$query) or die("Consulta errónea: ".pg_last_error());
		return $consulta;
    }
  public function equipos($pgconn){
		$query = "select count(*) as cantidad, E.equi_desc as equipo from inventario I join equipo E on E.equi_cod=I.equi_cod group by E.equi_cod";
		$consulta = pg_query($pgconn,$query) or die("Consulta errónea: ".pg_last_error());
		return $consulta;
    }//agregar farmacias

}
<?php

/*
 * @Archivo: usurio.php
 * @Descripcion: Validacion de usurio 
 */

	require_once( 'conexion.php' );

	class Evento 
	{
		private $arrayDatos;
		
		
		/*
		|-------------------------------------------------------------------------------
		| Llamamos conexion a base de datos
		|-------------------------------------------------------------------------------
		*/
		public function __construct(){
			$this-> conexion = Conexion::getInstance();
			$this-> conex = $this-> conexion -> conex;
			
			$this-> objValidate = ( object ) array(
						'validate' => true
			);			
			
			// $this-> getEvento();
			
		}

		
		/*
		|-------------------------------------------------------------------------------
		| Comprobamos Evento
		|-------------------------------------------------------------------------------
		*/
		public function getEvento(){
			$this-> arrayDatos = array(
					'user' => $_GET[ 'user' ]
			);

			$idEvento = $this->readEvento();

			if( mysqli_num_rows( $idEvento ) > 0 ){
				$idEvento = $idEvento;
				
				
			}else{
				$idEvento = false;
				
			}
			
			// echo json_encode( $this-> objValidate );
			return $idEvento;
						
		}
		
		
		/*
		|-------------------------------------------------------------------------------
		| Ejecutamos consulta a la base de datos
		|-------------------------------------------------------------------------------
		*/
		public function readEvento(){
			
			$this-> SQL = "SELECT * FROM evento WHERE ID_EVENTO = '%s'"; 
			
			$this-> SQL = sprintf( $this-> SQL, $this-> arrayDatos[ 'user' ] );

			$this-> reponse = $this-> conex -> query( $this-> SQL );
			// var_dump( $this-> reponse );

			return $this-> reponse;
			
		}


		/*
		|-------------------------------------------------------------------------------
		| Actualizamos foto usurio 
		|-------------------------------------------------------------------------------
		*/
		public function fotoEvento( $idEvento, $nameImg ){

			$this-> SQL = "UPDATE evento SET 
			FOTO='%s' 
			WHERE ID_Evento='%s'";

			$this-> SQL = sprintf( $this-> SQL
					,	$nameImg
					,	$idEvento
				);
			// var_dump( $sql );

			$this-> reponse = $this-> conex -> query( $this-> SQL );
			// var_dump( $this-> reponse );

			return $this-> reponse;
			
		}		
		

	}
	
	
	
	
?>

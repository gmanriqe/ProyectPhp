<?php
class productController extends Controller {
	public function __construct() {
		parent::__construct ();
	}
	public function index() {
		$objProduct = $this->loadModel ( 'product' );
		
		$this->_view->productos = $objProduct->getAllProducts ();
		
		$this->_view->setJs ( array (
				'index' 
		) ); // carga el archivo index.js
		$this->_view->renderizar ( 'index' );
	}
	public function delete($productCode) {
		$objProduct = $this->loadModel ( 'product' );
		
		$objProduct->deleteProduct ( $productCode );
		
		$this->redireccionar ( 'product/index' );
	}
	public function edit($productCode) {
		$objProduct = $this->loadModel ( 'product' );
		$this->_view->lineas = $objProduct->getLines ();
		$this->_view->producto = $objProduct->getProduct ( $productCode );
		
		$this->_view->renderizar ( 'edit' );
	}
	public function update() {
		$productCode = $_POST ['productCode'];
		$productName = trim ( $_POST ['productName'] );
		$productLine = trim ( $_POST ['productLine'] );
		$productVendor = trim ( $_POST ['productVendor'] );
		$productScale = trim ( $_POST ['productScale'] );
		$productDescription = trim ( $_POST ['productDescription'] );
		$quantityInStock = trim ( $_POST ['quantityInStock'] );
		$buyPrice = trim ( $_POST ['buyPrice'] );
		$MSRP = trim ( $_POST ['MSRP'] );
		$mime = '';
		$foto = '';
		
		$this->_view->msg = '';
		if (isset ( $_FILES ['foto'] )) {
			$nombrearchivo = basename ( $_FILES ['foto'] ['name'] );
			$destino_archivo = "temp/" . $nombrearchivo;
			
			if (move_uploaded_file ( $_FILES ['foto'] ['tmp_name'], $destino_archivo )) {
				/* array de tipos de permitidos */
				$mimes_permitidos = array (
						'image/jpeg',
						'image/jpg',
						'image/png' 
				);
				$mime = $_FILES ['foto'] ['type'];
				
				if (in_array ( $mime, $mimes_permitidos )) {
					$fp = fopen ( $destino_archivo, "rb" );
					$contenido = fread ( $fp, filesize ( $destino_archivo ) );
					$foto = addslashes ( $contenido );
					fclose ( $fp );
				} else {
					$this->_view->msg = "Archivo no tiene el formato adecuado<br>";
				}
				unlink ( $destino_archivo );
			}
		} else
			$this->_view->msg = "No subio ningun Archivo.<br>";
		
		$objProduct = $this->loadModel ( 'product' );
		
		$objProduct->saveProduct ( $productCode, $productName, $productLine, $productScale, $productVendor, $productDescription, $quantityInStock, $buyPrice, $MSRP, $mime, $foto );
		
		$this->redireccionar ( 'product/index' );
	}
	public function nuevo() {
		$objProduct = $this->loadModel ( 'product' );
		$this->_view->lineas = $objProduct->getLines ();
		$this->_view->renderizar ( 'nuevo' );
	}

	
	public function getimagen($productCode){
		$objProduct = $this->loadModel ( 'product' );
		$imagen = $objProduct->getimagen($productCode);
		header("Content-type: ".$imagen->mime);
		echo $imagen->imagen;
	}
}
?>
	
<?php
class productModel extends Model {
	public function __construct() {
		parent::__construct ();
	}
	public function getAllProducts() {
		$sql = " select * from products where productDelete = 0 ";
		$result = $this->_db->query ( $sql ) or die ( "Error: $sql" );
		
		return $result;
	}
	public function deleteProduct($productCode) {
		$sql = "update products set productDelete=1 where productCode='$productCode'";
		$this->_db->query ( $sql ) or die ( "Error: $sql" );
		return;
	}
	public function getProduct($productCode) {
		$sql = "select * from products where productCode='$productCode'";
		$result = $this->_db->query ( $sql ) or die ( "Error: $sql" );
		if ($result->num_rows) {
			$reg = $result->fetch_object ();
		} else
			$reg = null;
		return $reg;
	}
	public function saveProduct($productCode, $productName, $productLine, $productScale, $productVendor, $productDescription, $quantityInStock, $buyPrice, $MSRP, $mime, $foto) {
		$sql = "select productCode from products where productCode='$productCode'";
		$result = $this->_db->query ( $sql ) or die ( "Error: $sql" );
		if ($result->num_rows) {
			// actualizar
			$sql = "update products set productName='$productName',
									  productLine='$productLine',
									  productScale ='$productScale',
									  productVendor = '$productVendor',
									  productDescription ='$productDescription',
									  quantityInStock ='$quantityInStock',
									  buyPrice ='$buyPrice',
									  MSRP ='$MSRP'		
									  where productCode ='$productCode'
					";
		} else {
			// insertar
			$sql = "insert into products set
									  productCode='$productCode', 
									  productName='$productName',
									  productLine='$productLine',
									  productScale ='$productScale',
									  productVendor = '$productVendor',
									  productDescription ='$productDescription',
									  quantityInStock ='$quantityInStock',
									  buyPrice ='$buyPrice',
									  MSRP ='$MSRP'	 ";
		}
		
		$this->_db->query ( $sql ) or die ( "Error: $sql" );
		
		// grabar en la tabla productimage
		$sql = "select * from productimage where productCode ='$productCode'";
		$result = $this->_db->query ( $sql ) or die ( "Error: $sql" );
		if ($result->num_rows) {
			$sql = "update productimage set mime='$mime', imagen='$foto' where productCode='$productCode'";
		} else
			$sql = "insert into productimage set productCode='$productCode',  mime='$mime', imagen='$foto' ";
		
		$this->_db->query ( $sql ) or die ( "Error: $sql" );
		
		return;
	}
	public function getLines() {
		$sql = "SELECT productLine FROM productlines WHERE lineDelete=0";
		$result = $this->_db->query ( $sql ) or die ( "Error: $sql" );
		
		return $result;
	}
	
	
	public function getimagen($productCode){
		$sql="select * from productimage where productCode='$productCode'";
		$result = $this->_db->query($sql) or die ('Error : '. $sql);
		if ($result->num_rows){
			$reg = $result->fetch_object();
		}
		else 
			$reg=null;
		
		return $reg;
	}
}
?>	
















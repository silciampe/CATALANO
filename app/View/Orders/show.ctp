<?php
if (!empty($product)) {
	echo $product['Product']['grupo'] . ' - ' . $product['Product']['modelo'] . ' - ' . $product['Product']['marca'];
} else {
	echo $no_existe;
}
?>
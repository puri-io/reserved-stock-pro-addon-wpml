# Reserved Stock Pro | Add-on - WPML

This is an example plugin allow [WPML](https://wpml.org/) translated products to be reserved as the original product using [Reserved Stock Pro](https://puri.io/plugin/reserved-stock-pro-for-woocommerce/).

## Why?

Each WPML translation is essentially "a new product" with it's own product ID. Therefore customers could seperately reserve each translation of the product. This example plugin fixes the issue by always giving **Reserved Stock Pro** the original product ID. Customers add translated products to their cart while keeping the reservation count correct.

## How does it work? 

This plugin uses the `reserved_stock_pro_handle_product_id` filter hook. The filter/function gives access to the current product ID which **Reserved Stock Pro** is about to handle, then tries to find the orginal product ID, using the WPML filter [wpml_object_id](https://wpml.org/wpml-hook/wpml_object_id/).

If the product is a translation then product id of the original product will returned to **Reserved Stock Pro**.

**Reserved Stock Pro** will always refer to the original product ID when running caluclations. E.g. How many people have reserved the product, or if the current customer has reserved the product.

## More developer hooks
Our developer [documentation](https://puri.io/docs/reserved-stock-pro/hooks/) has more information about the snippet and other features.

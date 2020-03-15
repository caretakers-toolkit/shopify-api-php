<?php

use Symfony\Component\PropertyInfo\Extractor\ReflectionExtractor;

include __DIR__ . '/vendor/autoload.php';

$hydrator = new \Slince\Shopify\Hydrator\Hydrator();

$json = <<<EOT
{
  "product": {
    "id": 632910392,
    "title": "IPod Nano - 8GB",
    "body_html": "<p>It's the small iPod with one very big idea: Video. Now the world's most popular music player, available in 4GB and 8GB models, lets you enjoy TV shows, movies, video podcasts, and more. The larger, brighter display means amazing picture quality. In six eye-catching colors, iPod nano is stunning all around. And with models starting at just $149, little speaks volumes.<\/p>",
    "vendor": "Apple",
    "product_type": "Cult Products",
    "created_at": "2017-05-10T18:07:39-04:00",
    "handle": "ipod-nano",
    "updated_at": "2017-05-10T18:07:39-04:00",
    "published_at": "2007-12-31T19:00:00-05:00",
    "template_suffix": null,
    "published_scope": "web",
    "tags": "Emotive, Flash Memory, MP3, Music",
    "variants": [
      {
        "id": 808950810,
        "product_id": 632910392,
        "title": "Pink",
        "price": "199.00",
        "sku": "IPOD2008PINK",
        "position": 1,
        "grams": 567,
        "inventory_policy": "continue",
        "compare_at_price": null,
        "fulfillment_service": "manual",
        "inventory_management": "shopify",
        "option1": "Pink",
        "option2": null,
        "option3": null,
        "created_at": "2017-05-10T18:07:39-04:00",
        "updated_at": "2017-05-10T18:07:39-04:00",
        "taxable": true,
        "barcode": "1234_pink",
        "image_id": 562641783,
        "inventory_quantity": 10,
        "weight": 1.25,
        "weight_unit": "lb",
        "old_inventory_quantity": 10,
        "requires_shipping": true
      },
      {
        "id": 49148385,
        "product_id": 632910392,
        "title": "Red",
        "price": "199.00",
        "sku": "IPOD2008RED",
        "position": 2,
        "grams": 567,
        "inventory_policy": "continue",
        "compare_at_price": null,
        "fulfillment_service": "manual",
        "inventory_management": "shopify",
        "option1": "Red",
        "option2": null,
        "option3": null,
        "created_at": "2017-05-10T18:07:39-04:00",
        "updated_at": "2017-05-10T18:07:39-04:00",
        "taxable": true,
        "barcode": "1234_red",
        "image_id": null,
        "inventory_quantity": 20,
        "weight": 1.25,
        "weight_unit": "lb",
        "old_inventory_quantity": 20,
        "requires_shipping": true
      },
      {
        "id": 39072856,
        "product_id": 632910392,
        "title": "Green",
        "price": "199.00",
        "sku": "IPOD2008GREEN",
        "position": 3,
        "grams": 567,
        "inventory_policy": "continue",
        "compare_at_price": null,
        "fulfillment_service": "manual",
        "inventory_management": "shopify",
        "option1": "Green",
        "option2": null,
        "option3": null,
        "created_at": "2017-05-10T18:07:39-04:00",
        "updated_at": "2017-05-10T18:07:39-04:00",
        "taxable": true,
        "barcode": "1234_green",
        "image_id": null,
        "inventory_quantity": 30,
        "weight": 1.25,
        "weight_unit": "lb",
        "old_inventory_quantity": 30,
        "requires_shipping": true
      },
      {
        "id": 457924702,
        "product_id": 632910392,
        "title": "Black",
        "price": "199.00",
        "sku": "IPOD2008BLACK",
        "position": 4,
        "grams": 567,
        "inventory_policy": "continue",
        "compare_at_price": null,
        "fulfillment_service": "manual",
        "inventory_management": "shopify",
        "option1": "Black",
        "option2": null,
        "option3": null,
        "created_at": "2017-05-10T18:07:39-04:00",
        "updated_at": "2017-05-10T18:07:39-04:00",
        "taxable": true,
        "barcode": "1234_black",
        "image_id": null,
        "inventory_quantity": 40,
        "weight": 1.25,
        "weight_unit": "lb",
        "old_inventory_quantity": 40,
        "requires_shipping": true
      }
    ],
    "options": [
      {
        "id": 594680422,
        "product_id": 632910392,
        "name": "Color",
        "position": 1,
        "values": [
          "Pink",
          "Red",
          "Green",
          "Black"
        ]
      }
    ],
    "images": [
      {
        "id": 850703190,
        "product_id": 632910392,
        "position": 1,
        "created_at": "2017-05-10T18:07:39-04:00",
        "updated_at": "2017-05-10T18:07:39-04:00",
        "src": "https:\/\/cdn.shopify.com\/s\/files\/1\/0006\/9093\/3842\/products\/ipod-nano.png?v=1494454059",
        "variant_ids": [
        ]
      },
      {
        "id": 562641783,
        "product_id": 632910392,
        "position": 2,
        "created_at": "2017-05-10T18:07:39-04:00",
        "updated_at": "2017-05-10T18:07:39-04:00",
        "src": "https:\/\/cdn.shopify.com\/s\/files\/1\/0006\/9093\/3842\/products\/ipod-nano-2.png?v=1494454059",
        "variant_ids": [
          808950810
        ]
      }
    ],
     "image": {
      "id": 850703190,
      "product_id": 632910392,
      "position": 1,
      "created_at": "2017-05-10T18:07:39-04:00",
      "updated_at": "2017-05-10T18:07:39-04:00",
      "src": "https:\/\/cdn.shopify.com\/s\/files\/1\/0006\/9093\/3842\/products\/ipod-nano.png?v=1494454059",
      "variant_ids": [
      ]
    },
    "admin_graphql_api_id": "gid://shopify/Product/850703190"
  }
}
EOT;

//$image = $hydrator->hydrate(\Slince\Shopify\Model\Product::class, json_decode($json, true)['product']);

//print_r($image->getImage());
//print_r($image->getImage());

$extractor = new ReflectionExtractor();

$array1 = $extractor->getTypes(\Slince\Shopify\Model\Product::class, 'image');
$array2 = $extractor->getTypes(\Slince\Shopify\Model\Product::class, 'images');
print_r($array1);
print_r($array2);
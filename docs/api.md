## Header untuk endpoint protected

Authorization: Bearer {token}
Accept: application/json
Content-Type: application/json

## Contoh Body POST /items

{
  "name": "Laptop",
  "quantity": 5,
  "price": 1000000,
  "category_id": 1
}

## Contoh Response Sukses

{
  "success": true,
  "data": {},
  "message": "Item dibuat"
}

## Contoh Response Error

{
  "success": false,
  "message": "Data tidak ditemukan"
}
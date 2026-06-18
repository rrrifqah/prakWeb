## Filter Items by Category

Endpoint:
GET /api/v1/items?category_id={id}

Description:
Digunakan untuk menampilkan item berdasarkan kategori tertentu.

Parameter:
- category_id (optional)

Contoh Request:
GET /api/v1/items?category_id=1

Contoh Response:

{
  "success": true,
  "data": [],
  "message": null
}
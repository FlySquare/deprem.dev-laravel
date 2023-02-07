<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>


# Proje Detay - Deprem.Dev

Projeyi deprem anında (özellikle son deprem) konumunuza en yakın toplanma/barınma alanlarını bulanabilinmesi için geliştirdim.


## API Reference

#### Tüm Konumları Çek

```http
  GET /api/locations
```

| Parameter | Type     | Description                |
| :-------- | :------- | :------------------------- |
| `query` | `string` | **Not Required**. |
| `city` | `string` | **Not Required**. |

#### Konum Detaylarını Çek

```http
  GET /api/locations/get/{id}
```

| Parameter | Type     | Description                       |
| :-------- | :------- | :-------------------------------- |
| `id`      | `string` | **Required**. Lokasyon Id |

#### Konum Ekle

```http
  POST /api/locations/add
```

| Parameter | Type     | Description                       |
| :-------- | :------- | :-------------------------------- |
| `name`      | `string` | **Required**.|
| `address`      | `string` | **Required**.|
| `city`      | `string` | **Required**.|
| `state`      | `string` | **Required**.|
| `phone`      | `string` | **Not Required**.|
| `google_maps_url`      | `string` | **Not Required**.|

#### Tüm Yararlı Linkler Çek

```http
  GET /api/links
```

## Geliştiriciler

- [@flysquare](https://www.github.com/flysquare)

## Özel Teşekkür

- [@alihangok](https://www.github.com/alihangok0)

## Destek

Destek için umutkonurinso@gmail.com üzerinden veya https://iamumut.com üzerinden iletişime geçebilirsiniz.


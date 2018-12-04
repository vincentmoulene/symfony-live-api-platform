Slides : 

[https://les-tilleuls-coop.slides.com/masterclass/deck#/](https://les-tilleuls-coop.slides.com/masterclass/deck#/)

## **Introduction**

- Design first framework
- Build an admin interface with react

## Docker configuration

php ⇒ php fpm
api ⇒ request
cache-proxy ⇒ varnish proxy 
client ⇒ generate progressive web app
admin ⇒ admin interface
h2-proxy ⇒ https and http2

## 4 components

- API PLATFORM
- Schema Gen component
- Admin component [https://marmelab.com/react-admin/](https://marmelab.com/react-admin/)
- Client component

## Other informations

- Postgresql object manager
- Need to enable symfony/debug (composer require debug)
- Reflexion API extract types of a class in parsing
- IRI ⇒ International Ressource Identifier (valid URL that identify an object).
- PropertyInfoComponent
- [http://www.hydra-cg.com/](http://www.hydra-cg.com/)
- API PLATFORM use symfony event listener
- Alice Faker for make flase datas
- Zaninotto faker
- JSON LD is used with Gmail (example flying tickets)

## Need to change the format of you API :

[https://api-platform.com/docs/core/content-negotiation/#enabling-several-formats](https://api-platform.com/docs/core/content-negotiation/#enabling-several-formats) 

[https://search.google.com/structured-data/testing-tool/u/0/?hl=fr](https://search.google.com/structured-data/testing-tool/u/0/?hl=fr) 

normalizationContext ⇒ If you want to don't view all the datas
denormalizationContext

Filters can be added for request :
- properties
- filter


You need to add graphql to you project : 

`docker-compose exec php composer require webonyx/graphql-php:^0.13`

Need to be carrefull :

- No cache with php and graphql (only post)
- May be better in go or Elixir
- Logs not really usable
- Varnish cache enabled a cache tag is sended
- We can send a cache tag in the header of the request if needed

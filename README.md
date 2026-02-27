
# Laravel CRUD API

Este proyecto implementa una API REST basada en Laravel para la gestión de un sistema de publicaciones (posts),
categorías, usuarios y comentarios, a partir de un esquema de base de datos en un archivo SQL.

Buenas prácticas en:

- Validación
- Estructura de rutas
- Serialización de respuestas
- Testing
- Dockerización
- Separación de responsabilidades

De esta manera se demuestra dominio de laravel a nivel arquitectónico y un uso corrrecto de patrones de diseño.

--------------------

# Instalación (Docker)

El proyecto está preparado para ejecutarse usando Docker.

- _make setup_

Esto ejecuta automáticamente todo lo necesario para arrancar el proyecto.
Si no se quiere hacer uso del 'Makefile', en este mismo archivo en la
carpeta raíz del proyecto, están todos los comandos de docker para ejecutarlos manualmente
si así se prefiere.

# Testing

Para garantizar la estabilidad, he cubierto los flujos principales con tests de integración.
Puedes ejecutarlos todos con un solo comando:

- _make test_

Se incluyen tests de:

- Modelos
- Relaciones
- Endpoints API
- Reglas de negocio
- Contratos de Resource

Al igual que para levantar el proyecto, si no se quiere hacer uso del 'Makefile', se pueden ejecutar manualemente
los comandos establecidos en este mismo archivo.

--------------------

# Arquitectura general

La aplicación está organizada en capas:

```
Controller ──▶ Action ──▶ Repository ──▶ Model
                  │
                  └─────▶ Resource
```


Así se evita que los controllers contengan lógica de negocio directamente.

Se ha optado por un patrón de Actions para mantener los controladores lo más limpios posible (Thin Controllers).
Esto permite centralizar la lógica de negocio y reutilizarla.

## Base de datos

La estructura se ha construido a partir de un archivo SQL.

Entidades principales:

- users
- posts
- categories
- comments
- category_post (tabla pivote)

Relaciones:

- User → hasMany → Post
- Post → belongsTo → User
- Post → belongsToMany → Category
- Post → hasMany → Comment
- Comment → belongsTo → User

## Rutas
- /api/v1/categories
- /api/v1/posts
- /api/v1/posts/{post}/records

(Se ha versionado la API por seguir buenas prácticas, aunque en realidad no sería estrictamente necesario)

## Controladores

Los controladores no contienen lógica de negocio, solo:

- Reciben Request
- Llaman a Actions
- Devuelven Resources

Todos extienden del Controller base, donde se estandariza la respuesta de cada función del CRUD.
De esta manera se facilita el mantenimiento, permite mockear Actions en tests y se mejora la legibilidad.


## Actions

Las Actions encapsulan un caso de uso concreto.

De esta manera hay una semántica clara, se quita peso a los Controller, se siguen principios SOLID y facilita la reutilización.

## Repositories

Se ha implementado el patrón Repository para abstraer Eloquent.
Aunque para un proyecto pequeño puede parecer redundante,
se ha incluido para demostrar cómo desacoplar la persistencia y facilitar el mockeo en los tests unitarios.

## Requests (Form Requests)

Se usan únicamente cuando hay datos de entrada, permiten:

- Validación centralizada
- Evitar lógica en controllers
- Mejorar seguridad

## Resources

Todas las respuestas pasan por Resources, de esta manera se consigue:

- Control total del contrato JSON
- Evita exponer estructura interna
- Permite versionado de respuesta

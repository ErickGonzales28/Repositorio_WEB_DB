# Sistema de Biblioteca de la FIM - UNI

## Tabla de Contenidos
1. [Introducción](#introducción)
   1. [Propósito](#propósito)
   2. [Alcance](#alcance)
   3. [Definiciones, acrónimos y abreviaturas](#definiciones-acrónimos-y-abreviaturas)
   4. [Referencias](#referencias)
   5. [Vista Global del Proyecto](#vista-global-del-proyecto)
2. [Arquitectura Empleada](#arquitectura-empleada)
   1. [CRUD](#crud)
   2. [Patrón Singleton](#patrón-singleton)
   3. [DAO](#dao)
   4. [3N Capa](#3n-capa)
3. [Requerimientos y Restricciones](#requerimientos-y-restricciones)
   1. [Matriz de Requerimientos Funcionales](#matriz-de-requerimientos-funcionales)
   2. [Matriz de Requerimientos No Funcionales](#matriz-de-requerimientos-no-funcionales-según-el-modelo-fursp)
   3. [Restricciones](#restricciones)
4. [Vista Funcional](#vista-funcional)
   1. [Diagrama de Casos de Uso](#diagrama-de-casos-de-uso)
   2. [Diagrama de Actividades](#diagrama-de-actividades)
5. [Referencias Bibliográficas](#referencias-bibliográficas)

## Introducción

### Propósito
El equipo se propone mejorar el Sistema de Bibliotecas para la Facultad de Ingeniería Mecánica (FIM) de la Universidad Nacional de Ingeniería (UNI), habilitando dos servicios complementarios dependiendo del tipo de usuario logueado en la página web. Permitiendo al bibliotecario devolver, gestionar, consultar y realizar préstamos; como al cliente, consultar los libros que necesite, además de realizar reservas desde su ordenador personal.

### Alcance
- **Análisis y evaluación del sistema de biblioteca actual:** Se realizará una evaluación completa del sistema de biblioteca existente, incluyendo la revisión de la estructura, la funcionalidad y la eficiencia del sistema actual.
- **Identificación de áreas problemáticas:** Se identificarán las áreas problemáticas del sistema de biblioteca actual, como la falta de integración de un sistema de reservas, la falta de capacidad para manejar grandes volúmenes de información y la falta de seguridad.
- **Desarrollo de un plan de mejoramiento:** Se desarrollará un plan de mejoramiento detallado que abordará las áreas problemáticas identificadas y establecerá objetivos claros y medibles para el proyecto.
- **Capacitación del personal:** Se brindará capacitación adecuada al personal de la biblioteca para asegurar que estén completamente familiarizados con el nuevo sistema y puedan utilizarlo de manera efectiva.
- **Pruebas y evaluación:** Se realizarán pruebas rigurosas del nuevo sistema de biblioteca para garantizar que funcione correctamente y cumpla con los objetivos del proyecto. Además, se evaluará el sistema de manera regular para identificar cualquier área que requiera mejoras adicionales.
- **Documentación y soporte:** Se proporcionará documentación completa del nuevo sistema de biblioteca y soporte continuo para garantizar que la biblioteca pueda utilizar el sistema de manera efectiva a largo plazo.

### Definiciones, acrónimos y abreviaturas
- **FIM:** Facultad de Ingeniería Mecánica
- **UNI:** Universidad Nacional de Ingeniería
- **UNLP:** Universidad Nacional de La Plata
- **RSS:** Really Simple Syndication, distribución realmente sencilla
- **AI:** Arquitectura de Información
- **POJO:** Plain Old Java Object, objeto de Java que no implementa ninguna interfase especial

### Referencias
- **Estudio de la Arquitectura y Desarrollo Web de Bibliotecas universitarias de la Universidad Nacional de La Plata, Argentina:** Análisis de la arquitectura de información (AI) de sitios Web de bibliotecas de la UNLP. Se analizaron 17 bibliotecas y se aplicó una grilla para recabar aspectos relevantes como la ubicación del sitio Web, etiquetado de contenido, capacidad de búsqueda, accesibilidad Web, entre otros. Se concluye que el desarrollo de los sitios es dispar y se recomienda considerar pautas de AI como parte de la cooperación en la red de bibliotecas de la UNLP.
- **Desarrollo de un sistema de gestión de biblioteca para mejorar la atención en el colegio Mariscal Castilla-El Tambo:** Necesidad de gestionar los libros de la biblioteca de manera eficiente para satisfacer las solicitudes de los estudiantes a tiempo, mejorando la gestión de la biblioteca para brindar un buen servicio a los estudiantes.

### Vista Global del Proyecto
El proyecto de mejoramiento del sistema de biblioteca de la FIM tiene como objetivo mejorar la eficiencia y la funcionalidad del sistema actual, abordando las áreas problemáticas y estableciendo objetivos claros y medibles. Además, se brindará capacitación y soporte continuo para asegurar una transición sin problemas al nuevo sistema mejorado.

## Arquitectura Empleada

### CRUD
El término CRUD se relaciona directamente con la gestión de datos digitales, y su nombre proviene del acrónimo que se forma con las primeras letras de las cuatro operaciones fundamentales de aplicaciones persistentes en sistemas de bases de datos: Crear, Leer, Actualizar y Borrar registros.

### Patrón Singleton
El patrón de diseño Singleton es un patrón de creación que se utiliza para garantizar que una clase sólo tenga una instancia y que esta instancia sea accesible en todo el programa. En este patrón, la clase Singleton tiene un constructor privado y un método estático público que devuelve la única instancia de la clase.

### DAO
Los patrones de objetos de acceso a datos (DAO) se utilizan para dividir los servicios comerciales de alto nivel de las API o acciones de acceso a datos de bajo nivel. La interfaz de objeto de acceso a datos delimita las operaciones comunes que se llevarán a cabo en un objeto modelo.

### 3N Capa
El patrón de diseño 3N Capa (también conocido como 3-Tier o 3 capas) es un enfoque arquitectónico para el diseño de software que separa la aplicación en tres capas principales: la capa de presentación, la capa de lógica de negocios y la capa de acceso a datos. Este patrón busca mejorar la modularidad y la escalabilidad del software.

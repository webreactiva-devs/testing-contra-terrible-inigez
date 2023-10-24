# Guía básica de testing

Imaginemos que tenemos una función suma.

```js
function suma(a, b) {
    return a + b;
}
```

Lo hacemos en JavaScript porque es mucho más fácil que puedas ejecutarlo en cualquier parte: en la consola de tu navegador, en codepen...

Puedes ponerlo en un archivo `suma.js`.

‎‎



## **¿Qué debería hacer un test sobre esta suma?**

Darnos una forma de verificar que el código de la función es correcta ejecutando la función suma de forma aislada.

Antes de liarnos con frameworks e historias veamos como podemos hacerlo directamente con JavaScript.


Añade este código en el mismo fichero, justo debajo:

```js
if(suma(1, 1) === 2) {
  console.log('La suma es correcta');
}
else {
  console.error('La suma no es correcta');
}
```

Ahora ejecuta el código y ve cómo se comporta.
`node suma.js`


¡Tú primer test y es correcto!

📝 Prueba modificando la condición del `if` para conseguir que falle.

‎


## **Aserciones**

Un concepto que nos ayuda a escribir menos código y hacerlo más legible es utilizar los "asserts" o aserciones.

Un "assert" comprueba una condición, y desencadena un error o excepción si la condición resulta ser falsa.

Dicho de otro modo, es otra forma de hacer un `if` pero con más glamour.

Vamos a añadir nuestro propio `assert` añadiéndolo a nuestro `suma.js`.

```js
function my_assert(expression, message) {
    if (!expression) {
        console.error(`Assertion failed: ${message}`);
    } else {
        console.log(`%cAssertion passed: ${message}`, 'color: green');
    }
}
```

Lo vamos a llamar `my_assert` para evitar luego líos si importas otra librería de testing.

El "%c" es un código de CSS que nos permite darle estilo a nuestros mensajes de error. Queremos que sea VERDE 🟢 para los tests que pasan y ROJO 🛑 para los que dan fallo.

Y ahora lancémonos a ejecutar estos test:
```js
my_assert(suma(1, 1) === 2, 'La suma de 1 y 1 debería ser 2');
my_assert(suma(-1, 1) === 0, 'La suma de -1 y 1 debería ser 0');
my_assert(suma(-1, -1) === -2, 'La suma de -1 y -1 debería ser -2');
my_assert(suma(-1, -1) === 2, 'La suma de -1 y -1 debería ser 2');
```

Los tres primeros salen en verde, el último, en rojo.

Realmente ya sabes casi todo lo que necesitas para hacer testing ;)

‎


## TDD: Diseño guiado por testing

Cualquier momento es bueno para añadir los tests, pero lo más correcto es hacerlo en orden inverso a como lo hicimos antes.

🐸 Lo sé, esto que te voy a contar es más difícil, pero es muy valioso si llegas a montarlo así en el futuro.

Vamos poco a poco.


Lo lógico sería ahora crear una función resta.

PUES NO.

El diseño guiado por tests nos dice que tenemos que seguir este proceso:

1️⃣ Crear el test, ejecutarlo y que salga en rojo 🛑
2️⃣ Crear la mínima pieza de código que haga poner el test en verde 🟢
3️⃣ Refactorizar el código 🔁 

Y así cientos de veces.

Vamos con los 2 primeros pasos.

1. Abrimos un fichero `restar.js`.
2. Copia tu función `my_assert` al fichero de `resta.js`.
3. Crea un test que compruebe una resta

```js
my_assert(resta(3, 1) === 2, 'La resta de 3 menos 1 debería ser 2');
```

4. Ejecuta el test. Tiene que salir rojo 🛑 (claro, no existe la función resta).
`resta is not defined`

5. Crea la mínima pieza de código que haga poner el test en verde 🟢

Pues creamos la función `resta`

```js 
function resta(a, b) {
    return a + b;
}
```

6. Ejecuta el fichero resta
7. ¡Test en verde! 🟢

📝 Añade más pruebas de resta y de suma o prueba con funciones sencillas.

‎
## Usando una librería de tests para ser más "pro"

Esto puede ser un poco rollo si queremos hacer muchos tests y los queremos automatizar.

Así que vamos a usar una librería de tests de verdad. Por ejemplo, [Vitest](https://vitest.dev/).

Sigue estos pasos para empezar:

1. Crea una carpeta para el proyecto, por ejemplo "aprendiendo-testing".
2. Arranca el proyecto con `npm init -y`. Esto te genera un fichero `package.json` con las dependencias que necesitas (de momento ninguna). Lo puedes modificar más tarde.
3. Instala Vitest con `npm install -D vitest`.

### Convierte el código en testeable

Las piezas para poder hacer tests deben ser independientes y lo más pequeñas posibles.

Nosotros ahora lo tenemos muy fácil, porque solo tenemos dos funciones.

1. Crea un fichero `operations.js` en la carpeta de trabajo
2. Pega dentro esto:

```js
export function add(a, b) {
  return a + b;
}
```

Lo que hemos hecho es exportar la función `add` para que los tests (y otros archivos de nuestro proyecto) puedan utilizarla.

### Crea tus primeros tests automatizados con Vitest

1. Crea un fichero `operations.test.js` en la carpeta de trabajo.
2. Pega allí esto:

```js
import { expect, test } from "vitest";
import { add } from "./operations";

test("add 1 + 2 to equal 3", () => {
  expect(add(1, 2)).toBe(3);
});
```

Varias cosas aquí:
- `test` es la función que engloba las aserciones que quieres hacer y el nombre de la prueba que estás haciendo.
- `expect` es la función que comprueba si la condición es verdadera o falsa
- La condición es que la suma de 1 y 2 sea igual a 3. Para defininir ese "deseo" usamos `toBe`.

Si traducimos el test al español sería algo así:

```
Quiero que haga una prueba que compruebe que la suma de 1 y 2 sea igual a 3
Mi expectativa es que suma(1, 2) sea igual a 3
```

Si te das cuenta es casi perfectamente legible a poco que sepas un poco de inglés.

3. Modifica el fichero `package.json` para añadir el script de test:

```json
  "scripts": {
    "test": "vitest"
  }, 
```

4. Lanza los test con `npm run test`.

Tendría que salirte algo así:

<img width="894" alt="Captura de pantalla 2023-10-24 a las 10 47 37" src="https://github.com/webreactiva-devs/testing-contra-terrible-inigez/assets/1122071/8790e66c-7e64-46d4-a261-ba9b2c7256ee">


🥳🥳🥳🥳 ¡Tu primer test en verde! 🟢

### Completando el ciclo de TDD con Vitest

Vamos a intentar completar nuestro ciclo de TDD, el que vimos antes.

1️⃣ Crear el test, ejecutarlo y que salga en rojo 🛑
2️⃣ Crear la mínima pieza de código que haga poner el test en verde 🟢
3️⃣ Refactorizar el código 🔁 

**1️⃣ Crear el test, ejecutarlo y que salga en rojo 🛑**

En `operations.test.js` añade esto:


```js
test("subtract 1 - 2 to equal -1", () => {
  expect(substract(1, 2)).toBe(-1);
});
```

Parece una tontería, si ejecutas o ves en la terminal el resultado de `npm run test` tendrás que ver algo así:

<img width="566" alt="Captura de pantalla 2023-10-24 a las 11 01 51" src="https://github.com/webreactiva-devs/testing-contra-terrible-inigez/assets/1122071/1c253d74-fcd2-4561-848e-eae04228fad2">

`ReferenceError: substract is not defined`

Estamos en rojo 🛑 porque no tenemos la función `substract` definida.

> La razón de hacer esto así en un proyecto más grande tiene sentido. Imagínate que hubiera salido verde, eso querría decir que ya tenemos ea función definida en algún sitio.

**2️⃣ Crear la mínima pieza de código que haga poner el test en verde 🟢**

En `operations.js` añade esto:

```js
export function substract(a, b) {
  return a - b;
}
```

Seguirás teniendo el test en rojo. Eso es porque te falta importar esta función en tu test.

En `operations.test.js`:

```js
import { add, substract } from "./operations";
```

Lanza los test y ¡verde! 🟢


## Próximos pasos

- ¿Qué más necesitas que te cuente? Cuéntamelo en telegram ;)

¡Íñiguez está temblando! 










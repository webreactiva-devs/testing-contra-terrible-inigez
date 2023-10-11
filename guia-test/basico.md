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

## Próximos pasos

- Te contaré por aquí en breve como automatizar estos tests y hacerlos más efectivos.

¡Íñigez está temblando! 










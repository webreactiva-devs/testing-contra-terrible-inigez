# Tormenta de código: Testing contra el Terrible Íñigez

![DALL·E 2023-10-09 18 21 05 - Pixel art of a bustling office landscape  Workers are busy at their desks, but in the middle of it all, a boss with a striking mustache and foreboding](https://github.com/webreactiva-devs/testing-contra-terrible-inigez/assets/1122071/6b4291d5-b64c-4bb2-b9ba-2b306c09ee96)


> 🎯 Propósito: Aprender a atrapar errores antes de pasarlos a producción 🆕

Te cuento los requisitos y los trozos de código y plantilla que ya tienes disponibles para que sea aún más fácil.

## ⏳ Te contaré una historia

> “Espero que esté todo bien, te estaré vigilando”

Esto es lo último que dijo Terrible Íñigez cuando entró en el despacho. Después de eso todos sabíamos que estaría buscando cualquier forma de que aquella pantalla de aplicación diera un ERROS y salir a buscar al CULPABLE.

Su nombre era Terrible, no era un mote.

Sus padres, al verlo en la cuna, pensaron que sería mejor avisar a la humanidad de quién era ese ser solo con ver su nombre.

Terrible es tu jefe y tú te encargas de mantener con vida un sistema que captura unos datos de un podcast (el favorito de Terrible) y devuelve **cuatro datos fundamentales**:

1. El número del siguiente episodio
2. La duración total de todos los episodios
3. El número del episodio más corto
4. El título de episodios aleatorios cuya suma de duración no dure más de 2 horas

👉 El origen de los datos es este:  `https://tormenta-codigo-app-terrible.vercel.app/api/podcast`

👉 En la carpeta `/plantillas` tienes el código resuelto en varios lenguajes de programación. Funcionan todos con salida en consola.

Es sabido que Terrible se pasa el día buscando como hacer que otros fallen y cambia a propósito los datos de origen.

El sistema en producción ejecuta cada 15 minutos un proceso que captura la información y se la envía por email a Terrible.

Tu no puedes controlar ese proceso, no tienes acceso. 

Tampoco puedes controlar la fuente.

Así que solo te queda tu código.

**⚡️ Tu misión es crear cualquier tipo de test que evite que Terrible reciba un error.**

## 📋 Requisitos del reto


🚨 Puedes hacerlo en el LENGUAJE que quieras y utilizando el framework o herramienta de testing que más te guste.

1️⃣ No buscamos que cambies directamente el código para adaptarte a los nefastos cambios de Terrible.

2️⃣ Se busca que crees los tests, investigando como se hace para que seas capaz de cubrir todos los huecos posibles (que no son tantos)

3️⃣ Así podrás modificar el código para que sea más robusto y no se coma los errores.

Nota:

No voy a contarte qué cambios son, tendrás que descubrirlo poco a poco. 

👉 Si te puedo decir que existe la posibilidad de que 1 de cada 4 veces los datos de origen no estén alterados.



## 🎲 Requisitos funcionales

👉 Simularemos los cambios de Terrible de forma aleatoria en esta otra URL de la API:  `https://tormenta-codigo-app-terrible.vercel.app/api/podcast/terrible`

☝️ Ojo al `/terrible`, marca la diferencia.

1️⃣ Deberías comenzar creando tus primeros tests con los datos correctos, que son los que están en la API con esta ruta: `https://tormenta-codigo-app-terrible.vercel.app/api/podcast`

2️⃣ Quizás quieras modificar el código original que tienes en `/plantillas`. Hazlo tranquilamente

3️⃣ Cambia la ruta de la API a la de “terrible” y empieza a analizar que cambios hay que deberías probar primero con el test. 

4️⃣ Luego escribes el código que soluciona el test que has creado.

⚡️ ¿Qué pasa si los datos alterados no permiten tan siquiera hacer cumplir la funcionalidad? 
1. Primera opción: No tengas en cuenta ese episodio
2. Segunda opción: Muestra un error que le haga saber a Terrible que le has pillado


### Para entregar

- Los tests que has realizado
- El código funcional que hace la tarea de los cuatro datos fundamentales 
- Las dependencias que necesitamos instalar para ejecutar los tests


### 🌟 Requisitos extra (no obligatorios, pero hay gente muy “viciosa”)  

- Atreverse es de valientes: Un sistema de caché para que la última solución correcta sea la salida del sistema aunque haya datos alterados

## 👩‍💻 ¿Cómo participas en el reto?

✉️ Cuando tengas la solución, añades una issue en este repositorio y nos cuentas lo que has hecho y cuáles han sido tus principales aprendizajes y dificultades, ¡a la comunidad le encantará saberlo!

👉 Hay que compartir el código.  
👉 Puedes hacer un fork de este repositorio y trabajar sobre él (no es obligatorio)

🎁 Sortearemos regalos entre los participantes ;)  

## 🗓️ Fecha límite

2 de Noviembre de 2023

## 🛠️ ¿Qué vas a aprender en este reto?


1. Testing, al menos el principio, una cualidad MUY DESEADA en los developers a la hora de contratarlos
2. Enfrentarte a cambios en APIs que no controlas
3. Ser más responsable con tu código


## 🤗 Mecenazgo
Este reto se realiza por y para la [Comunidad Malandriner](https://webreactiva.com/comunidad)

❤️
